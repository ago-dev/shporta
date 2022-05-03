<div class="modal fade" id="food-service-update-modal" tabindex="-1" role="dialog" aria-labelledby="food-service-update-modal-label"
     aria-hidden="true">
    <form id="update-employee-form" role="form" method="POST" action="{{ route('food-service-update', ['id' => $foodService->id]) }}">
        @method('PUT')
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="text-black-50 text-capitalize">
                        <i class="ni ni-circle-08"></i>
                        Edit Food Service Data
                    </h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



                <button type="submit" class="btn btn-danger mt-4">{{ __('Update') }}</button>
            </div>
        </div>
    </form>
</div>
