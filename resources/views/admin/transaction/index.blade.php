@extends('layouts.app')

@section('title')
<title>HIMTI Store - Transaksi</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data Transaksi</h5>
            <p class="mb-0">
                <table class="table datatab">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Pembeli</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th><i class="ti ti-settings"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $transaksi)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $transaksi->product->name }}</td>
                            <td>{{ $transaksi->user->name }}</td>
                            <td>{{ $transaksi->quantity }}</td>
                            <td>{{ "Rp".number_format($transaksi->price_total,2,',','.') }}</td>
                            <td><a href="" class="btn btn-light-info text-primary" data-bs-toggle="modal"
                                data-bs-target="#ModalShow{{ $transaksi->id }}">
                                <i class="ti ti-eye fs-5 text-center"></i>
                            </a>
                            <a href="" class="btn btn-light-primary text-primary" data-bs-toggle="modal"
                                data-bs-target="#ModalEdit{{ $transaksi->id }}">
                                <i class="ti ti-pencil fs-5 text-center"></i>
                            </a>
                            <a href="" class="btn btn-light-danger text-danger" data-bs-toggle="modal"
                                data-bs-target="#ModalDelete{{ $transaksi->id }}">
                                <i class="ti ti-trash fs-5 text-center"></i>
                            </a></td>
                        </tr>
                        {{-- @include('admin.category.edit') --}}
                        {{-- @include('admin.category.delete') --}}
                        @endforeach
                    </tbody>
                </table>
            </p>
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
