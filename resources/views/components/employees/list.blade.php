<table class="table table-borderless table-hover rounded">
    <thead class="thead-dark">
    <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col" colspan="2" class="text-center">Email</th>
        <th scope="col" class="text-center">Role</th>
        <th scope="col" colspan="2" class="text-right">Since</th>
        <th scope="col" colspan="2" class="text-center">Actions</th>
    </tr>
    </thead>
    <tbody>

    @forelse ($employees as $employee)
        <tr>
            <td>{{$employee->firstName}}</td>
            <td>{{$employee->lastName}}</td>
            <td colspan="2">{{$employee->email}}</td>
            <td class="text-left">{{$employee->employeeType}}</td>
            <td colspan="2" class="text-right">{{$employee->dateCreated}}</td>
            <td colspan="2" class="td-actions text-center">
                <button type="button" rel="tooltip" class="btn btn-primary btn-icon btn-sm " data-toggle="modal"
                        data-target="#employee-update-modal" title="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path
                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                    </svg>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm " data-toggle="modal"
                        data-target="#employee-delete-confirmation-modal" title="Deactivate">
                    <i class="ni ni-fat-remove pt-1"></i>
                </button>
                <!-- Add Employee Modal -->
            </td>
        </tr>
        @include('components.employees.modals.DeleteConfirmationModal', ['employee' => $employee])
        @include('components.employees.modals.UpdateEmployeeModal', ['employee' => $employee])
    @empty
        <tr>
            <td>No employees found!</td>
        </tr>
    @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center text-dark">
    {!! $employees->links() !!}
</div>
