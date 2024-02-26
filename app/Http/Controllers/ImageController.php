<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function store(Request $request){
        //validasidata request
        $request->validate([
            'gallery_id' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048',
            'title' => 'required',
        ]);
        //ambil file yang di upload
        $file = $request->file('file');

        //nama file
        $fileName = time() . '-' . $file->extension();

        //pindahkan file ke folder publik/images
        $file->move(public_path('images'), $fileName);

        //simpan data ke database
        Image::create([
            'gallery_id' => $request->gallery_id,
            'file' => $fileName,
            'title' => $request->title,
        ]);

 // redirect ke halaman sebelumnya
        return back()->with('success', 'Foto berhasil di tambahkan');

    }

    //
    public function destroy($id)
    {
        //ambil data image berdasarkan id
        $image = Image::find($id);

        //hapus file dari folder public/images
        //unlink(public_path('images/ . $image->file'));

        //hapus data dari database
        $image->delete();

        //redirect ke halaman sebelumnya
        return back()->with('success', 'Foto berhasil di hapus');

        //
    }
}
