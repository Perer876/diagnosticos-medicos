@props(['usuario'])

@if($usuario->direccion === null)
    <span class="fw-light fst-italic">Sin especificar</span>
@else
    <span>{{ $usuario->direccion->completa }}</span>
@endif
