<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                @isset($paciente)
                    <h3>Cambiar usuario</h3>
                    <p class="text-subtitle text-muted">Actualiza los campos del usuario</p>
                @else
                    <h3>Registrar nuevo paciente</h3>
                    <p class="text-subtitle text-muted">Llena los campos del nuevo paciente</p>
                @endif
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{ route('dashboard') }}"/>
                    <x-breadcrumb.item value="Pacientes" href="{{ route('pacientes.index') }}"/>
                @isset($paciente)
                    <x-breadcrumb.item value="{{ $paciente->identificacion->nombre }}" href="{{ route('pacientes.show', $paciente) }}"/>
                    <x-breadcrumb.item value="Editar" active/>
                @else
                    <x-breadcrumb.item value="Nuevo" active/>
                @endisset
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section row justify-content-center">
        <div class="card col-12 col-md-10 col-xl-8">
            <div class="card-header">
                <h4 class="card-title">
                    <i class="bi bi-person-circle"></i>
                    @isset($paciente)
                        Cambio
                    @else
                        Registro
                    @endif
                </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @isset($paciente)
                    <form class="form" method="post" action="{{ route('pacientes.update', $paciente) }}">
                        @method('PATCH')
                    @else
                    <form class="form" method="post" action="{{ route('pacientes.store') }}">
                    @endisset
                        @csrf

                        <h4 class="card-title">Datos personales</h4>
                        @isset ($paciente)
                            @include('identificaciones.datos-personales-inputs', ['identificacion' => $paciente->identificacion])
                        @else
                            @include('identificaciones.datos-personales-inputs')
                        @endisset

                        <div class="form-group">
                            <label class="sr-only">
                                Sexo
                                <span class="text-danger">*</span>
                            </label><br>
                        @foreach(\App\Enums\Sexos::cases() as $sexo)
                            <span class="pe-2">
                                <input class="form-check-input" type="radio" id="flexRadio{{ $sexo->name }}" required
                                       name="sexo" value="{{ $sexo->value }}"
                                       @checked($sexo->value == (old('sexo') ?? $paciente->sexo->value ?? ''))>
                                <label class="form-check-label user-select-none" for="flexRadio{{ $sexo->name }}">
                                    {{ $sexo->name }}
                                </label>
                            </span>
                        @endforeach
                        </div>

                        <div class="form-group">
                            <label for="fechaNacimientoInput" class="sr-only">
                                Fecha de nacimiento
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('fecha_nacimiento')])
                                type="date" id="fechaNacimientoInput"
                                value="{{ old('fecha_nacimiento') ?? $paciente->fecha_nacimiento ?? null }}" required
                                name="fecha_nacimiento" autocomplete="off"
                            >
                            <x-maz-input-error for="fecha_nacimiento" />
                        </div>

                        <br>
                        <h4 class="card-title">Dirección</h4>
                        @isset ($paciente)
                            <livewire:seleccionar-direccion :direccion="$paciente->direccion"/>
                        @else
                            <livewire:seleccionar-direccion/>
                        @endisset

                        <br>
                        <h4 class="card-title">Antecedentes</h4>
                        <div class="form-group">
                            <label for="textareaAntecedentesFamiliares" class="form-label">
                                Antecedentes familiares
                            </label>
                            <textarea class="form-control" id="textareaAntecedentesFamiliares" rows="3"
                                      name="antecedentes_familiares" maxlength="510"
                            >{{ old('antecedentes_familiares') ?? $paciente->antecedentes_familiares ?? '' }}</textarea>
                        </div>

                        <br>
                        <div class="form-actions d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-2">
                                @isset($paciente)
                                    Actualizar
                                @else
                                    Agregar
                                @endisset
                            </button>
                            <a href="{{ route('pacientes.index') }}" type="reset" class="btn btn-secondary">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
