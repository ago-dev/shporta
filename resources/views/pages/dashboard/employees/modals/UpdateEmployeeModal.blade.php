<div class="modal fade" id="employee-update-modal-{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="employee-update-modal-label"
     aria-hidden="true">
    <form id="update-employee-form" role="form" method="POST" action="{{ route('employee-update', ['id' => $employee->id]) }}">
        @method('PUT')
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="employee-modal-title text-black-50 text-capitalize">
                        <i class="ni ni-circle-08"></i>
                        Edit Employee
                    </h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="form-group{{ $errors->has('firstName') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('firstNameUpdate') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('First Name') }}" type="text" name="firstNameUpdate"
                               value="{{ old('firstNameUpdate', $employee->firstName) }}" required autofocus>
                    </div>
                    @if ($errors->has('firstNameUpdate'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('firstNameUpdate') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('lastNameUpdate') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('lastNameUpdate') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('Last Name') }}" type="text" name="lastNameUpdate"
                               value="{{ old('lastNameUpdate', $employee->lastName) }}" required autofocus>
                    </div>
                    @if ($errors->has('lastNameUpdate'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('lastNameUpdate') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('usernameUpdate') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('usernameUpdate') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('Username') }}" type="text" name="usernameUpdate"
                               value="{{ old('usernameUpdate', $employee->username) }}" required autofocus>
                    </div>
                    @if ($errors->has('usernameUpdate'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('usernameUpdate') }}</strong>
        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('emailUpdate') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('emailUpdate') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('Email') }}" type="email" name="emailUpdate"
                               value="{{ old('emailUpdate', $employee->email) }}"
                               required>
                    </div>
                    @if ($errors->has('emailUpdate'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('emailUpdate') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-select form-control" name="roleUpdate">
                            <option value="{{ $employee->employeeType }}">
                                Select Employee Role
                            </option>
                            <option value="Administrator">Administrator</option>
                            <option value="Customer Support">Customer Support</option>
                        </select>
                    </div>
            </div>

                <button type="submit" class="btn btn-danger mt-4">{{ __('Update') }}</button>
            </div>
        </div>
    </form>
</div>

@if($errors->has('firstNameUpdate') ||
    $errors->has('lastNameUpdate')  ||
    $errors->has('usernameUpdate')  ||
    $errors->has('emailUpdate')     ||
    $errors->has('roleUpdate'))
    <script type="text/javascript">
        $(document).ready(function () {
            $("#employee-update-modal").modal("show");
        });
    </script>
@endif
