<div class="modal fade" id="employee-update-modal" tabindex="-1" role="dialog" aria-labelledby="employee-update-modal-label"
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
                        <input class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('First Name') }}" type="text" name="firstName"
                               value="{{ old('firstName', $employee->firstName) }}" required autofocus>
                    </div>
                    @if ($errors->has('firstName'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('firstName') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('lastName') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('Last Name') }}" type="text" name="lastName"
                               value="{{ old('lastName', $employee->lastName) }}" required autofocus>
                    </div>
                    @if ($errors->has('lastName'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('lastName') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('Username') }}" type="text" name="username"
                               value="{{ old('username', $employee->username) }}" required autofocus>
                    </div>
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('username') }}</strong>
        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('Email') }}" type="email" name="email"
                               value="{{ old('email', $employee->email) }}"
                               required>
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-select form-control" name="role">
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
