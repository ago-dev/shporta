@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session()->get('message') }}
    </div>
@endif
<div class="d-flex justify-content-between">
    <form role="form" method="POST" action="{{ route('food-service-create') }}" enctype="multipart/form-data">
        @csrf
        <!-- Add Food Service -->
        <button type="button" class="btn btn-success action-btn" data-toggle="modal" data-target="#foodServiceModal">
            <i class="ni ni-shop"></i> Add Food-Service
        </button>

        <!-- Add Food Service Modal -->
        @include('pages.dashboard.food-services.modals.CreateFoodServiceModal')
        <br><br>
    </form>

    <form role="form" method="POST" action="#" enctype="multipart/form-data">
        <button type="submit" class="btn btn-success action-btn" disabled>
            <i class="ni ni-bullet-list-67"></i> Upload CSV</button>
    </form>
</div>
