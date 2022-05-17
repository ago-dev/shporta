<div class="modal fade" id="purchase-confirmation-modal" tabindex="-1" role="dialog"
     aria-labelledby="purchase-confirmation-modal-label" aria-hidden="true">
    <form id="purchase-form" role="form" method="POST"
          action="{{ route('purchase.order') }}">
        @csrf

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold fa-1x text-black-50"><b>
                            Ready to make the purchase?</b></h5>
                    <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Total price: ${{ $totalPrice }}
                    <br><br>
                    <small>* Please, enter the address for delivery</small>
                    <input class="form-control" type="text" name="address" placeholder="Enter address" required/>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Order</button>
                </div>
            </div>
        </div>
    </form>
</div>

