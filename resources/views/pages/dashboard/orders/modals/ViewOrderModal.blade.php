<div class="modal fade" id="order-view-modal-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="order-view-modal-label"
     aria-hidden="true">
    <form id="update-employee-form" role="form" method="POST" enctype="multipart/form-data" action="#">
        @method('PUT')
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h1>Items</h1>
                    @forelse ($order->items as $item)
                        <b>{{$item->name}}: </b>
                        <span>${{$item->price}}</span><br>
                    @empty
                        No items found!
                    @endforelse
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"
                            formaction="{{ route('order-update', ['id' => $order->id, 'status' => 'Delivered']) }}">Deliver</button>
                    <button type="submit" class="btn btn-danger" 
                            formaction="{{ route('order-update', ['id' => $order->id, 'status' => 'Rejected']) }}">Reject</button>
                </div>
            </div>
        </div>
    </form>
</div>