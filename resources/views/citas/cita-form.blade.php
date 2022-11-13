<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                @isset($cita)
                    <h3>Reagendar cita</h3>
                    <p class="text-subtitle text-muted">
                        Reagendar la cita con <span class="font-bold">{{ $paciente->identificacion->nombre }}</span>
                    </p>
                @else
                    <h3>Agendar nueva cita</h3>
                    <p class="text-subtitle text-muted">
                        Agendar cita con <span class="font-bold">{{ $paciente->identificacion->nombre }}</span>
                    </p>
                @endif
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{ route('dashboard') }}" />
                    <x-breadcrumb.item value="Pacientes" href="{{ route('pacientes.index') }}" />
                    <x-breadcrumb.item value="{{ $paciente->identificacion->nombre }}" href="{{ route('pacientes.show', $paciente) }}" />
                    <x-breadcrumb.item value="Citas" />
                @isset($cita)
                    <x-breadcrumb.item value="{{ $cita->fecha->format('Y/m/d') }}" href="{{ route('citas.show', $cita) }}"/>
                    <x-breadcrumb.item value="Editar" active/>
                @else
                    <x-breadcrumb.item value="Agendar" active/>
                @endisset
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section row justify-content-center">
        <div class="card col-12 col-md-10 col-xl-8">
            <div class="card-header">
                <h4 class="card-title">
                    <i class="bi bi-calendar2-event"></i>
                    Cita
                </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @isset($cita)
                    <form class="form" method="post" action="{{ route('citas.update', $cita) }}">
                        @method('PATCH')
                    @else
                    <form class="form" method="post" action="{{ route('pacientes.citas.store', $paciente) }}">
                    @endisset
                        @csrf

                        <div class="form-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="fecha-input" class="sr-only">
                                            Fecha
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            @class(['form-control', 'is-invalid' => $errors->has('fecha')])
                                            type="date" id="fecha-input" autocomplete="off"
                                            name="fecha" required
                                            value="{{ old('fecha') ?? $cita->fecha->format('Y-m-d') ?? null }}"
                                        >
                                        <x-maz-input-error for="fecha" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="hora-input" class="sr-only">
                                            Hora
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            @class(['form-control', 'is-invalid' => $errors->has('hora')])
                                            type="time" id="hora-input" autocomplete="off"
                                            name="hora" required
                                            value="{{ old('hora') ?? $cita->hora->format('H:i') ?? null }}"
                                        >
                                        <x-maz-input-error for="hora" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="motivo-input" class="sr-only">
                                    Motivo
                                </label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('motivo')])
                                    type="text" id="motivo-input" autocomplete="off"
                                    name="motivo" placeholder="Describa el motivo de la consulta."
                                    value="{{ old('motivo') ?? $cita->motivo ?? null }}" maxlength="255"
                                >
                                <x-maz-input-error for="motivo" />
                            </div>

                            <div class="form-group">
                                <label for="user-id-input" class="sr-only">
                                    Medico
                                    <span class="text-danger">*</span>
                                </label>
                                <select id="user-id-input" name="user_id" required
                                        @class(['form-control choices', 'is-invalid' => $errors->has('user_id')])>
                                    <option value="">Seleccionar medico</option>
                                    @foreach(\App\Models\User::whereRolIs('Medico')->get() as $user)
                                        <option value="{{ $user->id }}" @selected($user->id == (old('user_id') ?? $cita->user_id))>{{ $user->identificacion->nombre }}</option>
                                    @endforeach
                                </select>
                                <x-maz-input-error for="user_id" />
                            </div>
                        </div>

                        <br>
                        <div class="form-actions d-flex justify-content-end">
                            @isset($cita)
                                <button type="submit" class="btn btn-success me-2">
                                    Reagendar
                                </button>
                                <a href="{{ route('citas.show', $cita) }}" type="reset" class="btn btn-secondary">
                                    Cancelar
                                </a>
                            @else
                                <button type="submit" class="btn btn-success me-2">
                                    Agendar
                                </button>
                                <a href="{{ route('pacientes.show', $paciente) }}" type="reset" class="btn btn-secondary">
                                    Cancelar
                                </a>
                            @endisset
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('plugins.choices')
</x-app-layout>
