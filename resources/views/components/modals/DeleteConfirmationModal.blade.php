<div class="modal fade" id="employee-delete-confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="employee-delete-confirmation-modal-label" aria-hidden="true">
   <form role="form" method="POST" action="{{ route('employee-delete', ['id' => $employee->id]) }}">
       @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold fa-1x text-black-50" id="exampleModalLabel"><b>Employee Deactivation</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to deactivate <b> {{$employee->firstName}} {{$employee->lastName}}</b>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </div>
        </div>
    </div>
   </form>
</div>
