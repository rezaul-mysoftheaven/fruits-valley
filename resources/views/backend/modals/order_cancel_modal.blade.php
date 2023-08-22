{{-- Order Cancel Modal --}}
<div class="modal fade" id="orderCancelModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Confirmation!!!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <strong class="text-secondary lead"> Are You Sure? You Want to Cancel this Order?</strong> <br> 
              <p class="lead text-danger">Please ensure that you didn't deliver this product.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="{{ route('order.cancel', ['id' => $item->id]) }}">Cancel Order</a>
            </div>
        </div>
    </div>
  </div>