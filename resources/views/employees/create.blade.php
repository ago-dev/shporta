<form role="form" method="POST" action="{{ route('employee-create') }}">
    @csrf
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <!-- Add Employee -->
    <button type="button" class="btn btn-success action-btn" data-toggle="modal" data-target="#employeeModal">
        <i class="ni ni-circle-08"></i> Add Employee
    </button>

    <button type="button" class="btn btn-info action-btn" data-toggle="modal" data-target="#employeeModal">
        <i class="ni ni-chart-bar-32"></i> Stats
    </button>

    <!-- Add Employee Modal -->
    @include('components.modals.CreateEmployeeModal')
    <br><br>
</form>
