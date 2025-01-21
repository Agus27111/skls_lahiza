<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'url',
        'thubmnail',
        'class_model_id',
    ];

    public function classModel() {
        return $this->belongsTo(ClassModel::class, 'class_model_id');
    }

}
