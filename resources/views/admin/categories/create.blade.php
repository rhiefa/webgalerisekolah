@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="/categories" method="post">
            @csrf
        <div class="form-group mb-3">
            <label for="title">Judul</label>
            <input type="text"class="form-control" name="title" id="title" required>
        </div>
        
        <button class="btn btn-purple d-block mx-auto" type="submit">Simpan</button>
    </form>
    </div>
</div>
@endsection
