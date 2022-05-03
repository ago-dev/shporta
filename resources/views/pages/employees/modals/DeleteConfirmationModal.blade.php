<div class="modal fade" id="employee-delete-confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="employee-delete-confirmation-modal-label" aria-hidden="true">
    <form role="form" method="POST" action="{{ route('employee-delete', ['id' => $employee->id]) }}">
        @csrf
      @include('components.modals.DeleteConfirmationModal',
                ['modalTitle' => 'Deactivate employee',
                 'content'  => $employee->firstName . ' ' . $employee->lastName])
    </form>
</div>
