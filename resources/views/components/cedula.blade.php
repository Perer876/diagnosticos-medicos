@props(['medico' => new \App\Models\Medico()])

@if ($medico->cedula)
    <p><span class="badge bg-light-info font-monospace">{{ $medico->cedula }}</span>
@else
    <p><span class="fst-italic">Vacio</span>
@endif
