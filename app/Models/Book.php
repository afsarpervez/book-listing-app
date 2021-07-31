<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'author', 'edition', 'part', 'price', 'sales_price', 'keywords', 'category_id', 'up_file'];


    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str::slug($value);
        // $this->attributes['file'] =$value;
    }


    // public function setUpFileAttribute($value)
    // {
    //     $this->attributes['up_file'] = $value['basename'];
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function($book){
            $book->category->increment('books_count');
        });

        static::deleted(function($book){
            $book->category->decrement('books_count');
        });
    }

    // public function getRouteKeyName() {
    //     return 'slug';
    // }
}
