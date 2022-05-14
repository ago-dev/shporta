<div class="modal fade" id="food-service-update-modal-{{$foodService->id}}" tabindex="-1" role="dialog" aria-labelledby="food-service-update-modal-label"
     aria-hidden="true">
    <form id="update-employee-form" role="form" method="POST" enctype="multipart/form-data"
          action="{{ route('food-service-update', ['id' => $foodService->id]) }} ">
        @method('PUT')
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="text-black font-weight-bold text-capitalize">
                        Edit Food Service Data
                    </h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-group{{ $errors->has('nameUpdate') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('nameUpdate') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('Food Service Name') }}" type="text" name="nameUpdate"
                               value="{{ old('nameUpdate', $foodService->name) }}" required autofocus>
                    </div>
                    @if ($errors->has('nameUpdate'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('nameUpdate') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('descriptionUpdate') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('descriptionUpdate') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('Business description') }}" type="text" name="descriptionUpdate"
                               value="{{ old('descriptionUpdate', $foodService->description) }}" required autofocus>
                    </div>
                    @if ($errors->has('descriptionUpdate'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('descriptionUpdate') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <select class="form-select form-control" name="typeUpdate">
                        <option value="{{ $foodService->foodServiceType->name }}">
                            Select Food Service Type
                        </option>
                        @foreach ($foodServiceTypes as $type)
                            <option value="{{ $type->name }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <sup>* Choose an image to represent the business</sup>
                    <input type="file" name="imageUpdate" placeholder="Choose image" id="image">
                    @error('imageUpdate')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-danger btn-block" id="submit" value="Update Food Service"/>
                </div>
            </div>
        </div>
    </form>
</div>

@if($errors->has('nameUpdate')         ||
    $errors->has('descriptionUpdate')  ||
    $errors->has('typeUpdate')         ||
    $errors->has('imageUpdate'))
    <script type="text/javascript">
        $(document).ready(function () {
            $("#food-service-update-modal-{{$foodService->id}}").modal("show");
        });
    </script>
@endif
