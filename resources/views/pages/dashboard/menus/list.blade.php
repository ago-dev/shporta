<div id="accordion" class="myaccordion">
    @forelse($menus as $menu)
        <div class="card bg-gradient-white">
            <div class="card-header" id="heading{{$menu->id}}">
                <h2 class="mb-0">
                    <button class="d-flex align-items-center justify-content-between btn accordion-btn"
                            data-toggle="collapse" data-target="#collapse{{$menu->id}}" aria-expanded="true"
                            aria-controls="collapseOne">
                        {{ $menu->foodService->name }}
                        <span class="fa-stack fa-sm">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                         </span>
                    </button>
                </h2>
            </div>
            <div id="collapse{{$menu->id}}" class="collapse" aria-labelledby="heading{{$menu->id}}"
                 data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-hover table-sm table-success">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price ($)</th>
                            <th scope="col">Category</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($menu->foodItems as $foodItem)
                            <tr>
                                <td> {{ $foodItem->name }}</td>
                                <td> {{ $foodItem->price }}</td>
                                <td> {{ $foodItem->foodCategory->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button type="button" rel="tooltip" class="btn btn-block btn-icon btn-danger text-white mt-2 p-2"
                            data-toggle="modal"
                            data-target="#delete-menu-modal-{{$menu->id}}" title="Delete">
                        Remove Menu
                    </button>
                </div>
            </div>
        </div>
        @include('pages.dashboard.menus.modals.DeleteMenuModal', ['menu' => $menu])
    @empty
        <div>
            <h1 class="text-white-50">No menus found!</h1>
        </div>
    @endforelse
</div>

<script>
    $(document).ready(function () {
        $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
            $(e.target)
                .prev()
                .find("i:last-child")
                .toggleClass("fa-plus fa-minus");
        });

    });
</script>
