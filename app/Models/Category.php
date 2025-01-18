<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'color',
    ];

    public function blog(){
        return $this->hasMany(Blog::class, 'category_id');
    }

}
