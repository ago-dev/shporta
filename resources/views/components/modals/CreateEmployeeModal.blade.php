
<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="employee-modal-title text-blue text-capitalize">
                    <i class="ni ni-circle-08"></i>
                    Add new employee
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @include('components.RegisterForm', ['employeeView' => true])
        </div>
    </div>
</div>

@if(count($errors) > 0)
    <script type="text/javascript">
        $(document).ready(function(){
            $("#employeeModal").modal("show");
        });
    </script>
@endif
