<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                @isset($user)
                    <h3>Cambiar usuario</h3>
                    <p class="text-subtitle text-muted">Actualiza los campos del usuario</p>
                @else
                    <h3>Crear nuevo usuario</h3>
                    <p class="text-subtitle text-muted">Llena los campos del nuevo usuario</p>
                @endif
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{ route('dashboard') }}" />
                    <x-breadcrumb.item value="Usuarios" href="{{ route('users.index') }}" />
                @isset($user)
                    <x-breadcrumb.item value="{{ $user->alias }}" href="{{ route('users.show', $user) }}"/>
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
                    @isset($user)
                        Cambio
                    @else
                        Registro
                    @endif
                </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @isset($user)
                    <form class="form" method="post" action="{{ route('users.update', $user) }}">
                        @method('PATCH')
                    @else
                    <form class="form" method="post" action="{{ route('users.store') }}">
                    @endisset
                        @csrf

                        <h4 class="card-title">Datos personales</h4>
                        @isset ($user)
                            @include('identificaciones.datos-personales-inputs', ['identificacion' => $user->identificacion])
                        @else
                            @include('identificaciones.datos-personales-inputs')
                        @endisset

                        <br>
                        <h4 class="card-title">Dirección</h4>
                        @isset ($user)
                            <livewire:seleccionar-direccion :direccion="$user->direccion"/>
                        @else
                            <livewire:seleccionar-direccion/>
                        @endisset

                        <br>
                        <h4 class="card-title">Cuenta</h4>
                        <div class="form-body">
                            <div class="form-group">
                                <label for="aliasInput" class="sr-only">
                                    Alias
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('alias')])
                                    type="text" id="aliasInput" autocomplete="off" required
                                    placeholder="Alias" name="alias"
                                    value="{{ old('alias') ?? $user->alias ?? null }}"
                                >
                                <x-maz-input-error for="alias" />
                            </div>
                            <div class="form-group" x-data="{
                                chars: '0123456789abcdefghijklmnopqrstuvwxyz!@#$%&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ',
                                passwordLength: 12,
                                random() {
                                    var password = '';
                                    for (var i = 0; i <= this.passwordLength; i++) {
                                        var randomNumber = Math.floor(Math.random() * this.chars.length);
                                        password += this.chars.substring(randomNumber, randomNumber +1);
                                    }
                                    return password;
                                }
                            }">
                                <label for="passwordInput" class="sr-only">
                                    Contraseña
                                    @if(!isset($user))
                                        <span class="text-danger">*</span>
                                    @endif
                                </label>
                                <div class="input-group">
                                    <input
                                        @class(['form-control', 'is-invalid' => $errors->has('password')])
                                        type="text" id="passwordInput" autocomplete="off"
                                        placeholder="Contraseña" name="password" x-ref="password"
                                        @if(!isset($user))required @endif
                                    >
                                    <button class="btn btn-outline-secondary" type="button" @click="$refs.password.value = random()">
                                        <i class="bi bi-dice-{{ random_int(1,6) }}"></i>
                                    </button>
                                    <x-maz-input-error for="password" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rolInput" class="sr-only">Tipo</label>
                                <select id="rolInput" name="rol_id" class="form-control">
                                @foreach($roles as $id => $nombre)
                                    <option value="{{ $id }}" @selected($id == (old('rol_id') ?? $user->rol->id ?? null) )>{{ $nombre }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <br>
                        <div class="form-actions d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-2">
                                @isset($user) Actualizar @else Agregar @endisset
                            </button>
                            <a href="{{ route('users.index') }}" type="reset" class="btn btn-secondary">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
