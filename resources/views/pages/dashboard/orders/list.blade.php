<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-image table-borderless table-hover rounded table-condensed">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Customer</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Purchased At</th>
                        <th scope="col" class="text-center">Address</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td class="text-darker text-center">{{ $order->customer->name() }}</td>
                            <td class="text-darker text-center">{{ $order->totalPrice() }}</td>
                            <td class="text-darker text-center">{{ $order->order_datetime }}</td>
                            <td class="text-darker text-center">{{ $order->address }}</td>
                            <td class="text-darker text-center"></td>
                            <td>
                                @include('components.buttons.UpdateDeleteButtonGroup',
                                        ['updateModalName' => 'orders-update-modal-' . $order->id],
                                        ['deleteModalName' => 'orders-delete-confirmation-modal-' . $order->id])
                            </td>
                            @include('pages.dashboard.orders.modals.DeleteOrderModal', ['order' => $order])
                            @include('pages.dashboard.orders.modals.UpdateOrderModal', ['order' => $order])
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">No orders found!</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center text-dark">
                {!! $orders->links() !!}
            </div>
        </div>
    </div>
</div>
