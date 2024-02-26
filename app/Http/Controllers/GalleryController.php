<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();

        return view('admin.galleries.index',[
            'title' => 'Galleri Foto',
            'galleries' => $galleries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all();


        return view('admin.galleries.create',[
            'title' => 'Tambah Galeri Foto',
            'posts' => $posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gallery::create([
            'post_id' =>$request->post_id,
            'position' =>$request->position,
            'status' =>$request->status,

        ]);

        //Redirect ke halaman index gallery
        return redirect('/galleries')->with('success','Galeri foto berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //tampilkan view detail gallery
        return view('admin.galleries.show',[
            'title' => 'Detai Galleri Foto',
            'gallery' => $gallery,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //ambil semua data post
        $posts = Post::all();

        //tampilkan view form edit gallery
        return view('admin.galleries.edit',[
            'title' => 'Edit Galeri Foto',
            'gallery' => $gallery,
            'posts' => $posts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //update data galeri
        $gallery->update([
            'post_id'=> $request->post_id,
            'position'=> $request->position,
            'status'=> $request->status,

        ]);

        return redirect('/galleries')->with('success', 'Galeri foto berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //hapus file foto
        foreach ($gallery->images as $image) {
            if (file_exists(public_path('images' .$image->file))) {
                unlink(public_path($gallery->file));
            }
        }
        //hapus data image yang berkaitan dengan gallery
        $gallery->images()->delete();
        //hapus data galery
        $gallery->delete();

        //
        return redirect('/galleries')->with('success', 'Galeri foto berhasil dihapus');
    }
}
