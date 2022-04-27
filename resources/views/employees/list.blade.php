<table class="table table-borderless table-hover rounded">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Since</th>
        <th scope="col" class="text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($employees as $employee)
        <tr>
            <td>{{$employee->firstName}} {{$employee->lastName}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->employeeType}}</td>
            <td>{{$employee->dateCreated}}</td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-toggle="modal"
                        data-target="#employee-delete-confirmation-modal">
                    <i class="ni ni-circle-08 pt-1"></i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm " data-toggle="modal"
                        data-target="#employee-delete-confirmation-modal">
                    <i class="ni ni-fat-remove pt-1"></i>
                </button>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
<!-- Add Employee Modal -->
@include('components.modals.DeleteConfirmationModal')
