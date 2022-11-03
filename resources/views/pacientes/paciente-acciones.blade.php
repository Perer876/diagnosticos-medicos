<form action="{{route('pacientes.destroy', $paciente->id)}}" method="post">
    @csrf
    @method('DELETE')

    <div class="btn-group" role="group">
        <a href="{{route('pacientes.edit', $paciente->id)}}"
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
