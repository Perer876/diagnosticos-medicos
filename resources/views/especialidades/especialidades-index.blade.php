<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Especialidades</h3>
                <p class="text-subtitle text-muted">Administra las especialidades en las que puede estar formado un medico</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{route('dashboard')}}"/>
                    <x-breadcrumb.item value="Especialidades" active/>
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section row justify-content-center">
        <div class="card col-12 col-md-10 col-xl-8">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Listado</h4>
                <a class="btn btn-success rounded-pill" href="{{ route('especialidades.create') }}">
                    Agregar especialidad
                    <i class="bi bi-file-earmark-medical"></i>
                </a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="accordion" id="acordionEspecialidades">
                        <div class="accordion-item">
                        @foreach($especialidades as $especialidad)
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEspecialidad{{ $especialidad->id }}" aria-expanded="false" aria-controls="collapseEspecialidad{{ $especialidad->id }}">
                                    <span class="fs-5 fw-bolder">{{ $especialidad->nombre }}</span>
                                </button>
                            </h2>
                            <div id="collapseEspecialidad{{ $especialidad->id }}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{{ $especialidad->descripcion }}</p>
                                    <div class="text-end">@include('especialidades.especialidad-acciones', ['id' => $especialidad->id])</div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    @empty($especialidades->all())
                        <div class="text-center p-3">No hay especialidades registradas</div>
                    @endempty
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
