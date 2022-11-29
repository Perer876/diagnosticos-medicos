<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Diagnóstico</h3>
                <p class="text-subtitle text-muted">Información del diagnóstico</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                {{-- <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{route('dashboard')}}"/>
                    <x-breadcrumb.item value="Enfermedades" href="{{ route('enfermedades.index') }}" />
                    <x-breadcrumb.item value="{{ $enfermedade->nombre }}" active />
                </x-breadcrumb> --}}
            </div>
        </div>
    </x-slot>

    <section class="section row gx-4">
        <div class="col-12 col-md-6">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">
                        <i class="bi bi-file-earmark-medical"></i>
                        Evaluación
                    </h4>
                    @include('citas.evaluacion-actions', ['evaluacion' => $evaluacion,])       
                </div>
                
                <div class="card-content">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title text-center">
                                    <i class="bi bi-heart-pulse"></i>
                                </h4>
                                <p class="card-text text-center mb-0">
                                    <small>Paciente</small>
                                </p>
                                <h4 class="card-title text-center">
                                    <a href="{{ route('pacientes.show', $cita->paciente) }}" class="link-dark">
                                        {{ $cita->paciente->identificacion->nombre }}
                                    </a>
                                </h4>
                            </div>
                            <div>
                                <h4 class="card-title text-center">
                                    <i class="bi bi-person-workspace"></i>
                                </h4>
                                <p class="card-text text-center mb-0">
                                    <small>Medico</small>
                                </p>
                                <h4 class="card-title text-center">
                                    <a href="{{ route('users.show', $cita->user) }}" class="link-dark">
                                        {{ $cita->user->identificacion->nombre }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <span class="card-text">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-subtitle">Signos</h6>
                                {{-- <a href="{{ route('enfermedades.edit-signo', $enfermedade->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                    <i class="bi bi-pencil-square link-secondary"></i>
                                </a> --}}
                            </div>                        
                            <p>
                            @forelse($evaluacion->signos()->pluck('nombre') as $signo)
                                <span class="badge bg-light-warning mb-2 me-1">{{ $signo }}</span>
                            @empty
                                <span class="fst-italic">Sin signos</span>
                            @endforelse
                            </p>
                        </span> 
                        <span class="card-text">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-subtitle">Síntomas</h6>
                                {{-- <a href="{{ route('enfermedades.edit-signo', $enfermedade->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                    <i class="bi bi-pencil-square link-secondary"></i>
                                </a> --}}
                            </div>                        
                            <p>
                            @forelse($evaluacion->sintomas()->pluck('nombre') as $sintoma)
                                <span class="badge bg-light-warning mb-2 me-1">{{ $sintoma }}</span>
                            @empty
                                <span class="fst-italic">Sin sintomas</span>
                            @endforelse
                            </p>
                        </span>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">
                        <i class="bi bi-capsule"></i>
                        Enfermedad
                    </h4>
                    {{-- <a href="{{ route('enfermedades.edit-tratamiento', $enfermedade->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                        <i class="bi bi-pencil-square link-secondary"></i>
                    </a> --}}
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <span class="card-text">
                            @if (isset($evaluacion->enfermedad))
                                <h4 card-title text-center>
                                    <a href="{{ route('enfermedades.show', $evaluacion->enfermedad)}}" class="link-dark">
                                        {{ $evaluacion->enfermedad->nombre}}
                                    </a>
                                </h4>
                                <hr>
                                <h6 class="card-subtitle">Descripción</h6>
                                <p>
                                    {{$evaluacion->enfermedad->descripcion}}
                                </p>
                            @else
                            <h4 card-title text-center>
                                No se ha diagnosticado alguna enfermedad
                            </h4>
                            @endif                   
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
</x-app-layout>
@include('plugins.tooltips')