<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Signos</h3>
                @if (isset($signo))
                <p class="text-subtitle text-muted">Actualizar signo</p>
                @else
                    <p class="text-subtitle text-muted">Agregar signo</p>
                @endif
                
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="card">
            <div class="card-content">
                @if (isset($signo))
                    <form class="form" method="post" action="{{ route('signos.update', $signo) }}">
                        @method('PATCH')
                @else
                    <form action="{{ route('signos.store') }}" method="POST">
                @endif
                    @csrf
                    <div class="form-group position-relative has-icon-left m-3">
                        <span class="text-danger">*</span>
                        <input
                        @class(['form-control', 'is-invalid' => $errors->has('nombre')]) 
                        type="text" name="nombre" placeholder="Nombre" value="{{ $signo->nombre ?? null }}" required>
                        <div class="form-control-icon">
                            <i class="bi bi-clipboard2-pulse"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left m-3">
                        <textarea @class(['form-control', 'is-invalid' => $errors->has('descripcion')])
                            rows="5" name="descripcion" placeholder="Descripción">{{ $signo->descripcion ?? null }}</textarea>
                        <div class="form-control-icon">
                            <i class="bi bi-clipboard2-pulse"></i>
                        </div>
                    </div>
                    <div class="text-center"> 
                        @if (isset($signo))
                            <button class="btn btn-primary shadow-lg m-3">Actualizar signo</button>  
                        @else
                        <button class="btn btn-primary shadow-lg m-3">Agregar signo</button>
                        @endif                        
                    </div>                    
                </form>
            </div>
        </div>
    </section>
    @include('scripts.tooltips')
</x-app-layout>