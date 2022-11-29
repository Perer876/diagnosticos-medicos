<div class="dropdown" x-data="{
    confirmDelete(form) {
        Swal.fire({
            icon: 'warning',
            title: 'Cuidado',
            text: '¿Esta seguro que desea eliminar esta evaluación?',
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
    <i class="bi bi-three-dots-vertical" role="button" id="dropdownMenuAccionesEvaluacion" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

    <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButtonSec" style="">        
        <a class="dropdown-item" href="{{ route('citas.evaluacion.edit', ['evaluacion' => $evaluacion, 'cita' => $evaluacion->cita]) }}">
            <i class="bi bi-pencil text-primary me-3"></i>
            Editar
        </a>
        <button class="dropdown-item" role="button" @click="confirmDelete($refs.delete_evaluacion)">
            <i class="bi bi-trash text-danger me-3"></i>
            Eliminar
        </button>
    </div>

    <form action="{{route('citas.evaluacion.destroy', ['evaluacion' => $evaluacion, 'cita' => $evaluacion->cita])}}" method="post"  x-ref="delete_evaluacion">
        @method('DELETE')
        @csrf
    </form>
</div>
@include('plugins.sweet-alert')