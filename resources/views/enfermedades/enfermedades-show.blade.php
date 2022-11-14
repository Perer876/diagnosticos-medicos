<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Enfermedad</h3>
                <p class="text-subtitle text-muted">Información de la enfermedad</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{route('dashboard')}}"/>
                    <x-breadcrumb.item value="Enfermedades" href="{{ route('enfermedades.index') }}" />
                    <x-breadcrumb.item value="{{ $enfermedade->nombre }}" active />
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section row gx-4">
        <div class="col-12 col-md-6">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">
                        <i class="bi bi-virus"></i>
                        Información
                    </h4>
                    @include('enfermedades.enfermedades-actions', ['enfermedade' => $enfermedade])
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title text-center">{{ $enfermedade->nombre }}</h4>
                        <hr>
                        <p class="card-text">
                            <h6 class="card-subtitle">Descripción</h6>
                            <p>{{ $enfermedade->descripcion }}</p>
                        </p>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">
                        <i class="bi bi-capsule"></i>
                        Tratamiento
                    </h4>
                    <a href="{{ route('enfermedades.edit-tratamiento', $enfermedade->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                        <i class="bi bi-pencil-square link-secondary"></i>
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <span class="card-text">                        
                            <h6 class="card-subtitle">Tratamientos</h6>
                            <p>
                            @forelse($enfermedade->tratamientos()->pluck('nombre') as $tratamiento)
                                <span class="badge bg-light-warning mb-2 me-1">{{ $tratamiento }}</span>
                            @empty
                                <span class="fst-italic">Sin tratamientos</span>
                            @endforelse
                            </p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">
                        <i class="bi bi-clipboard2-pulse"></i>
                        Signos y síntomas
                    </h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="list-group">
                            <span class="card-text">
                                <div class="d-flex justify-content-between">
                                    <h6 class="card-subtitle">Signos</h6>
                                    <a href="{{ route('enfermedades.edit-signo', $enfermedade->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <i class="bi bi-pencil-square link-secondary"></i>
                                    </a>
                                </div>                        
                                <p>
                                @forelse($enfermedade->signos()->pluck('nombre') as $signo)
                                    <span class="badge bg-light-warning mb-2 me-1">{{ $signo }}</span>
                                @empty
                                    <span class="fst-italic">Sin signos</span>
                                @endforelse
                                </p>
                            </span> 
                            <span class="card-text">                        
                                <div class="d-flex justify-content-between">
                                    <h6 class="card-subtitle">Síntomas</h6>
                                    <a href="{{ route('enfermedades.edit-sintoma', $enfermedade->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <i class="bi bi-pencil-square link-secondary"></i>
                                    </a>
                                </div>  
                                <p>
                                @forelse($enfermedade->sintomas()->pluck('nombre') as $sintoma)
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
        </div> 
    </section>
</x-app-layout>
@include('plugins.tooltips')