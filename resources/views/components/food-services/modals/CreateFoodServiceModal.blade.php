<div class="modal fade" id="foodServiceModal" tabindex="-1" role="dialog" aria-labelledby="foodServiceLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-capitalize">
                    Add new food-service
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('Food Service Name') }}" type="text" name="name"
                           value="{{ old('name') }}" required autofocus>
                </div>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('Business description') }}" type="text" name="description"
                           value="{{ old('description') }}" required autofocus>
                </div>
                @if ($errors->has('description'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                @endif
            </div>
            <br>
                <div class="row">
                    <br><br>
                    <div class="col-md-20">
                        <div class="form-group">
                            <input type="file" name="image" placeholder="Choose image" id="image">
                            @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-success" id="submit" value="Submit"/>
                    </div>
                </div>

        </div>
    </div>
</div>

@if(count($errors) > 0)
    <script type="text/javascript">
        $(document).ready(function () {
            $("#foodServiceModal").modal("show");
        });
    </script>
@endif
