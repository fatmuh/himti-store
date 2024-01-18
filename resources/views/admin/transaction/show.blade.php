<div class="modal fade" id="ModalShow{{ $transaksi->id }}" tabindex="-1" role="dialog" aria-labelledby="tambahobatmodalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white">Show</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <div class="row g-3">
                            <div class="row">

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Invoice Code</label>
                                        <div class="mt-2">
                                            <input type="text" class="form-control" name="name" value="{{ old('name', $transaksi->uniq) }}" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Nama - Pembeli</label>
                                        <div class="mt-2">
                                            <input type="text" class="form-control" name="name" value="{{ old('name', $transaksi->user->name) }}" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Email - Pembeli</label>
                                        <div class="mt-2">
                                            <input type="text" class="form-control" name="name" value="{{ old('name', $transaksi->user->email) }}" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Metode Pembayaran</label>
                                        <div class="mt-2">
                                            <input type="text" class="form-control" name="name" value="{{ old('name', $transaksi->type_of_payment) }}" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="note-title">
                                        <label>Detail Tiket</label>
                                        <div class="row">
                                            <div class="text-center col-md-1 px-2 py-1" style="font-weight: bold">No</div>
                                            <div class="text-center col-md-4 px-2 py-1" style="font-weight: bold">Tiket Name</div>
                                            <div class="text-center col-md-2 px-2 py-1" style="font-weight: bold">Price</div>
                                            <div class="text-center col-md-2 px-2 py-1" style="font-weight: bold">Quantity</div>
                                            <div class="text-center col-md-3 px-2 py-1" style="font-weight: bold">Total</div>
@foreach($transaksi->detail as $detail)
                                            <div class="text-center border-b col-md-1">{{ $loop->iteration }}</div>
                                            <div class="text-center border-b col-md-4">{{ $detail->product->name }}</div>
                                            <div class="text-center border-b col-md-2">Rp {{ number_format($detail->base_price) }}</div>
                                            <div class="text-center border-b col-md-2">{{ $detail->qty }}</div>
                                            <div class="text-center border-b col-md-3">Rp {{ number_format($detail->base_total) }}</div>
@endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Status</label>
                                        <div class="mt-2">
                                            <input type="text" class="form-control" name="name" value="{{ old('name', $transaksi->status) }}" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Total Harga</label>
                                        <div class="mt-2">
                                            <input type="text" class="form-control" name="name" value="{{ old('name', $transaksi->price_total) }}" readonly />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
