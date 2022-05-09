<form role="form" method="POST" action="{{ route('employee-create') }}">
    @csrf
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session()->get('message') }}
        </div>
    @endif
    <!-- Add Employee -->
    <button type="button" class="btn btn-success action-btn" data-toggle="modal" data-target="#employeeModal">
        <i class="ni ni-circle-08"></i> Add Employee
    </button>

    <button disabled type="button" class="btn btn-info action-btn" data-toggle="modal" data-target="#employeeModal">
        <i class="ni ni-chart-bar-32"></i> Stats
    </button>

    <!-- Add Employee Modal -->
    @include('pages.employees.modals.CreateEmployeeModal',
            ['employee' => null, 'employeeTypes' => $employeeTypes, 'modal' => $modal])
    <br><br>
</form>
