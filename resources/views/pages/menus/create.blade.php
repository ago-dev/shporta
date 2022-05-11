<form role="form" method="POST" action="{{ route('menu-create') }}" enctype="multipart/form-data">
    @csrf
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session()->get('message') }}
        </div>
    @endif
    <!-- Add Menu -->
    <button type="button" class="btn btn-success action-btn" data-toggle="modal" data-target="#menu-modal">
        <i class="ni ni-circle-08"></i> Add Menu
    </button>

    <button disabled type="button" class="btn btn-info action-btn" data-toggle="modal" data-target="#employeeModal">
        <i class="ni ni-chart-bar-32"></i> Stats
    </button>

    <!-- Add Employee Modal -->
    @include('pages.menus.modals.CreateMenuModal');
    <br><br>
</form>
