<div class="modal fade" id="delete-menu-modal-{{$menu->id}}" tabindex="-1" role="dialog"
     aria-labelledby="delete-menu-modal-label" aria-hidden="true">
    <form role="form" method="POST" action="{{ route('menu-delete', ['id' => $menu->id]) }}">
        @csrf
        @include('components.modals.DeleteConfirmationModal',
               ['modalTitle' => 'Remove Menu?',
                'content'  => 'this menu'])
    </form>
</div>
