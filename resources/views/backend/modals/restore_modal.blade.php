{{-- Restore From Trash Modal --}}
<div class="modal fade" id="restoreModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-success" id="exampleModalLabel">Confirmation!!!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <strong class="text-secondary lead"> Are You Sure? You Want to Restore this Item?</strong> <br> 
              <p class="lead text-success">Restoring this item, It will be show in Landing Page.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-success" href="{{ route('restore_fruits', ['id' => $item->id]) }}">Restore</a>
            </div>
        </div>
    </div>
  </div>