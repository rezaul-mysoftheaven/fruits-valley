{{-- Permanent Delete Modal --}}
<div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Warning!!!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <strong class="text-secondary lead"> Are You Sure? You Want to Delete this Item?</strong> <br> 
              <p class="lead text-danger">You Can't restore this item in future.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="{{ route('fr_delete', ['id' => $item->id]) }}">Delete</a>
            </div>
        </div>
    </div>
  </div>