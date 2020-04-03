<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['title', 'slug'];
    public function news()
    {
    	return $this->hasMany(Berita::class, 'category_id');
    }

    public function getCreatedAtAttribute($value)
    {
    	return \Carbon\Carbon::parse($value)->format('d M Y H:i:s');
    }
}
