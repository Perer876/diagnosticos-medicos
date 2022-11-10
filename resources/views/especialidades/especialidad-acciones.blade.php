<form class="inline-block" action="{{route('especialidades.destroy', $id)}}" method="post" x-data @submit.prevent="
    Swal.fire({
        icon: 'warning',
        title: 'Cuidado',
        text: '¿Esta seguro que desea eliminar esta especialidad?',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $event.target.submit();
        }
    });
">
    @csrf
    @method('DELETE')

    <div class="btn-group" role="group">
        <a href="{{route('especialidades.edit', $id)}}"
           class="btn btn-sm icon btn-primary"
           data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
            <i class="bi bi-pencil"></i>
        </a>
        <button type="submit" class="btn btn-sm icon btn-danger"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
            <i class="bi bi-trash"></i>
        </button>
    </div>
</form>
@include('plugins.tooltips')
@include('plugins.sweet-alert')
