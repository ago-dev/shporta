<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="employee-modal-title text-blue text-capitalize">
                    <i class="ni ni-circle-08"></i>
                    Create a new employee
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @include('components.RegisterForm', ['employeeView' => true])
        </div>
    </div>
</div>
