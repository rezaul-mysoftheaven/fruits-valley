{{-- Soft Delete Modal --}}
<div class="modal fade" id="softDeleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5 text-warning" id="exampleModalLabel">Confirmation!!!</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <strong class="text-secondary lead"> Are You Sure? You Want to Move this Item in Trash?</strong> <br> 
            <p class="lead text-success">You may restore this item in future.</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              <a class="btn btn-warning" href="{{ route('fr_soft_delete', ['id' => $item->id]) }}">Move to Trash</a>
          </div>
      </div>
  </div>
</div>