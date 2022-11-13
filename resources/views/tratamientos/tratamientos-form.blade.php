<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tratamientos</h3>
                @if (isset($tratamiento))
                <p class="text-subtitle text-muted">Actualizar tratamiento</p>
                @else
                    <p class="text-subtitle text-muted">Agregar tratamiento</p>
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
                @if (isset($tratamiento))
                    <form class="form" method="post" action="{{ route('tratamientos.update', $tratamiento) }}">
                        @method('PATCH')

                @else
                    <form action="{{ route('tratamientos.store') }}" method="POST">
                @endif
                    @csrf
                    <div class="form-group position-relative has-icon-left m-3">
                        <span class="text-danger">*</span>
                        <input
                        @class(['form-control', 'is-invalid' => $errors->has('nombre')])
                        type="text" name="nombre" placeholder="Nombre" value="{{ $tratamiento->nombre ?? null }}" required>

                        <div class="form-control-icon">
                            <i class="bi bi-clipboard2-pulse"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left m-3">
                        <textarea @class(['form-control', 'is-invalid' => $errors->has('descripcion')])
                            rows="5" name="descripcion" placeholder="Descripción" value="{{ $tratamiento->descripcion ?? null }}">{{ $tratamiento->descripcion ?? null }}</textarea>
                        <div class="form-control-icon">
                            <i class="bi bi-clipboard2-pulse"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left m-3">
                        <textarea @class(['form-control', 'is-invalid' => $errors->has('descripcion')])
                            rows="5" name="modo_uso" placeholder="Modo de uso" value="{{ $tratamiento->modo_uso ?? null }}">{{ $tratamiento->modo_uso ?? null }}</textarea>
                        <div class="form-control-icon">
                            <i class="bi bi-clipboard2-pulse"></i>
                        </div>
                    </div>
                    <div class="text-center">
                        @if (isset($tratamiento))
                            <button class="btn btn-primary shadow-lg m-3">Actualizar tratamiento</button>
                        @else
                        <button class="btn btn-primary shadow-lg m-3">Agregar tratamiento</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('plugins.tooltips')
</x-app-layout>
