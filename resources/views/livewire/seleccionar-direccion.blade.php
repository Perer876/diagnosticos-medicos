<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="paisInput" class="sr-only">
                País
                <span class="text-danger">*</span>
            </label>
            <select id="paisInput" name="pais_id"
                    @class(['form-control', 'is-invalid' => $errors->has('pais_id')])
                    wire:model="pais_seleccionado" required>
                <option value="" selected>Seleccione un país</option>
                @foreach($this->paises as $id => $nombre)
                    <option value="{{ $id }}">{{ $nombre }}</option>
                @endforeach
            </select>
            <x-maz-input-error for="pais_id" />
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="estadoInput" class="sr-only">
                Estado
                <span class="text-danger">*</span>
            </label>
            <select id="estadoInput" name="estado_id"
                    @class(['form-control', 'is-invalid' => $errors->has('estado_id')])
                    @disabled($pais_seleccionado == '')
                    wire:model="estado_seleccionado" required>
                <option value="" selected>Seleccione un estado</option>
                @foreach($this->estados as $id => $nombre)
                    <option value="{{ $id }}">{{ $nombre }}</option>
                @endforeach
            </select>
            <x-maz-input-error for="estado_id" />
        </div>
    </div>
</div>
