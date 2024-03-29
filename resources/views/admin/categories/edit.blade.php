@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="/categories/{{ $category->id }}" method="post">
            @csrf
            @method('put')
        <div class="form-group mb-3">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $category->title }}">
        </div>
        
        <button class="btn btn-purple" type="submit">Simpan</button>
    </form>
    </div>
</div>
@endsection
