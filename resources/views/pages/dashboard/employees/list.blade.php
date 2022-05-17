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
                @include('components.buttons.UpdateDeleteButtonGroup',
                          ['updateModalName' => 'employee-update-modal-' . $employee->id],
                          ['deleteModalName' => 'employee-delete-confirmation-modal-' . $employee->id])
            </td>
        </tr>
        @include('pages.dashboard.employees.modals.DeleteConfirmationModal', ['employee' => $employee])
        @include('pages.dashboard.employees.modals.UpdateEmployeeModal', ['employee' => $employee])
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
