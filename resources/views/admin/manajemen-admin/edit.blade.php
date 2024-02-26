@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="/users/{{ $user->id }}/update" method="post">
            @csrf
            @method('put')
        <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email}}">
        </div>
        <div class="form-group mb-3">
            <label for="password">password</label>
            <small>kosongkan jika tidak ingin mengubah password</small>
            <input type="password" class="form-control" name="password">
        </div>
        
        <button class="btn btn-purple" type="submit">Simpan</button>
    </form>
    </div>
</div>
@endsection
