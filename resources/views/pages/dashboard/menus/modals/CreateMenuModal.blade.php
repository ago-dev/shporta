<div class="modal fade" id="menu-modal" tabindex="-1" role="dialog" aria-labelledby="menu-modal-label"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="employee-modal-title text-blue text-capitalize">
                    Add new menu
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="form-group">
                <label class="text-sm">Select Food Service associated with the menu</label>
                <select class="form-select form-control" name="foodService">
                    <option value="">
                        Select Food Service
                    </option>
                    @foreach ($foodServices as $foodService)
                        <option value="{{ $foodService->name }}">{{ $foodService->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <sup>* Upload a CSV file to populate the menu</sup>
                <input type="file" name="file" placeholder="Choose file" id="menu-csv">
                @error('file')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button class="btn btn-success btn-block">Submit</button>
        </div>
    </div>
</div>
