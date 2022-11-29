<?php

namespace Database\Seeders;

use App\Models\PruebaLaboratorio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PruebaLaboratorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PruebaLaboratorio::create(['nombre' => 'Prueba de esputo', 'descripcion' => 'Un cultivo de esputo es una prueba que busca bacterias y otros gérmenes que pueden causar una infección en los pulmones o las vías respiratorias. El esputo, también conocido como flema, es un tipo de mucosidad espesa que se produce en los pulmones.']);
        PruebaLaboratorio::create(['nombre' => 'Gasometría arterial', 'descripcion' => 'Es una medición de la cantidad de oxígeno y de dióxido de carbono presente en la sangre. Este examen también determina la acidez (pH) de la sangre.',]);
        PruebaLaboratorio::create(['nombre' => 'Cultivo de secreción del oído', 'descripcion' => 'Sirve para detectar bacterias que causan infección. La muestra que se toma para este examen puede ser de líquido, pus, cera o sangre del oído.',]);
        PruebaLaboratorio::create(['nombre' => 'Tomografía computarizada de los senos paranasales', 'descripcion' => 'Utiliza un equipo especial de rayos X para evaluar las cavidades en los senos paranasales (espacios huecos, llenos de aire entre los huesos de la cara que rodean la cavidad nasal). La exploración por TC es indolora, no es invasiva y es precisa. Es también la técnica por imágenes más confiable para determinar si los senos paranasales están obstruidos, y es la mejor modalidad de toma de imágenes para la sinusitis.',]);
        PruebaLaboratorio::create(['nombre' => 'Análisis de orina', 'descripcion' => 'Es la evaluación física, química y microscópica de la orina. Dicho análisis consta de varios exámenes para detectar y medir diversos compuestos que salen a través de la orina.',]);
        PruebaLaboratorio::create(['nombre' => 'Análisis de sangre', 'descripcion' => '',]);
        PruebaLaboratorio::create(['nombre' => 'Prueba de antígenos', 'descripcion' => '',]);
        PruebaLaboratorio::create(['nombre' => 'Prueba de PCR', 'descripcion' => '',]);
        PruebaLaboratorio::create(['nombre' => 'Prueba de anticuerpos', 'descripcion' => '',]);
        PruebaLaboratorio::create(['nombre' => 'Radiografía del torax', 'descripcion' => '',]);
        PruebaLaboratorio::create(['nombre' => 'Cultivo nasofaríngeo', 'descripcion' => 'Se analiza una muestra de las secreciones de la parte superior de la garganta, por detrás de la nariz, para detectar organismos que puedan causar enfermedad.',]);
        PruebaLaboratorio::create(['nombre' => 'Prueba de cultivo de bacterias', 'descripcion' => 'Para detectar qué tipo de bacteria puede tener, un profesional de la salud examinará un gran número de células bacterianas. Para esto, su muestra se enviará a un laboratorio donde se cultivará hasta que haya suficientes bacterias para la prueba. En general, los resultados están listos en pocos días. Sin embargo, algunos tipos de bacterias se reproducen lentamente, por lo que sus resultados pueden tardar varios días o más.',]);
        PruebaLaboratorio::create(['nombre' => 'Ecografía Doppler', 'descripcion' => 'Es un estudio por imágenes que utiliza ondas de sonido para mostrar la circulación de la sangre por los vasos sanguíneos.',]);
        PruebaLaboratorio::create(['nombre' => 'Oximetria de pulso', 'descripcion' => 'Busca verificar cuánto oxígeno hay en su sangre.',]);
        PruebaLaboratorio::create(['nombre' => 'Broncoscopia', 'descripcion' => 'Procedimiento que se utiliza para observar el interior de las vías respiratorias de los pulmones.',]);
        PruebaLaboratorio::create(['nombre' => 'Prueba del dímero D', 'descripcion' => 'Es una prueba que busca el dímero D en la sangre, un fragmento de proteína que se produce cuando un coágulo de sangre se disuelve en el cuerpo.',]);
        PruebaLaboratorio::create(['nombre' => 'Venografía', 'descripcion' => 'Es un examen de rayos X que utiliza una inyección de material de contraste para mostrar cómo fluye la sangre a través de las venas.',]);
        PruebaLaboratorio::create(['nombre' => 'Angiotomografía computarizada', 'descripcion' => 'Utiliza una inyección de material de contraste en sus vasos sanguíneos y la tomografía computarizada para ayudar a diagnosticar y evaluar enfermedades de los vasos sanguíneos o condiciones relacionadas, tales como los aneurismas o bloqueos. ',]);
        PruebaLaboratorio::create(['nombre' => 'Examen de isoenzimas de la lactato deshidrogenasa', 'descripcion' => 'Mide los niveles de las diferentes isoenzimas de la lactato deshidrogenasa (LDH) en la sangre. La LDH, también conocida como ácido láctico deshidrogena, es un tipo de proteína llamada enzima.',]);
        PruebaLaboratorio::create(['nombre' => 'Conteo sanguíneo completo', 'descripcion' => 'Un hemograma o conteo sanguíneo completo (CSC) mide lo siguiente: La cantidad de glóbulos rojos (conteo de GR), la cantidad de glóbulos blancos (conteo de GB), la cantidad total de hemoglobina en la sangre, la fracción de la sangre compuesta de glóbulos rojos (hematocrito)',]);
        PruebaLaboratorio::create(['nombre' => 'Gammagrafía pulmonar de ventilación/perfusión', 'descripcion' => 'Consiste en un par de gammagrafías para medir la respiración (ventilación) y la circulación (perfusión) en todas las áreas de los pulmones.',]);
        PruebaLaboratorio::create(['nombre' => 'Radiografía torácica', 'descripcion' => 'Es una radiografía del tórax, los pulmones, el corazón, las grandes arterias, las costillas y el diafragma.',]);
        PruebaLaboratorio::create(['nombre' => 'Análisis de sangre de glucagón', 'descripcion' => 'Esta prueba mide el nivel de glucagón en la sangre. El glucagón es una hormona producida por el páncreas. Ayuda a controlar el nivel de glucosa (azúcar en la sangre) del cuerpo.',]);
        PruebaLaboratorio::create(['nombre' => 'Examen de anticuerpos antinsulínicos', 'descripcion' => 'Se realiza para ver si su cuerpo ha producido anticuerpos contra la insulina.',]);
        PruebaLaboratorio::create(['nombre' => 'Examen de cetonas en la sangre', 'descripcion' => 'Un examen de cetonas en sangre mide la cantidad de cetonas que están en la sangre.',]);
        PruebaLaboratorio::create(['nombre' => 'Examen de cetonas en orina', 'descripcion' => 'Este examen mide la cantidad de cetonas en la orina.',]);
        PruebaLaboratorio::create(['nombre' => 'Examen de glucemia', 'descripcion' => 'Un examen de azúcar en sangre mide la cantidad de un azúcar llamado glucosa en una muestra de sangre.',]);
        PruebaLaboratorio::create(['nombre' => 'Cultivo de bacterias', 'descripcion' => 'Puede detectar bacterias perjudiciales dentro o sobre el cuerpo que pueden estar causando enfermedades.',]);
        PruebaLaboratorio::create(['nombre' => 'Conteo de eosinófilos', 'descripcion' => '',]);
        PruebaLaboratorio::create(['nombre' => 'Biopsia del músculo', 'descripcion' => '',]);
        PruebaLaboratorio::create(['nombre' => 'Ecografía', 'descripcion' => '',]);
        PruebaLaboratorio::create(['nombre' => 'Resonancia magnética', 'descripcion' => '',]);
        PruebaLaboratorio::create(['nombre' => 'Tomografía computarizada', 'descripcion' => '',]);
        PruebaLaboratorio::create(['nombre' => 'Biopsia de hígado', 'descripcion' => '',]);
    }   
}