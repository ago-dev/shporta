<div class="modal fade" id="order-view-modal-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="order-view-modal-label"
     aria-hidden="true">
    <form id="update-employee-form" role="form" method="POST" enctype="multipart/form-data" action="#">
        @method('PUT')
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    text
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"
                            formaction="{{ route('order-update', ['id' => $order->id, 'status' => 'delivered']) }}">Deliver</button>
                    <button type="submit" class="btn btn-danger" 
                            formaction="{{ route('order-update', ['id' => $order->id, 'status' => 'rejected']) }}">Reject</button>
                </div>
            </div>
        </div>
    </form>
</div>