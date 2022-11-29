<?php

namespace Database\Seeders;

use App\Models\Tratamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tratamiento::create(['nombre' => 'Colocación de stent endoscópico', 'descripcion' => 'Un endoscopio es un instrumento delgado en forma de tubo que se usa para observar tejidos dentro del cuerpo. Se puede usar para colocar un dispositivo llamado stent. El stent ayuda a abrir una vía aérea que ha sido bloqueada por tejido anormal.',]);
        Tratamiento::create(['nombre' => 'Acetaminofén ', 'descripcion' => 'Para bajar la fiebre.']);
        Tratamiento::create(['nombre' => 'Aspirina', 'descripcion' => 'Se usa para bajar la fiebre y aliviar el dolor leve a moderado causado por dolor de cabeza, , periodos menstruales, artritis, dolor en los dientes y dolores musculares.']);
        Tratamiento::create(['nombre' => 'Antibiótico', 'descripcion' => 'Son medicamentos que combaten las infecciones bacterianas en personas y animales. Funcionan matando las bacterias o dificultando su crecimiento y multiplicación.']);
        Tratamiento::create(['nombre' => 'Descongestionante', 'descripcion' => 'Pueden ayudar a contraer los tejidos inflamados en la nariz, los senos paranasales, la garganta y el espacio detrás del tímpano (oído medio). Esto puede aliviar la presión, el dolor y la congestión.']);
        Tratamiento::create(['nombre' => 'Analgésico', 'descripcion' => 'Reducen o alivian los dolores de cabeza, musculares, artríticos o muchos otros achaques y dolores.']);
        Tratamiento::create(['nombre' => 'Remdesivir', 'descripcion' => 'Remdesivir es un medicamento antiviral que se desarrolló inicialmente para la enfermedad del virus del Ébola, pero que también ha demostrado actividad in vitro frente al SARS-CoV-2.']);
        Tratamiento::create(['nombre' => 'Sotromivab', 'descripcion' => 'Este medicamento se administra a través de una aguja en la piel (por vía intravenosa).']);
        Tratamiento::create(['nombre' => 'Paxlovid', 'descripcion' => 'Paxlovid es un medicamento antiviral compuesto por dos fármacos: uno bloquea una enzima clave que el coronavirus necesita para replicarse y el segundo bloquea el metabolismo del primer fármaco en el hígado para que no abandone el cuerpo tan rápidamente. Los pacientes toman tres pastillas dos veces al día, durante cinco días.']);
        Tratamiento::create(['nombre' => 'Molnupiravir', 'descripcion' => 'Medicamento para tratar la COVID-19 de leve a moderada en adultos que corren un mayor riesgo de presentar una forma grave de la enfermedad y que no tienen ninguna otra opción de tratamiento. Este medicamento es una pastilla que se toma por vía oral.']);
        Tratamiento::create(['nombre' => 'Anticoagulantes', 'descripcion' => 'Son medicamentos que evitan la formación de coágulos sanguíneos. No rompen los coágulos que ya tiene, pero pueden evitar que crezcan.']);
        Tratamiento::create(['nombre' => 'Trombólisis con asistencia por catéter', 'descripcion' => 'Trata bloqueos vasculares y mejora el flujo sanguíneo mediante la disolución de coágulos sanguíneos anormales.']);
        Tratamiento::create(['nombre' => 'Oxigenoterapia', 'descripcion' => 'La terapia con oxígeno es un tratamiento que le entrega oxígeno adicional para respirar.']);
        Tratamiento::create(['nombre' => 'Trombolíticos', 'descripcion' => 'Son medicamentos que disuelven los coágulos de sangre. Puede tomarlos si tiene coágulos grandes que causan síntomas graves u otras complicaciones serias.']);
        Tratamiento::create(['nombre' => 'Albendazol', 'descripcion' => 'El albendazol es un incompleto derivado de los benzimidazoles indicado como fármaco en el tratamiento de una variedad de infestaciones causadas por parásitos.']);
        Tratamiento::create(['nombre' => 'Plan de alimentación para diabeticos', 'descripcion' => 'No existe una dieta o un plan de comidas específico que funcione para todos. Pero todos los planes de alimentación para la diabetes tienen algunas cosas en común, incluyendo comer alimentos correctos en cantidades adecuadas en los momentos apropiados.']);
        Tratamiento::create(['nombre' => 'Antiinflamatorios no esteroides', 'descripcion' => 'Los medicamentos antiinflamatorios no esteroideos (AINE) reducen la fiebre y la inflamación y alivian el dolor. Como ejemplos de AINE se incluyen la aspirina, el ibuprofeno y el naproxeno.']);
        Tratamiento::create(['nombre' => 'Antidepresivos', 'descripcion' => 'Se recetan para problemas del estado de ánimo, como la depresión y la ansiedad, y también para el dolor y la dificultad para dormir.']);
        Tratamiento::create(['nombre' => 'Terapia conversacional', 'descripcion' => 'Ayudarle a aprender estrategias para lidiar con el dolor, estrés y sus pensamientos negativos. ']);
        Tratamiento::create(['nombre' => 'Descansar', 'descripcion' => '']);
        Tratamiento::create(['nombre' => 'Tomar liquidos', 'descripcion' => '']);
        Tratamiento::create(['nombre' => 'Usar gotas o aerosoles nasales salinos', 'descripcion' => '']);
        Tratamiento::create(['nombre' => 'Quimioterapia', 'descripcion' => '']);
        Tratamiento::create(['nombre' => 'Radioterapia', 'descripcion' => '']);
        Tratamiento::create(['nombre' => 'Inmunoterapia', 'descripcion' => '']);
        Tratamiento::create(['nombre' => 'Bebtelovimab', 'descripcion' => '']);
        Tratamiento::create(['nombre' => 'Actividad física', 'descripcion' => '']);
        Tratamiento::create(['nombre' => 'Antibióticos para la conjuntivitis', 'descripcion' => '']);
        Tratamiento::create(['nombre' => 'Trombolíticos', 'descripcion' => '']);
        Tratamiento::create(['nombre' => 'Transplante de hígado', 'descripcion' => '']);
    }
}
