<form role="form" method="POST" action="{{ route('food-service-create') }}">
    @csrf
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session()->get('message') }}
        </div>
    @endif
    <!-- Add Food Service -->
    <button type="button" class="btn btn-success action-btn" data-toggle="modal" data-target="#foodServiceModal">
        <i class="ni ni-shop"></i> Add Food-Service
    </button>

    <!-- Add Food Service Modal -->
    @include('components.food-services.modals.CreateFoodServiceModal')
    <br><br>
</form>
