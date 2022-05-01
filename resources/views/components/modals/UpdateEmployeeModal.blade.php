<div class="modal fade" id="employee-update-modal" tabindex="-1" role="dialog" aria-labelledby="employee-update-modal-label"
     aria-hidden="true">
    <form role="form" method="POST" action="{{ route('employee-update', ['id' => $employee->id]) }}">
        @method('PUT')
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="employee-modal-title text-black-50 text-capitalize">
                        <i class="ni ni-circle-08"></i>
                        Edit Employee
                    </h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @include('components.RegisterForm', ['employeeUpdateView' => true, 'employeeView' => false])
            </div>
        </div>
    </form>
</div>
