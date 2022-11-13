<div class="dropdown" x-data="{
    confirmDelete(form) {
        Swal.fire({
            icon: 'warning',
            title: 'Cuidado',
            text: '¿Esta seguro que desea eliminar este paciente?',
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
        <a class="dropdown-item" href="{{route('pacientes.edit', $paciente->id)}}">
            <i class="bi bi-pencil text-primary me-3"></i>
            Editar
        </a>
        <button class="dropdown-item" role="button" @click="confirmDelete($refs.delete_paciente)">
            <i class="bi bi-trash text-danger me-3"></i>
            Eliminar
        </button>
    </div>

    <form action="{{route('pacientes.destroy', $paciente->id)}}" method="post" x-ref="delete_paciente">
        @method('DELETE')
        @csrf
    </form>
</div>
@include('plugins.sweet-alert')

