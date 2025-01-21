<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'color',
    ];

    /**
     * Set the slug based on the name
     */
    public function setSlugAttribute($value)
    {
        // Menggunakan Str::slug untuk membuat slug dengan format huruf kecil dan spasi diganti dengan '-'
        $this->attributes['slug'] = Str::slug($this->name, '-');
    }

    public function blog(){
        return $this->hasMany(Blog::class, 'category_id');
    }

}
