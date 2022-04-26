<div class="form-group{{ $errors->has('firstName') ? ' has-danger' : '' }}">
    <div class="input-group input-group-alternative mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
        </div>
        <input class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}"
               placeholder="{{ __('First Name') }}" type="text" name="firstName"
               value="{{ old('firstName') }}" required autofocus>
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
               value="{{ old('lastName') }}" required autofocus>
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
               value="{{ old('username') }}" required autofocus>
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
               placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}"
               required>
    </div>
    @if ($errors->has('email'))
        <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
    @endif
</div>
<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
    <div class="input-group input-group-alternative">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
        </div>
        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
               placeholder="{{ __('Password') }}" type="password" name="password" required>
    </div>
    @if ($errors->has('password'))
        <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
    @endif
</div>
<br>
<div class="form-group">
    <div class="input-group input-group-alternative">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
        </div>
        <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password"
               name="password_confirmation" required>
    </div>
</div>

@if($employeeView)
    <div class="modal-body">
        <div class="form-group">
            <select class="form-select form-control" name="role">
                <option value="">Select Employee Role</option>
                <option value="Administrator">Administrator</option>
                <option value="Customer Support">Customer Support</option>
            </select>
        </div>

    </div>
    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>

@else
    <div class="row my-4">
        <div class="col-12">
            <div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input" id="customCheckRegister" type="checkbox" required>
                <label class="custom-control-label" for="customCheckRegister">
                                        <span>{{ __('I agree with the') }} <a
                                                href="#">{{ __('Privacy Policy') }}</a></span>
                </label>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn login-btn mt-4">{{ __('Create account') }}</button>
    </div>

    <div class="card-header bg-transparent pt-4">
        <div class="text-center text-muted mb-4">
            <small>
                OR
            </small>
        </div>
        <div class="text-muted text-center mt-2 mb-4"><small>{{ __('Sign up with') }}</small></div>
        <div class="text-center">
            <button class="btn btn-neutral btn-icon" disabled>
                                    <span class="btn-inner--icon"><img
                                            src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                <span class="btn-inner--text">{{ __('Google') }}</span>
            </button>
        </div>
    </div>
@endif
