<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-image table-borderless table-hover rounded table-condensed">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Customer</th>
                        <th scope="col" class="text-center">Food Service</th>
                        <th scope="col" colspan="3">Price</th>
                        <th scope="col">Purchased At</th>
                        <th scope="col">Address</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                    <tr>
                        <td class="text-darker">{{ $order->customer->name }}</td>
                        <td class="text-darker" colspan="3">{{ $order->description }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    @empty
                        <tr>
                            <td colspan="5">No Food Services found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center text-dark">
                {!! $orders->links() !!}
            </div>
        </div>
    </div>
</div>
