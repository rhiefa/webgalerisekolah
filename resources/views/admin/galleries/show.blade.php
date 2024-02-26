@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Judul Post</td>
                            <td>:</td>
                            <td>{{ $gallery->post->title }}</td>
                        </tr>

                        <tr>
                            <td>Posisi</td>
                            <td>:</td>
                            <td>{{ $gallery->position ?? '-' }}</td>
                        </tr>

                        <tr>
                            <td>Posisi</td>
                            <td>:</td>
                            <td>
                                @if ($gallery->status == 'aktif')
                                    <span class="badge bg-success">{{ Str::ucfirst($gallery->status) }}</span>
                                @else
                                    <span class="badge bg-warning">{{ Str::ucfirst($gallery->status) }}</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Dibuat Pada</td>
                            <td>:</td>
                            <td>{{ \Carbon\Carbon::parse($gallery->created_at)->format('d M Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="m-0 p-0"><i data-feather="image"></i>Foto</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addImageModal">
                        +Foto
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-lg">
                            <form action="/images/store" method="POST" enctype="multipart/form-data" class="modal-content">
                                @csrf
                                <h1 class="modal-title fs-5 text-secondary" id="addImageModalLabel">Tambah Foto</h1>
                        
                                <div class="m-3">
                                    <label for="formFile" class="form-label">Foto</label>
                                    <input class="form-control" name="file" type="file" id="formFile">
                                  </div>
                                <div class="modal-body text-dark">
                                    <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
                                    <div class="m-3">
                                        <label for="formFile" class="form-label">Judul</label>
                                        <input class="form-control" name="title" type="text" id="formFile">
                                      </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-light">

                 @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="m-0 p-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif 

                                
                           
                    <div class="row">
                        @forelse ($gallery->images as $image)
                            <div class="col-12 col-md-4">
                                <div class="card">
                                    <img src="{{ asset('images/' . $image->file) }}" alt="{{ $image->title }}" class="img-fluid">
                                  <div class="p-2">
                                    <h5>{{ $image->title }}</h5>

                                    <form action="/images/{{ $image->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link btn-sm d-block ms-auto" onclick="return confirm('Apakah Anda Yakin?')">
                                        <i data-feather="trash-2" class="text-danger"></i>
                                    </button>
                                    </form>
                                  </div>
                                </div>
                            </div>
                    </div>
                    @empty
                        <div class="col-12"
                            <div class="alert alert-warning">Tidak Ada Foto.</div>
                </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
