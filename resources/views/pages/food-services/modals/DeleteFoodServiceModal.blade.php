<div class="modal fade" id="food-service-delete-confirmation-modal-{{$foodService->id}}" tabindex="-1" role="dialog"
     aria-labelledby="food-service-delete-confirmation-modal-label" aria-hidden="true">
    <form role="form" method="POST" action="{{ route('food-service-delete', ['id' => $foodService->id]) }}">
        @csrf
        @include('components.modals.DeleteConfirmationModal',
               ['modalTitle' => 'Remove Food Service?',
                'content'  => $foodService->name])
    </form>
</div>
