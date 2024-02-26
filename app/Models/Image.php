<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    //definisikan field yang boleh diisi
    protected $fillable = [
        'gallery_id',
        'file',
        'title',
    ];
    //relasi ke gallery
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
