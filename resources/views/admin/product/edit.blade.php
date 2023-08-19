<div class="modal fade" id="ModalEdit{{ $produk->id }}" tabindex="-1" role="dialog" aria-labelledby="tambahobatmodalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white">Ubah Data Produk</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <form class="row g-3" action="{{ route('admin.product.update', ['id' => $produk->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Kategori</label>
                                        <div class="mt-2">
                                            <select class="form-select mr-sm-2" name="category_id" required>
                                                @foreach ($categories as $kategori)
                                                    <option value="{{ $kategori->id }}"
                                                        {{ $kategori->id == $produk->category_id ? 'selected' : '' }}>
                                                        {{ $kategori->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Nama Produk</label>
                                        <div class="mt-2">
                                            <input type="text" class="form-control" name="name" value="{{ old('name', $produk->name) }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="note-title">
                                        <label class="mb-2">Gambar Produk</label>
                                        <input type="hidden" name="oldImage" value="{{ $produk->image }}">
                                        <input class="form-control" type="file" name="image" accept="image/jpg,image/jpeg,image/png">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Harga</label>
                                        <div class="mt-2">
                                            <input type="number" class="form-control" name="price" value="{{ old('price', $produk->price) }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Stok</label>
                                        <div class="mt-2">
                                            <input type="number" class="form-control" name="stock" value="{{ old('stock', $produk->stock) }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="note-title">
                                        <label>Deskripsi</label>
                                        <div class="mt-2">
                                            <textarea id="editor" name="description">{{ $produk->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>
