<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Actualizar datos sobre el medico</h3>
                <p class="text-subtitle text-muted">Agrega o actualiza la cédula y las especialidades del medico en cuestión</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{ route('dashboard') }}"/>
                    <x-breadcrumb.item value="Medico" href="{{ route('users.index') }}"/>
                    <x-breadcrumb.item value="{{ $user->identificacion->nombre }}" href="{{ route('users.show', $user) }}"/>
                    <x-breadcrumb.item value="Actualizar datos" active/>
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section row justify-content-center">
        <div class="card col-12 col-md-10 col-xl-8">
            <div class="card-header">
                <h4 class="card-title">
                    <i class="bi bi-person-circle"></i>
                    Medico
                </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" action="{{ route('medicos.update', $user) }}">
                        @method('PATCH')
                        @csrf

                        <h4 class="card-title">Datos profesionales</h4>

                        <div class="form-group">
                            <label for="cedulaInput" class="sr-only">
                                Cedula
                            </label>
                            <input
                                @class(['form-control font-monospace', 'is-invalid' => $errors->has('cedula')])
                                type="text" id="cedulaInput" placeholder="12345678"
                                value="{{ old('cedula') ?? $user->medico->cedula }}"
                                name="cedula" autocomplete="off" maxlength="8"
                            >
                            <x-maz-input-error for="cedula"/>
                        </div>

                        <div class="form-group">
                            <label for="especialidadesInput" class="sr-only">
                                Especialidades
                            </label>
                            <select class="form-select" multiple="multiple" name="especialidades[]" id="especialidadesInput"
                                x-data x-ref="especialidades" x-init="
                                    new Choices($refs.especialidades, {
                                        loadingText: 'Cargando...',
                                        noResultsText: 'Sin resultados',
                                        noChoicesText: 'No hay opciones a elegir',
                                        itemSelectText: 'Seleccionar',
                                        addItemText: (value) => {
                                            return `Presiona enter para agregar <b>'${value}'</b>`;
                                        },
                                        maxItemText: (maxItemCount) => {
                                            return `Solo ${maxItemCount} valores pueden ser agregados`;
                                        },
                                        valueComparer: (value1, value2) => {
                                            return value1 === value2;
                                        },
                                        classNames: {
                                            item: 'badge bg-light-warning m-1'
                                        }
                                    });
                                "
                            >
                                @foreach(\App\Models\Especialidad::pluck('nombre', 'id') as $id => $nombre)
                                    <option value="{{ $id }}" @selected($user->medico->especialidades->contains($id))>
                                        {{ $nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <br>
                        <div class="form-actions d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-2">
                                Actualizar
                            </button>
                            <a href="{{ route('users.show', $user) }}" type="reset" class="btn btn-secondary">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('plugins.choices')
</x-app-layout>
