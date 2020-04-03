<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Berita;
use Yajra\DataTables\Html\Builder;
use DataTables;
use App\Category;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public $html;

    public function __construct(Builder $builder)
    {
        $this->html = $builder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Berita::published()->latest()->paginate(6);
        return view('berita.index', [
            'news' => $news
        ]);
    }

    /**
     * Search some berita
     * 
     * @param  Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        if($request->q) {
            $news = Berita::published()
                            ->latest()
                            ->where('title', 'like', '%' . $request->q . '%')
                            ->orWhereHas('category', function($query) use ($request) {
                                $query->where('title', 'like', '%' . $request->q . '%');
                            })
                            ->orWhereHas('author', function($query) use ($request) {
                                $query->where('name', 'like', '%' . $request->q . '%');
                            })
                            ->paginate(6);
            $news->withPath('/cari');
            return view('berita.index', [
                'news' => $news
            ]);
        } else {
            abort(404, 'Sorry Not Found');
        }
    }

    /**
     * Check slug avaliable
     * 
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function checkSlug(Request $request)
    {
        $slug = Berita::where('slug', $request->slug)->first();
        if($slug) {
            return response()->json(['code' => 500, 'message' => 'Maaf, slug sudah digunakan, silakan merubah slug yang anda pilih!'], 500);
        } else {
            return response()->json(['code' => 200, 'message' => 'Slug tersedia!'], 200);
        }
    }

    /**
     * Show admin index for list all news
     * 
     * @param  Request $request
     * @return mixed
     */
    public function adminIndex(Request $request)
    {
        if($request->ajax()) {
            $data = Berita::with(['category', 'author'])->latest()->get();
            return datatables()->of($data)
            ->addColumn('action', function($data) {
                return '<a class="btn btn-xs btn-danger delete" href="javascript:void(0)" data-id="'. $data->id .'"><i class="far fa-trash-alt"></i> Delete</a> | <a href="'. route('admin.berita.edit', $data->id) .'" class="btn btn-xs btn-primary edit"><i class="far fa-edit"></i> Edit</a>';
            })
            ->editColumn('title', function($data) {
                return Str::limit($data->title, 30);
            })
            ->addColumn('category', function(Berita $berita) {
                return $berita->category->title;
            })
            ->addColumn('author', function(Berita $berita) {
                return $berita->author->name;
            })
            ->addColumn('status', function(Berita $berita) {
                if(! is_null($berita->published_at)) {
                    return '<span class="badge badge-pill badge-success">Published</span>';
                } elseif(is_null($berita->published_at)) {
                    return '<span class="badge badge-pill badge-warning">Draft</span>';
                }
            })
            ->rawColumns(['action', 'status'])
            ->toJson();
        }

        return view('admin.berita.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('publish')) {
            $messages = [
                'title.required' => 'Mohon masukkan judul',
                'slug.required' => 'Mohon masukkan slug',
                'slug.unique' => 'Slug sudah digunakan',
                'content.required' => 'Mohon masukkan konten berita',
                'category.required' => 'Mohon pilih kategori berita, atau buat baru di halaman kategori',
                'image.image' => 'Silakan pilih hanya file gambar, jpg|png|webp|bitmap|bmp|gif|svg|webp',
                'image.required' => 'Silakan pilih thumbnail terlebih dahulu'
            ];

            $rules = [
                'title' => 'required',
                'slug' => 'required|unique:news,slug',
                'content' => 'required',
                'category' => 'required',
                'image' => 'image|required'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if(! $validator->fails()) {
                $content = $request->content;

                $dom = new \domdocument();
                $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $images = $dom->getelementsbytagname('img');

                foreach($images as $k => $img) {
                    $src = $img->getAttribute('src');
                    if(preg_match('/data:image/', $src)){                
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimetype = $groups['mime'];                
                        $filename = uniqid();
                        $filepath = "/content/uploads/$filename.$mimetype";    
                        $image = Image::make($src)
                          ->encode($mimetype, 100)
                          ->save(public_path($filepath));                
                        $new_src = asset($filepath);
                        $img->removeAttribute('src');
                        $img->setAttribute('src', $new_src);
                    }
                }

                $content = $dom->savehtml();
                $thumbnail = $this->handleImage($request->file('image'));
                $data = [
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'description' => $request->description,
                    'content' => $content,
                    'category_id' => $request->category,
                    'image' => $thumbnail,
                    'user_id' => auth()->user()->id,
                    'published_at' => Carbon::now()
                ];
                $created = Berita::create($data);
                if($created) {
                    return redirect()->route('admin.berita.index')->with('status', 'Berita Berhasil Ditambahkan');
                } else {
                    return redirect()->route('admin.berita.tambah');
                }
            } else {
                return redirect('/admin/berita/tambah')->withErrors($validator)->withInput();
            }
        } elseif($request->has('draft')) {
             $messages = [
                'title.required' => 'Mohon masukkan judul',
                'slug.required' => 'Mohon masukkan slug',
                'slug.unique' => 'Slug sudah digunakan',
                'content.required' => 'Mohon masukkan konten berita',
                'category.required' => 'Mohon pilih kategori berita, atau buat baru di halaman kategori',
                'image.image' => 'Silakan pilih hanya file gambar, jpg|png|webp|bitmap|bmp|gif|svg|webp',
                'image.required' => 'Silakan pilih thumbnail terlebih dahulu'
            ];

            $rules = [
                'title' => 'required',
                'slug' => 'required|unique:news,slug',
                'content' => 'required',
                'category' => 'required',
                'image' => 'image|required'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if(! $validator->fails()) {
                $content = $request->content;

                $dom = new \DOMDocument();
                $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $images = $dom->getelementsbytagname('img');

                foreach($images as $k => $img) {
                    $src = $img->getAttribute('src');
                    if(preg_match('/data:image/', $src)){                
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimetype = $groups['mime'];                
                        $filename = uniqid();
                        $filepath = "/content/uploads/$filename.$mimetype";    
                        $image = Image::make($src)
                          ->encode($mimetype, 100)
                          ->save(public_path($filepath));                
                        $new_src = asset($filepath);
                        $img->removeAttribute('src');
                        $img->setAttribute('src', $new_src);
                    }
                }

                $content = $dom->savehtml();
                $thumbnail = $this->handleImage($request->file('image'));
                $data = [
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'description' => $request->description,
                    'content' => $content,
                    'category_id' => $request->category,
                    'image' => $thumbnail,
                    'user_id' => auth()->user()->id,
                    'published_at' => NULL
                ];
                $created = Berita::create($data);
                if($created) {
                    return redirect()->route('admin.berita.index')->with('status', 'Berita Berhasil Ditambahkan');
                } else {
                    return redirect()->route('admin.berita.tambah');
                }
            } else {
                return redirect('/admin/berita/tambah')->withErrors($validator)->withInput();
            }
        }
    }

    public function handleImage($image, $edit = false, $id = null)
    {
        if(! $edit) {
            $image_name = time() . uniqid() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('uploads', $image, $image_name);
            return $image_name;
        } else {
            $berita = Berita::findOrFail($id);
            Storage::delete('uploads/' . $berita->image);
            $image_name = time() . uniqid() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('uploads', $image, $image_name);
            return $image_name;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Berita $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        return view('berita.show', [
            'berita' => $berita
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', [
            'berita' => $berita
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        if($request->has('publish')) {
            $messages = [
                'title.required' => 'Mohon masukkan judul',
                'slug.required' => 'Mohon masukkan slug',
                'slug.unique' => 'Slug sudah digunakan',
                'content.required' => 'Mohon masukkan konten berita',
                'category.required' => 'Mohon pilih kategori berita, atau buat baru di halaman kategori',
                'image.image' => 'Silakan pilih hanya file gambar, jpg|png|webp|bitmap|bmp|gif|svg|webp',
            ];

            $rules = [
                'title' => 'required',
                'slug' => 'required|unique:news,slug,' . $berita->id,
                'content' => 'required',
                'category' => 'required',
                'image' => 'image'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if(! $validator->fails()) {
                $content = $request->content;

                $dom = new \domdocument();
                $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $images = $dom->getelementsbytagname('img');

                foreach($images as $k => $img) {
                    $src = $img->getAttribute('src');
                    if(preg_match('/data:image/', $src)){                
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimetype = $groups['mime'];                
                        $filename = uniqid();
                        $filepath = "/content/uploads/$filename.$mimetype";    
                        $image = Image::make($src)
                          ->encode($mimetype, 100)
                          ->save(public_path($filepath));                
                        $new_src = asset($filepath);
                        $img->removeAttribute('src');
                        $img->setAttribute('src', $new_src);
                    }
                }

                $content = $dom->savehtml();
                $thumbnail = $request->has('image') ? $this->handleImage($request->file('image'), true, $id) : $berita->image;
                $data = [
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'description' => $request->description,
                    'content' => $content,
                    'category_id' => $request->category,
                    'image' => $thumbnail,
                    'user_id' => auth()->user()->id,
                    'published_at' => $request->has('publish') ? Carbon::now() : Arr::get($berita->getAttributes(), 'published_at')
                ];
                $updated = $berita->update($data);
                if($updated) {
                    return redirect()->route('admin.berita.index')->with('status', 'Berita Berhasil Diubah');
                } else {
                    return redirect()->route('admin.berita.edit', $berita->id);
                }
            } else {
                return redirect()->route('admin.berita.edit', $berita->id)->withErrors($validator)->withInput();
            }
        } elseif($request->has('draft')) {
             $messages = [
                'title.required' => 'Mohon masukkan judul',
                'slug.required' => 'Mohon masukkan slug',
                'slug.unique' => 'Slug sudah digunakan',
                'content.required' => 'Mohon masukkan konten berita',
                'category.required' => 'Mohon pilih kategori berita, atau buat baru di halaman kategori',
                'image.image' => 'Silakan pilih hanya file gambar, jpg|png|webp|bitmap|bmp|gif|svg|webp',
            ];

            $rules = [
                'title' => 'required',
                'slug' => 'required|unique:news,slug,' . $berita->id,
                'content' => 'required',
                'category' => 'required',
                'image' => 'image'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if(! $validator->fails()) {
                $content = $request->content;

                $dom = new \domdocument();
                $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $images = $dom->getelementsbytagname('img');

                foreach($images as $k => $img) {
                    $src = $img->getAttribute('src');
                    if(preg_match('/data:image/', $src)){                
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimetype = $groups['mime'];                
                        $filename = uniqid();
                        $filepath = "/content/uploads/$filename.$mimetype";    
                        $image = Image::make($src)
                          ->encode($mimetype, 100)
                          ->save(public_path($filepath));                
                        $new_src = asset($filepath);
                        $img->removeAttribute('src');
                        $img->setAttribute('src', $new_src);
                    }
                }

                $content = $dom->savehtml();
                $thumbnail = $request->has('image') ? $this->handleImage($request->file('image'), true, $id) : $berita->image;
                $data = [
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'description' => $request->description,
                    'content' => $content,
                    'category_id' => $request->category,
                    'image' => $thumbnail,
                    'user_id' => auth()->user()->id,
                    'published_at' => NULL
                ];
                $updated = $berita->update($data);
                if($updated) {
                    return redirect()->route('admin.berita.index')->with('status', 'Berita Berhasil Diubah');
                } else {
                    return redirect()->route('admin.berita.edit', $berita->id);
                }
            } else {
                return redirect()->route('admin.berita.edit', $berita->id)->withErrors($validator)->withInput();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        $berita->delete();
        return response()->json(['code' => 200, 'message' => 'Sukses Hapus Berita!']);
    }
}
