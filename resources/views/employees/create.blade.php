<form method="POST" action="">
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
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="employeeEmail">Email address</label>
                            <input type="email" class="form-control" id="employee-email" placeholder="Enter email"
                                name="employeeEmail">
                        </div>
                        <div class="form-group">
                            <label for="employeePassword">Password</label>
                            <input type="password" class="form-control" id="employee-password" placeholder="Password"
                                name="employeePassword">
                        </div>
                        <div class="form-group">
                            <select class="form-select" name="role">
                                <option value="">Select role</option>
                                <option value="admin">Administrator</option>
                                <option value="support">Customer Support</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</form>