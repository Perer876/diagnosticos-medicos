<div class="form-group">
    <label for="nombresInput" class="sr-only">
        Nombre(s)
        <span class="text-danger">*</span>
    </label>
    <input
        @class(['form-control', 'is-invalid' => $errors->has('nombres')])
        type="text" id="nombresInput"
        value="{{ old('nombres') ?? $identificacion->nombres ?? null }}" required
        placeholder="Nombre(s)" name="nombres" autocomplete="off"
    >
    <x-maz-input-error for="nombres" />
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="apellidoPaternoInput" class="sr-only">
                Apellido paterno
                <span class="text-danger">*</span>
            </label>
            <input
                @class(['form-control', 'is-invalid' => $errors->has('apellido_paterno')])
                type="text" id="apellidoPaternoInput" placeholder="Apellido paterno"
                value="{{ old('apellido_paterno') ?? $identificacion->apellido_paterno ?? null }}"
                name="apellido_paterno" autocomplete="off" required
            >
            <x-maz-input-error for="apellido_paterno" />
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="apellidoMaternoInput" class="sr-only">
                Apellido materno
                <span class="text-danger">*</span>
            </label>
            <input
                @class(['form-control', 'is-invalid' => $errors->has('apellido_materno')])
                type="text" id="apellidoMaternoInput" placeholder="Apellido materno"
                value="{{ old('apellido_materno') ?? $identificacion->apellido_materno ?? null }}"
                name="apellido_materno" autocomplete="off" required
            >
            <x-maz-input-error for="apellido_materno" />
        </div>
    </div>
</div>
