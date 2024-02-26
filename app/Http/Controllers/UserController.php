<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('admin.manajemen-admin.index',[
            'title' => 'Manajemen Admin',
            'users' => $users,
    
        ]);
    }
    public function create(){
        return view('admin.manajemen-admin.create', [
            'title' => 'Tammbah Admin'
           
        ]);
    }
    
    public function store(Request $request){

        //simpan data ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>bcrypt($request->password),
        ]);
        //kembali ke halaman manajemen admin
        return redirect('/users')->with('success','Data admin baru berhasil disimpan!');
    }
    //method untuk menampilkan form edit admin
    public function edit($id){
        //cari data admin berdasarkan id
        $user= user::find($id);

        return view('admin.manajemen-admin.edit',[
            'title' => 'Edit Admin',
            'user' => $user,
        ]);

    }
    //method utk menyimpan perubahan admin
    public function update(Request $request, $id){
        //cari data admin berdasarkan id
        $user= user::find($id);
        //update data admin
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>bcrypt($request->password),
        ]);
        //kembali ke halaman manajemen admin
        return redirect('/users')->with('success','Data admin baru berhasil di edit!');

    }
    //method utk menghapus data admin
    public function destroy($id){
        $user= user::find($id);

        //hapus data admin
        $user->delete();
        //kembalikan ke halaman manajemen aadmin
        return redirect('/users')->with('success','Data admin berhasil di hapus!');
    }
}