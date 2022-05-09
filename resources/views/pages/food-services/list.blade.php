<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-image table-borderless table-hover rounded table-condensed">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Brand Logo</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" colspan="3">Description</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($foodServices as $foodService)
                  <tr>
                    <td class="w-25">
                        <img width=60 height=60 src="{{ asset('images/food-services') }}/{{$foodService->image }}" class="img-fluid img-thumbnail" alt="Business Logo">
                    </td>
                    <td class="font-weight-bold fs-6 text-center">{{$foodService->name }}</td>
                    <td class="text-darker" colspan="3">{{$foodService->description }}</td>
                    <td>{{$foodService->foodServiceType->name}}</td>
                    <td>
                        @include('components.buttons.UpdateDeleteButtonGroup',
                                  ['updateModalName' => 'food-service-update-modal-' . $foodService->id],
                                  ['deleteModalName' => 'food-service-delete-confirmation-modal-' . $foodService->id])
                    </td>
                      @include('pages.food-services.modals.DeleteFoodServiceModal', ['foodService' => $foodService])
                      @include('pages.food-services.modals.UpdateFoodServiceModal', ['foodService' => $foodService])
                </tr>

                @empty
                    <tr>
                        <td colspan="5">No Food Services found!</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center text-dark">
                {!! $foodServices->links() !!}
            </div>
        </div>
    </div>
</div>
