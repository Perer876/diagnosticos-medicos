<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Actualizar datos sobre la enfermedad</h3>
                <p class="text-subtitle text-muted">Agrega o actualiza pruebas de laboratorio de la enfermedad en cuestion</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{ route('dashboard') }}"/>
                    <x-breadcrumb.item value="Enfermedad" href="{{ route('enfermedades.index') }}"/>
                    <x-breadcrumb.item value="{{ $enfermedade->nombre }}" href="{{ route('enfermedades.show', $enfermedade) }}"/>
                    <x-breadcrumb.item value="Actualizar datos" active/>
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section row justify-content-center">
        <div class="card col-12 col-md-10 col-xl-8">
            <div class="card-header">
                <h4 class="card-title">
                    <i class="bi bi-virus"></i>
                    Enfermedad
                </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" action="{{ route('enfermedades.update-prueba-laboratorio', $enfermedade) }}">
                        @method('PATCH')
                        @csrf                        
                        <div class="form-group">
                            <label for="pruebasInput" class="sr-only">
                                Pruebas de laboratorio
                            </label>
                            <select class="form-select" multiple="multiple" name="pruebas[]" id="pruebasInput"
                                x-data x-ref="pruebas" x-init="
                                    new Choices($refs.pruebas, {
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
                                @foreach(\App\Models\PruebaLaboratorio::pluck('nombre', 'id') as $id => $nombre)
                                    <option value="{{ $id }}" @selected($enfermedade->pruebasLaboratorio->contains($id))>
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
                            <a href="{{ route('enfermedades.show', $enfermedade) }}" type="reset" class="btn btn-secondary">
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