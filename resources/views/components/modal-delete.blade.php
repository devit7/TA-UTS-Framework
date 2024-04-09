<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $nim }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data {{ $nama }} ini?
            </div>
            <form class="modal-footer" action="{{ route('data-diri.destroy',['data_diri' => $nim]) }}">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
