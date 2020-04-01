<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Berita extends Model
{
	protected $table = 'news';
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
    	return Carbon::parse($value)->diffForHumans();
    }
}
