<?php

namespace Database\Seeders;

use App\Models\Enfermedad;
use App\Models\PruebaLaboratorio;
use App\Models\Signo;
use App\Models\Sintoma;
use App\Models\Tratamiento;
use Illuminate\Database\Seeder;

class EnfermedadSeeder extends Seeder
{
    public function run()
    {
        Enfermedad::factory()
            ->state([
                'nombre' => 'Bronquitis Aguda',
                'descripcion' => 'También llamada resfriado de pecho, ocurre cuando las vías respiratorias en el pulmón se inflaman y producen mucosidad en los pulmones. Eso es lo que lo hace toser. La bronquitis aguda puede durar menos de 3 semanas.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                'Dolor en el pecho', 'Fatiga', 'Dolor de cabeza', 'Dolor corporal', 'Dolor de garganta'
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                'Tos', 'Dificultad para respirar',
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                'Descansar', 'Tomar líquidos', 'Aspirina', 'Acetaminofén para bajar la fiebre'
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                'Prueba de esputo', 'Gasometría arterial'
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Resfriado común',
                'descripcion' => 'Es una infección leve de las vías respiratorias altas (que incluye la nariz y la garganta). Son más comunes en invierno y primavera, pero pueden ocurrir en cualquier momento.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                'Dolor de garganta', 'Dolor de cabeza'
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                'Estornudos', 'Congestión', 'Secreción nasal', 'Tos'
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                'Descansar', 'Tomar líquidos', 'Usar gotas o aerosoles nasales salinos'
            ])->get())
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Infección de oído',
                'descripcion' => 'La infección afecta el oído medio y se denomina otitis media. Los tubos dentro de los oídos se tapan con líquido y moco. Esto puede afectar la audición, ya que el sonido no puede pasar a través de todo ese líquido'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                'Dolor de oído', 'Dificultad para dormir'
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                'Secreción en el oído', 'Fiebre'
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                'Antibiótico'
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                'Cultivo de secreción del oído'
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Trombosis venosa profunda',
                'descripcion' => 'Es un coágulo sanguíneo que se forma en una vena profunda en el cuerpo. Suele ocurrir en las piernas o los muslos.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                'Dolor encima de la vena'
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                'Enrojecimiento de la piel', 'Inflamación'
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                'Anticoagulantes', 'Trombólisis con asistencia por catéter'
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                'Ecografía Doppler', 'Prueba del dímero D', 'Venografía'
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Sinusitis',
                'descripcion' => 'Consiste en la inflamación de los senos paranasales. Esto puede ser por una infección u otro problema. Los senos paranasales son espacios huecos donde pasa el aire por el interior de los huesos que rodean la nariz. Producen secreción mucosa que drena hacia la nariz. Si la nariz está inflamada, puede bloquear los senos paranasales y causar dolor.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                'Fatiga'
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                'Fiebre', 'Debilidad', 'Tos', 'Congestión'
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                'Antibiótico', 'Descongestionante', 'Analgésico'
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                'Tomografía Computarizada de los senos paranasales'
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Celulitis',
                'descripcion' => 'Es una infección de la piel y los tejidos más profundos. El estreptococo del grupo A es la causa más común. La bacteria entra en su cuerpo cuando usted se lesiona la piel como sucede en una herida, quemadura o corte quirúrgico.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                'Escalofrios'
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                'Fiebre', 'Inflamación de los nódulos', 'Erupción en la piel'
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                'Antibiótico'
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                'Análisis de sangre'
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Faringitis',
                'descripcion' => 'Las infecciones de garganta por estreptococos son infecciones tanto en la garganta como las amígdalas causadas por bacterias. Estas bacterias se llaman Streptococcus del grupo A'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Dolor al tragar"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Ganglios linfáticos inflamados", "Tos"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Tomar liquidos", "Analgésico"
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                "Cultivo nasofaríngeo"
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Infección urinaria',
                'descripcion' => 'Son infecciones comunes que ocurren cuando entran bacterias a la uretra, generalmente de la piel o el recto, e infectan las vías urinarias. Pueden afectar a distintas partes de las vías urinarias, pero la infección de vejiga (cistitis) es el tipo más común.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Dolor o ardor al orinar", "Fatiga", "Presión en la región inferior del abdomen", "Orinar con frecuencia"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Fiebre"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Antibiótico"
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                "Análisis de orina"
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Cáncer de pulmón de células pequeñas',
                'descripcion' => 'El cáncer de pulmón es un cáncer que se forma en los tejidos del pulmón, generalmente en las células que recubren los conductos de aire.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Dolor en el pecho", "Fatiga", "Ronquera", "Pérdida de apetito", "Pérdida de peso"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Hinchazón en la cara", "Tos", "Sangre en el esputo", "Dificultad para respirar"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Quimioterapia", "Radioterapia", "Inmunoterapia", "Colocación de stent endoscópico"
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                "Análisis de sangre", "Prueba de esputo"
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'COVID-19',
                'descripcion' => 'La enfermedad del coronavirus 2019 (COVID-19) es causada por un virus. Este virus es un coronavirus llamado SARS-COV-2. Se propaga cuando una persona con la infección expulsa gotitas y partículas muy pequeñas que contienen el virus.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Dolor en el pecho", "Fatiga", "Dolor de cabeza", "Dolor corporal", "Dolor de garganta", "Escalofríos"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Fiebre", "Tos", "Dificultad para respirar", "Vómito", "Diarrea"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Sotrovimab", "Bebtelovimab", "Remdesivir", "Paxlovid", "Molnupiravir"
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                "Prueba de antígenos", "Prueba de PCR", "Prueba de anticuerpos"
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        /*Enfermedad::factory()
            ->state([
                'nombre' => '',
                'descripcion' => ''
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [

            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [

            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [

            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [

            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();*/

    }
}
