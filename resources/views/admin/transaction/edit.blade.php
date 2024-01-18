<div class="modal fade" id="ModalEdit{{ $transaksi->id }}" tabindex="-1" role="dialog" aria-labelledby="tambahobatmodalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <form action="{{ route('admin.transaction.update', ['id' => $transaksi->id]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-header bg-warning">
                    <h6 class="modal-title text-white">Edit</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <div class="row g-3">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <div class="note-title">
                                            <label>Status</label>
                                            <div class="mt-2">
                                                <select class="form-select mr-sm-2" name="status" required>
                                                    <option value="Pending" @if($transaksi->status == "Pending") selected @endif >Pending</option>
                                                    <option value="Success" @if($transaksi->status == "Success") selected @endif >Success</option>
                                                    <option value="Decline" @if($transaksi->status == "Decline") selected @endif >Decline</option>
                                                </select>
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
                    
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
