<div class="dropdown dropstart" tabindex="-1" x-data="{
    confirmDelete(form) {
        Swal.fire({
            icon: 'warning',
            title: 'Cuidado',
            text: '¿Esta seguro que desea eliminar esta cita?',
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
    <i class="bi bi-three-dots-vertical" type="button" id="dropdownMenuAccionesCita" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

    <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButtonSec" style="">
        <a class="dropdown-item" href="{{ route('citas.edit', $cita) }}">
            <i class="bi bi-pencil text-primary me-3"></i>
            Reagendar
        </a>
        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-cambiar-estado-cita">
            <i class="bi bi-tag text-warning me-3"></i>
            Cambiar estado
        </button>
        <button class="dropdown-item" role="button" @click="confirmDelete($refs.delete_cita)">
            <i class="bi bi-trash text-danger me-3"></i>
            Eliminar
        </button>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('citas.show', $cita) }}">
            <i class="bi bi-info-lg text-secondary me-3"></i>
            Detalle
        </a>
    </div>
    <div class="modal fade text-left" id="modal-cambiar-estado-cita" tabindex="-1" role="dialog"
         aria-labelledby="modal-header-cambiar-estado-cita" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
             role="document">
            <div class="modal-content">
                <form action="{{ route('citas.cambio-estado', $cita) }}" method="post">
                    @method('PATCH')
                    @csrf

                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-header-cambiar-estado-cita">Cambiar estado de la cita</h4>
                    </div>
                    <div class="modal-body text-center">
                        <div class="btn-group" role="group" aria-label="Cambiar estado de cita">
                            @foreach(\App\Models\EstadoCita::all() as $estado)
                                <input type="radio" class="btn-check" name="estado_cita"
                                       id="estado-cita-{{ $estado->id }}-radio" value="{{ $estado->id }}"
                                       autocomplete="off" @checked($estado == $cita->estado)>
                                <label class="btn btn-outline-{{ $estado->color }}" for="estado-cita-{{ $estado->id }}-radio">
                                    {{ $estado->nombre }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary btn-sm" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-sm-block d-none">Cerrar</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1 btn-sm" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-sm-block d-none">Cambiar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <form action="{{ route('citas.destroy', $cita) }}" method="post" x-ref="delete_cita">
        @method('DELETE')
        @csrf
    </form>
</div>
@include('plugins.sweet-alert')
@include('plugins.tooltips')
