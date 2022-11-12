<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                @isset($especialidad)
                    <h3>Cambiar especialidad</h3>
                    <p class="text-subtitle text-muted">Actualiza el nombre de la especialidad</p>
                @else
                    <h3>Añadir nueva especialidad</h3>
                    <p class="text-subtitle text-muted">Escribe el nombre de la especialidad</p>
                @endif
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{ route('dashboard') }}" />
                    <x-breadcrumb.item value="Especialidades" href="{{ route('especialidades.index') }}" />
                @isset($especialidad)
                    <x-breadcrumb.item value="{{ $especialidad->nombre }}"/>
                    <x-breadcrumb.item value="Editar" active/>
                @else
                    <x-breadcrumb.item value="Nueva" active/>
                @endisset
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section row justify-content-center">
        <div class="card col-12 col-md-10 col-xl-8">
            <div class="card-header">
                <h4 class="card-title">
                    <i class="bi bi-file-earmark-medical"></i>
                    @isset($especialidad)
                        Modificación
                    @else
                        Agregar
                    @endif
                </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @isset($especialidad)
                    <form class="form" method="post" action="{{ route('especialidades.update', $especialidad) }}">
                        @method('PATCH')
                    @else
                    <form class="form" method="post" action="{{ route('especialidades.store') }}">
                    @endisset
                        @csrf

                        <div class="form-body">
                            <div class="form-group">
                                <label for="nombreInput" class="sr-only">
                                    Nombre
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('nombre')])
                                    type="text" id="nombreInput" autocomplete="off" required
                                    placeholder="Nombre" name="nombre"
                                    value="{{ old('nombre') ?? $especialidad->nombre ?? null }}"
                                >
                                <x-maz-input-error for="nombre" />
                            </div>
                            <div class="form-group">
                                <label for="textareaDescripcion" class="form-label">
                                    Descripción
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea @class(['form-control', 'is-invalid' => $errors->has('descripcion')])
                                          id="textareaDescripcion" rows="5"
                                          name="descripcion" maxlength="1020">{{ old('descripcion') ?? $especialidad->descripcion ?? '' }}</textarea>
                                <x-maz-input-error for="descripcion" />
                            </div>
                        </div>

                        <br>
                        <div class="form-actions d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-2">
                                @isset($especialidad) Actualizar @else Agregar @endisset
                            </button>
                            <a href="{{ route('especialidades.index') }}" type="reset" class="btn btn-secondary">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
