<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Realizar evaluaciones </h3>
                <p class="text-subtitle text-muted">Selecciona los síntomas y signos del paciente {{ $cita->paciente->identificacion->nombre }}</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{ route('dashboard') }}"/>
                    <x-breadcrumb.item value="Citas" href="{{ route('citas.index') }}"/>
                    <x-breadcrumb.item value="{{ $cita->paciente->identificacion->nombre }}" href="{{ route('citas.show', $cita) }}"/>
                    <x-breadcrumb.item value="Evaluar" active/>
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section row justify-content-center">
        <div class="card col-12 col-md-10 col-xl-8">
            <div class="card-header">
                <h4 class="card-title">
                    <i class="bi bi-file-earmark-medical"></i>
                    Evaluación
                </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @if (isset($evaluacion))
                        <form class="form" method="post" action="{{ route('citas.evaluacion.update', [$cita, $evaluacion]) }}">
                            @method('PATCH')
                    @else
                        <form class="form" method="post" action="{{ route('citas.evaluar.store', $cita) }}">
                    @endif                    
                        @csrf                        
                        <div class="form-group">
                            <label for="sintomasInput" class="sr-only">
                                Sintomas
                            </label>
                            <select class="form-select" multiple="multiple" name="sintomas[]" id="sintomasInput"
                                x-data x-ref="sintomas" x-init="
                                    new Choices($refs.sintomas, {
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
                                @foreach(\App\Models\Sintoma::pluck('nombre', 'id') as $id => $nombre)
                                @if (isset($evaluacion))
                                    <option value="{{ $id }}" @selected($evaluacion->sintomas->contains($id))>
                                        {{ $nombre }}
                                    </option>
                                @else
                                    <option value="{{ $id }}">
                                        {{ $nombre }}
                                    </option>
                                @endif
                                    
                                @endforeach
                            </select>

                            <label for="signosInput" class="sr-only">
                                Signos
                            </label>
                            <select class="form-select" multiple="multiple" name="signos[]" id="signosInput"
                                x-data x-ref="signos" x-init="
                                    new Choices($refs.signos, {
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
                                @foreach(\App\Models\Signo::pluck('nombre', 'id') as $id => $nombre)
                                    @if (isset($evaluacion))
                                        <option value="{{ $id }}" @selected($evaluacion->signos->contains($id))>
                                            {{ $nombre }}
                                        </option>
                                    @else
                                        <option value="{{ $id }}">
                                            {{ $nombre }}
                                        </option>
                                    @endif
                                    
                                @endforeach
                            </select>
                            
                        </div>

                        <br>
                        <div class="form-actions d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-2">
                                Actualizar
                            </button>
                            <a href="{{ route('citas.show', $cita) }}" type="reset" class="btn btn-secondary">
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