<div class="modal fade" id="ModalEdit{{ $kategori->id }}" tabindex="-1" role="dialog" aria-labelledby="tambahobatmodalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white">Ubah Data Kategori</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <form class="row g-3" action="{{ route('admin.category.update', ['id' => $kategori->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">

                                <div class="col-md-12 mt-3">
                                    <div class="note-title">
                                        <label>Nama Kategori</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('nama', $kategori->name) }}" />
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="note-title">
                                        <label class="mb-2">Gambar Kategori</label>
                                        <input type="hidden" name="oldImage" value="{{ $kategori->image }}">
                                        <input class="form-control" type="file" name="image" accept="image/jpg,image/jpeg,image/png">
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
