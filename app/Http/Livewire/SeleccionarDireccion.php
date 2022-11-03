<?php

namespace App\Http\Livewire;

use App\Models\Direccion;
use App\Models\Estado;
use App\Models\Pais;
use Illuminate\Support\Collection;
use Livewire\Component;

/**
 * @property Collection $paises
 * @property Collection $estados
 */
class SeleccionarDireccion extends Component
{
    public $pais_seleccionado;
    public $estado_seleccionado;

    public function getPaisesProperty(): Collection
    {
        return Pais::orderBy('nombre')->pluck('nombre', 'id');
    }

    public function getEstadosProperty(): Collection
    {
        if ($this->pais_seleccionado == '') {
            return collect();
        } else {
            return Estado::where('pais_id', $this->pais_seleccionado)
                ->orderBy('nombre')
                ->pluck('nombre', 'id');
        }
    }

    public function mount($direccion = null)
    {
        $this->pais_seleccionado = old('pais_id') ?? $direccion->pais_id ?? '';
        $this->estado_seleccionado = old('estado_id') ?? $direccion->estado_id ?? '';
    }

    public function render()
    {
        return view('livewire.seleccionar-direccion');
    }
}
