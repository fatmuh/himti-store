@extends('layouts.app')

@section('title')
<title>HIMTI Store - Profil</title>
@endsection

@section('content')

<div class="container-fluid">
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-lg-6 d-flex align-items-stretch">
                <div class="card w-100 position-relative overflow-hidden">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold">Ganti Foto Profil</h5>
                        <p class="card-subtitle mb-4">Ubah gambar profil Anda dari sini</p>
                        <div class="text-center">
                            @if(auth()->user()->profile_photo_path)
                            <img src="{{ asset('storage/'. old('profile_photo_path', auth()->user()->profile_photo_path)) }}" alt=""
                                class="img-fluid rounded-circle" width="120" height="120">
                            @else
                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt=""
                                class="img-fluid rounded-circle" width="120" height="120">
                            @endif
                            <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                                <input type="hidden" name="oldPhoto" value="{{ auth()->user()->profile_photo_path }}">
                                <input class="form-control" type="file" id="profile_photo_path" name="profile_photo_path" accept="image/jpg,image/jpeg,image/png">
                            </div>
                            <p class="mb-0">Diizinkan JPG, GIF, atau PNG. Ukuran maksimal 800kb</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
                <div class="card w-100 position-relative overflow-hidden">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold">Data Profil</h5>
                        <p class="card-subtitle mb-4">Untuk mengubah detail pribadi Anda , edit dan simpan dari sini</p>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="note-title">
                                    <label class="mb-2">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', auth()->user()->name) }}" />
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="note-description">
                                    <label class="mb-2">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', auth()->user()->email) }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
