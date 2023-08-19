@extends('layouts.app')

@section('title')
<title>HIMTI Store - Produk</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <button type="button" class="btn mb-1 btn-light-primary text-primary btn-lg px-4 fs-4 font-medium"
                    data-bs-toggle="modal" data-bs-target="#tambahproduk">
                    Tambah Produk
                </button>
            </div>
            <h5 class="card-title fw-semibold mb-4">Data Produk</h5>
            <p class="mb-0">
                <table class="table datatab">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th><i class="ti ti-settings"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $produk)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $produk->name }}</td>
                            <td>{{ $produk->category->name }}</td>
                            <td>{{ "Rp".number_format($produk->price,2,',','.') }}</td>
                            <td>{{ $produk->stock }}</td>
                            <td><a href="" class="btn btn-light-primary text-primary" data-bs-toggle="modal"
                                data-bs-target="#ModalEdit{{ $produk->id }}">
                                <i class="ti ti-pencil fs-5 text-center"></i>
                            </a>
                            <a href="" class="btn btn-light-danger text-danger" data-bs-toggle="modal"
                                data-bs-target="#ModalDelete{{ $produk->id }}">
                                <i class="ti ti-trash fs-5 text-center"></i>
                            </a></td>
                        </tr>
                        @include('admin.product.edit')
                        @include('admin.product.delete')
                        @endforeach
                    </tbody>
                </table>
            </p>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahproduk" tabindex="-1" role="dialog" aria-labelledby="tambahprodukmodalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white">Tambah Produk</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <form action="{{ route('admin.product.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="note-title">
                                        <label>Kategori</label>
                                        <div class="mt-2">
                                            <select class="form-select mr-sm-2" name="category_id" required>
                                                <option>--- Pilih Kategori ---</option>
                                                @foreach ($categories as $kategori)
                                                    <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="note-title">
                                        <label>Nama Produk</label>
                                        <div class="mt-2">
                                            <input type="text" class="form-control" name="name" placeholder="Nama Produk" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="note-title">
                                        <label class="mb-2">Gambar Produk</label>
                                        <input class="form-control" type="file" name="image" accept="image/jpg,image/jpeg,image/png">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Harga</label>
                                        <div class="mt-2">
                                            <input type="number" class="form-control" name="price" placeholder="Masukkan Harga" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Stok</label>
                                        <div class="mt-2">
                                            <input type="number" class="form-control" name="stock" placeholder="Masukkan Jumlah Stock" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="note-title">
                                        <label>Stok</label>
                                        <div class="mt-2">
                                            <textarea id="editor" name="description"></textarea>
                                        </div>
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

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
