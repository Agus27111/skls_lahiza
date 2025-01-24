<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Blog extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'title',
        'author',
        'content',
        'image',
        'category_id',
        'slug',
    ];

    // Mutator untuk slug
    public function setSlugAttribute($value)
{
    $this->attributes['slug'] = $value ?: ($this->title ? Str::slug($this->title) : null);
}


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
