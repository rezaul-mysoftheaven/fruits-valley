{{-- Order Complete Modal --}}
<div class="modal fade" id="orderCompleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-success" id="exampleModalLabel">Confirmation!!!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <strong class="text-secondary lead"> Are You Sure? You Want to Complete this Order?</strong> <br> 
              <p class="lead text-success">"Please ensure that you delivered the product."</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-success" href="{{ route('order.complete', ['id' => $item->id]) }}">Complete</a>
            </div>
        </div>
    </div>
  </div>