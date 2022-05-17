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
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Points</th>
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
                            <td class="text-darker text-center">{{ $order->status->name }}</td>
                            <td class="text-darker text-center">{{ $order->order_points }}</td>
                            <td class="text-center">
                                <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-toggle="modal"
                                        data-target="#{{ 'order-view-modal-' . $order->id }}" title="View">
                                        <i class="fa-solid fa-eye"></i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm " data-toggle="modal"
                                        data-target="#{{ 'order-delete-confirmation-modal-' . $order->id }}" title="Delete">
                                    <i class="ni ni-fat-remove pt-1"></i>
                                </button>
                            </td>
                            @include('pages.dashboard.orders.modals.ViewOrderModal', ['order' => $order])
                            @include('pages.dashboard.orders.modals.DeleteOrderModal', ['order' => $order])
                        </tr>
                    @empty
                        <tr><td colspan="5">No orders found!</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center text-dark">
                {!! $orders->links() !!}
            </div>
        </div>
    </div>
</div>
