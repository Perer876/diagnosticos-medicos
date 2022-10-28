<x-guest-layout>

    <div id="auth-left">
        <div class="auth-logo mb-5">
            <a href="index.html"><img src="{{ asset('/images/logo/logo.png') }}" alt="Logo"></a>
        </div>
        <h2 class="auth-title fs-2">Inicio de sesión.</h2>
        <p class="auth-subtitle fs-6 mb-4">Ingresa con tus credenciales.</p>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input class="form-control" type="text" name="alias" placeholder="Alias"
                    value="{{ old('alias') }}">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control" name="password" placeholder="Contraseña">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <div class="form-check d-flex align-items-end">
                <input class="form-check-input me-2" type="checkbox" name="remember" id="flexCheckDefault">
                <label class="form-check-label text-gray-600" for="flexCheckDefault">
                    Mantener sesión activa
                </label>
            </div>
            <button class="btn btn-primary btn-block shadow-lg mt-5">Iniciar sesión</button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            @if (Route::has('register'))
            <p class="text-gray-600">Don't have an account? <a href="{{route('register')}}" class="font-bold">Sign
                    up</a>.</p>
            @endif


            @if (Route::has('password.request'))
            <p><a class="font-bold" href="{{route('password.request')}}">Forgot password?</a>.</p>
            @endif
        </div>
    </div>
</x-guest-layout>
