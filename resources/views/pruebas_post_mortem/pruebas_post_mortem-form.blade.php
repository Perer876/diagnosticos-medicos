<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pruebas post mortem</h3>
                @if (isset($pruebas_post_mortem))
                <p class="text-subtitle text-muted">Actualizar prueba post mortem</p>
                @else
                    <p class="text-subtitle text-muted">Agregar prueba post mortem</p>
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
                @if (isset($pruebas_post_mortem))
                    <form class="form" method="post" action="{{ route('pruebas_post_mortem.update', $pruebas_post_mortem) }}">
                        @method('PATCH')

                @else
                    <form action="{{ route('pruebas_post_mortem.store') }}" method="POST">
                @endif
                    @csrf
                    <div class="form-group position-relative has-icon-left m-3">
                        <span class="text-danger">*</span>
                        <input
                        @class(['form-control', 'is-invalid' => $errors->has('nombre')])
                        type="text" name="nombre" placeholder="Nombre" value="{{ $pruebas_post_mortem->nombre ?? null }}" required>

                        <div class="form-control-icon">
                            <i class="bi bi-clipboard2-pulse"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left m-3">
                        <textarea @class(['form-control', 'is-invalid' => $errors->has('descripcion')])
                            rows="5" name="descripcion" placeholder="Descripción" value="{{ $pruebas_post_mortem->descripcion ?? null }}">{{ $pruebas_post_mortem->descripcion ?? null }}</textarea>
                        <div class="form-control-icon">
                            <i class="bi bi-clipboard2-pulse"></i>
                        </div>
                    </div>
                    <div class="text-center">
                        @if (isset($pruebas_post_mortem))
                            <button class="btn btn-primary shadow-lg m-3">Actualizar prueba</button>
                        @else
                        <button class="btn btn-primary shadow-lg m-3">Agregar prueba</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('plugins.tooltips')
</x-app-layout>
