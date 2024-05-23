<?php

namespace app\models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\user;

class book extends Models
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = 'books';
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'publication_year',
        'cover',
        'description',
        'price',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    public funtion data_adder(){
        return $this->belongsto(User::class,'created_by','id');
    }

}