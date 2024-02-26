<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
        {
            //Ambil data gallery dengan judul post slider yang status nya aktif
            $gallery = Post::where('title', 'Slider')->first()->galleries->where('status', 'aktif')->first();

           //dapatkan data images dari hasil slider gallery
            $sliders = $gallery->images;

            //ambil data post dengan kategori sekolah,kecuali judul slider
            $posts = Post::whereHas('category', function ($query){
                $query->where('title', 'Galeri Sekolah');
              })->where('title', '!=', 'Slider')->get();
          
            return view('welcome', [
                'sliders' => $sliders,
                'posts' => $posts,
            ]);
        }
    }

