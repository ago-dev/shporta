<div class="modal fade" id="order-update-modal-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="order-update-modal-label"
     aria-hidden="true">
    <form id="update-employee-form" role="form" method="POST" enctype="multipart/form-data"
          action="{{ route('order-update', ['id' => $order->id]) }} ">
        @method('PUT')
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    text
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Deliver</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Reject</button>
                </div>
            </div>
        </div>
    </form>
</div>