<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //mendefinnisikan field yang boleh di isi
    protected $fillable = ['title'];

    //relasi ke post (one to many)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
