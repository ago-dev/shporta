<div class="modal fade" id="order-update-modal-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="order-update-modal-label"
     aria-hidden="true">
    <form id="update-employee-form" role="form" method="POST" enctype="multipart/form-data"
          action="{{ route('order-update', ['id' => $order->id]) }} ">
        @method('PUT')
        @csrf
        <div class="modal-dialog" role="document">
        </div>
    </form>
</div>