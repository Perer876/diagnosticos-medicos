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

        Enfermedad::factory()
            ->state([
                'nombre' => 'Tuberculosis pulmonar',
                'descripcion' => 'La tuberculosis (TB) es una enfermedad bacteriana que generalmente ataca los pulmones. Pero también puede atacar otras partes del cuerpo, incluyendo riñones, la columna vertebral y el cerebro.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Escalofríos", "Fatiga", "Pérdida de apetito", "Dolor en el pecho"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Transpiración nocturna", "Fiebre", "Tos con sangre", "Tos con esputo"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Antibiótico"
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                "Análisis de sangre", "Prueba de esputo", "Radiografía del torax"
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Neumonía',
                'descripcion' => 'La neumonía es una infección en uno o ambos pulmones. Causa que los alvéolos pulmonares se llenen de líquido o pus. Puede variar de leve a grave, según el tipo de germen que causa la infección, su edad y su estado general de salud.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Escalofríos", "Náuseas", "Dolor en el pecho"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Tos con esputo", "Fiebre", "Dificultad para respirar", "Vómito", "Diarrea"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Antibiótico", "Oxigenoterapia"
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                "Análisis de sangre", "Prueba de cultivo de bacterias", "Radiografía del torax", "Prueba de esputo", "Oximetría de pulso", "Broncoscopia"
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Embolia pulmonar',
                'descripcion' => 'Es un bloqueo súbito de una arteria pulmonar. Puede ocurrir después de que un coágulo se desprenda y viaje por el torrente sanguíneo hacia los pulmones. '
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Dolor en el pecho"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Falta de aliento", "Respiración rápida", "Frecuencia cardiaca alta", "Toser sangre", "Presión arterial"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Anticoagulantes", "Trombolíticos", "Trombólisis con asistencia por catéter"
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                "Angiotomografía computarizada", "Prueba del dímero D", "Examen de isoenzimas de la lactato deshidrogenasa", "Gammagrafía pulmonar de ventilación/perfusión", "Radiografía torácica"
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Triquinosis',
                'descripcion' => 'La triquinosis es una enfermedad parasitaria causada por el consumo de carne mal cocida y que contiene quistes (larvas o gusanos inmaduros) de Trichinella spiralis.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Molestia abdominal", "Dolor muscular", "Debilidad muscular"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Diarrea", "Hinchazón facial alrededor de los ojos", "Fiebre"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Albendazol", "Analgésicos"
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                "Conteo sanguíneo completo", "Conteo de eosinófilos", "Biopsia del músculo"
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Diabetes',
                'descripcion' => 'Es una enfermedad en la que los niveles de glucosa (azúcar) de la sangre están muy altos. Con el tiempo, el exceso de glucosa en la sangre puede causar problemas serios. Puede dañar los ojos, los riñones y los nervios. '
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Fatiga", "Visión borrosa", "Aumento apetito"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Úlceras no cicatrizan", "Perdida de peso"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Plan de alimentación para diabeticos", "Actividad física"
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                "Análisis de sangre de glucagón", "Examen de anticuerpos antinsulínicos", "Examen de cetonas en la sangre", "Examen de cetonas en orina", "Examen de glucemia"
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Artritis reactiva',
                'descripcion' => 'Ocurre cuando su sistema inmunológico reacciona a una infección en otra parte de su cuerpo. Puede hacer que sus articulaciones se inflamen y duelan, similar a los síntomas de la artritis. También puede afectar sus ojos y genitales'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Dolor en articulaciones", "Dolor de estomago", "Dolor en el talón"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Hinchazón en articulaciones", "Enrojecimiento en articulaciones", "Fiebre", "Diarrea", "Llagas en la piel", "Úlceras en la boca"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Antiinflamatorios no esteroides"
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                "Análisis de orina"
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Dengue',
                'descripcion' => 'El dengue es una infección causada por un virus. Usted puede infectarse si un mosquito infectado lo pica. El dengue no se transmite de persona a persona.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Dolor en articulaciones", "Dolor muscular", "Dolor de cabeza"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Sangrado en la naríz", "Sangrado en las encías", "Fiebre", "Vómito", "Sarpullido"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Acetaminofén", "Descansar"
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                "Análisis de sangre"
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Fibromialgia',
                'descripcion' => 'Es una afección crónica que causa dolor en todo el cuerpo, fatiga y otros síntomas. Las personas con fibromialgia pueden ser más sensibles al dolor que aquellas que no la tienen. Esto se conoce como percepción anormal del dolor.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Dolor corporal", "Fatiga", "Dolor de cabeza", "Dificultad para dormir"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Depresión", "Ansiedad", "Síndrome del intestino irritable"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Analgésicos", "Antidepresivos", "Terapia conversacional"
            ])->get())
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Hepatitis viral',
                'descripcion' => 'La hepatitis es la inflamación del hígado. Inflamación es la hinchazón de órganos que ocurren cuando se lesionan o infectan, y puede dañar su hígado. La hinchazón y daño puede afectar el buen funcionamiento de este órgano.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Fatiga", "Pérdida de apetito", "Náusea", "Dolor abdominal", "Dolor en articulaciones"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Fiebre", "Vómito", "Orina oscura", "Heces de color arcilla", "Ictericia"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Descansar", "Transplante de hígado"
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                "Ecografía", "Resonancia magnética", "Tomografía computarizada", "Biopsia de hígado", "Análisis de sangre"
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

        Enfermedad::factory()
            ->state([
                'nombre' => 'Conjuntivitis',
                'descripcion' => 'Causa hinchazón, picazón, ardor, lagrimeo y enrojecimiento de la conjuntiva, la membrana delgada y translúcida que recubre la parte blanca del ojo y el interior de los párpados'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                "Picazon ojos"
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                "Quemosis", "Secreciones ojos", "Lagrimeo"
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                "Antibióticos para la conjuntivitis"
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                "Cultivo de bacterias"
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();

    }
}
