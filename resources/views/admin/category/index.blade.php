@extends('layouts.app')

@section('title')
<title>HIMTI Store - Kategori</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <button type="button" class="btn mb-1 btn-light-primary text-primary btn-lg px-4 fs-4 font-medium"
                    data-bs-toggle="modal" data-bs-target="#tambahkategori">
                    Tambah Kategori
                </button>
            </div>
            <h5 class="card-title fw-semibold mb-4">Data Kategori</h5>
            <p class="mb-0">
                <table class="table datatab">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Slug</th>
                            <th>Gambar</th>
                            <th><i class="ti ti-settings"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $kategori)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $kategori->name }}</td>
                            <td>{{ $kategori->slug }}</td>
                            <td>@if (old('image', $kategori->image))
                                <img src="{{ asset('storage/'. old('image', $kategori->image)) }}" width="50px"
                                    class="m-3">
                                @else
                                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                    width="50px" class="rounded-circle m-3">
                                @endif</td>
                            <td><a href="" class="btn btn-light-primary text-primary" data-bs-toggle="modal"
                                data-bs-target="#ModalEdit{{ $kategori->id }}">
                                <i class="ti ti-pencil fs-5 text-center"></i>
                            </a>
                            <a href="" class="btn btn-light-danger text-danger" data-bs-toggle="modal"
                                data-bs-target="#ModalDelete{{ $kategori->id }}">
                                <i class="ti ti-trash fs-5 text-center"></i>
                            </a></td>
                        </tr>
                        @include('admin.category.edit')
                        @include('admin.category.delete')
                        @endforeach
                    </tbody>
                </table>
            </p>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahkategori" tabindex="-1" role="dialog" aria-labelledby="tambahkategorimodalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white">Tambah Kategori</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <form action="{{ route('admin.category.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12 mt-2">
                                    <div class="note-title">
                                        <label>Nama Kategori</label>
                                        <div class="mt-2">
                                            <input type="text" class="form-control" name="name" placeholder="Nama Kategori" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="note-title">
                                        <label class="mb-2">Gambar Kategori</label>
                                        <input class="form-control" type="file" name="image" accept="image/jpg,image/jpeg,image/png">
                                    </div>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.datatab').DataTable();
    });

</script>
@endsection
