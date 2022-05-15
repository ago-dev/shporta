<div class="modal fade" id="order-delete-confirmation-modal-{{$order->id}}" tabindex="-1" role="dialog"
     aria-labelledby="order-delete-confirmation-modal-label" aria-hidden="true">
    <form role="form" method="POST" action="{{ route('order-delete', ['id' => $order->id]) }}">
        @csrf
        @include('components.modals.DeleteConfirmationModal',
               ['modalTitle' => 'Remove Order?',
                'content'  => 'order from ' . $order->customer->name() . ' at ' . $order->address])
    </form>
</div>
