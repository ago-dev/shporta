<form role="form" method="POST" action="{{ route('register') }}">
    @csrf
    <!-- Add Employee -->
    <button type="button" class="btn btn-success action-btn" data-toggle="modal" data-target="#employeeModal">
        <i class="ni ni-circle-08"></i> Add Employee
    </button>

    <button type="button" class="btn btn-info action-btn" data-toggle="modal" data-target="#employeeModal">
        <i class="ni ni-chart-bar-32"></i> Stats
    </button>

    <!-- Add Employee Modal -->
    <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="employee-modal-title">
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
    <br><br>
</form>
