<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use SoftDeletes;

	protected $table = 'news';
    protected $fillable = ['title', 'slug', 'description', 'image', 'content', 'published_at', 'user_id', 'category_id'];
    
    public function scopePublished($query)
    {
    	return $query->where('published_at', '<=', Carbon::now());
    }

    public function author()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function getPublishedAtAttribute($value)
    {
    	if(! is_null($value)) {
            return Carbon::parse($value)->diffForHumans();
        } else {
            return $value;
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
