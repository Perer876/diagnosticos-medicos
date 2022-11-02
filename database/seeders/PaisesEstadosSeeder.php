<?php

namespace Database\Seeders;

use App\Models\Estado;
use App\Models\Pais;
use DougSisk\CountryState\CountryStateFacade as CountryState;
use Illuminate\Database\Seeder;

class PaisesEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (CountryState::getCountries() as $codigo => $nombre) {
            $pais = Pais::create([
                'codigo' => $codigo,
                'nombre' => $nombre
            ]);
            foreach (CountryState::getStates($codigo) as $codigo_estado => $nombre_estado) {
                Estado::create([
                    'nombre' => $nombre_estado,
                    'codigo' => $codigo_estado,
                    'pais_id' => $pais->id
                ]);
            }
        }
    }
}
