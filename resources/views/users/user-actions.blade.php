<div class="dropdown" x-data="{
    confirmDelete(form) {
        Swal.fire({
            icon: 'warning',
            title: 'Cuidado',
            text: '¿Esta seguro que desea eliminar este usuario?',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
}">
    <i class="bi bi-three-dots-vertical" role="button" id="dropdownMenuAccionesCita" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

    <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButtonSec" style="">
        <a class="dropdown-item" href="{{route('users.edit', $user->id)}}">
            <i class="bi bi-pencil text-primary me-3"></i>
            Editar
        </a>
        <button class="dropdown-item" role="button" @click="confirmDelete($refs.delete_cita)" @disabled(auth()->user()->id === $user->id)>
            <i class="bi bi-trash text-danger me-3"></i>
            Eliminar
        </button>
    </div>

    <form action="{{route('users.destroy', $user->id)}}" method="post"  x-ref="delete_cita">
        @method('DELETE')
        @csrf
    </form>
</div>
@include('plugins.sweet-alert')
