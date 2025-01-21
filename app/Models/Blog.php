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
        'slug',
        'title',
        'author',
        'content',
        'image',
    ];

    // Mutator untuk slug
    public function setSlugAttribute($value)
    {
        // Jika slug tidak diberikan, otomatis buat slug dari title
        if (empty($value)) {
            $this->attributes['slug'] = Str::slug($this->title);
        } else {
            $this->attributes['slug'] = $value;
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
