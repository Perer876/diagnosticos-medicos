<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Especialidad::create([
            'nombre' => 'Anestesiología',
            'descripcion' => 'El alumno resolverá las necesidades anestésicas que le permitan al paciente recibir el tratamiento y las correcciones medico-quirúrgicas necesarias para la recuperación de su salud.'
        ]);

        Especialidad::create([
            'nombre' => 'Anatomía Patológica',
            'descripcion' => 'El alumno manejara con eficiencia las técnicas y procedimientos de la anatomía patológica, para establecer los diagnósticos integrales y confiables de la especialidad.'
        ]);

        Especialidad::create([
            'nombre' => 'Cardiología Clínica',
            'descripcion' => 'El alumno manejara las técnicas y procedimientos de la cardiología para atender la patología y procedimientos cardiológicos en pacientes adultos y pediátricos con la finalidad de reintegrarlos a sus actividades habituales en las mejores condiciones.'
        ]);

        Especialidad::create([
            'nombre' => 'Cardiología Intervencionista',
            'descripcion' => 'El discente valorará en forma integral a los pacientes con problemas cardiológicos, con base en la historia clínica y los resultados de los  estudios de gabinete y laboratorio, a fin de establecer el diagnóstico y elaborar y ejecutar el plan terapéutico en forma holística, a fin de brindar atención médica cardiológica y en su caso intervención cardiológica al personal militar y derechohabiente, regulando su actuación profesional siempre con sentido humanístico.'
        ]);

        Especialidad::create([
            'nombre' => 'Cirugía Pediátrica',
            'descripcion' => 'El alumno manejara las técnicas y procedimientos quirúrgicos para atender a los pacientes pediátricos con padecimientos de resolución quirúrgica más frecuentes, tanto electivos como de urgencia.'
        ]);

        Especialidad::create([
            'nombre' => 'Cirugía General',
            'descripcion' => 'El alumno manejara las técnicas y procedimientos quirúrgicos para atender a los pacientes con padecimientos de resolución quirúrgica más frecuentes, tanto los electivos como de urgencia, que corresponden a la especialidad de cirugía general, apreciando al paciente como un ser integral.'
        ]);

        Especialidad::create([
            'nombre' => 'Cirugía Plástica y Reconstructiva',
            'descripcion' => 'El alumno manejara las técnicas y procedimientos de la cirugía plástica y reconstructiva, en el paciente con amputaciones, trauma desfigurante y facial, malformaciones congénitas, quemados y con necesidades estéticas.'
        ]);

        Especialidad::create([
            'nombre' => 'Angiología y Cirugía Vascular y Endovascular',
            'descripcion' => 'El alumno manejara las técnicas y procedimientos de la angiología y cirugía vascular, en el paciente con patología vascular.'
        ]);

        Especialidad::create([
            'nombre' => 'Dermatología',
            'descripcion' => 'El alumno aplicará la terapéutica específica, los métodos y procedimientos de la nueva tecnología disponible mediante la categorización del origen y desarrollo de las diferentes entidades nosológicas que afectan la piel y sus anexos.'
        ]);

        Especialidad::create([
            'nombre' => 'Endoscopia del Aparato Digestivo',
            'descripcion' => 'El alumno realizara los procedimientos diagnósticos y terapéuticos que se llevan a cabo mediante el empleo de la endoscopia, para apoyar al medico tratante en la conformación del diagnostico, mediante el conocimiento de la patología clínica y las destrezas prácticas adquiridas.'
        ]);

        Especialidad::create([
            'nombre' => 'Gastroenterología',
            'descripcion' => 'El alumno tratará los padecimientos del aparato digestivo, utilizando los adelantos tecnológicos y científicos en los procedimientos de diagnóstico clínico, de laboratorio y de gabinete, así como su aplicación en la terapéutica indicada.'
        ]);

        Especialidad::create([
            'nombre' => 'Ginegología y Obstetricia',
            'descripcion' => 'El alumno proporcionara atención directa, integral y constante a las pacientes con problemas gineco-obstetricos, sobre la base de un suficiente conocimiento de los mecanismos homeostáticos y fisiológicos del organismo humano normal y patológico y de la apreciación del individuo como un ser integral.'
        ]);

        Especialidad::create([
            'nombre' => 'Hematología',
            'descripcion' => 'El discente valorará en forma integral a los pacientes adultos con problemas hematológicos, con base en la información clínica adquirida a través de la historia clínica y los resultados de los  estudios de laboratorio y gabinete,  a fin de establecer el diagnóstico y elaborar y ejecutar el plan terapéutico en forma holística, a fin de brindar atención médica segura, eficiente y eficaz al personal militar y derechohabiente, regulando su actuación profesional siempre con sentido humanístico.'
        ]);

        Especialidad::create([
            'nombre' => 'Infectología de Adulto',
            'descripcion' => 'El alumno realizará los diagnósticos de los padecimientos infecciosos que le permitan proponer medidas preventivas y proporcionar el tratamiento adecuado en pacientes de todas las edades.'
        ]);

        Especialidad::create([
            'nombre' => 'Medicina Aeroespacial',
            'descripcion' => 'El alumno realizara los procedimientos diagnósticos y terapéuticos de la especialidad en medicina aeroespacial, además de realizar acciones de medicina del trabajo y preventiva en el ámbito aeronáutico.'
        ]);

        Especialidad::create([
            'nombre' => 'Medicina de Rehabilitación',
            'descripcion' => 'El alumno manejara las técnicas y procedimientos de la rehabilitación física y mental, en el paciente con capacidades diferentes en cualquier edad para reintegrarlo a sus actividades habituales en las mejores condiciones en su calidad de vida.'
        ]);

        Especialidad::create([
            'nombre' => 'Medicina Interna',
            'descripcion' => 'El alumno evaluará en forma integral a los pacientes adultos con problemas médicos, con base en el estudio multidisciplinario sustentado en la recopilación de la información clínica adquirida a través de la historia clínica y los resultados de los estudios de laboratorio gabinete, a fin de establecer el diagnóstico y elaborar y ejecutar el plan terapéutico en forma holística, coaccionando con las diferentes especialidades involucradas, para brindar la atención médica, y proporcionar seguimiento al paciente, emitiendo un pronóstico, regulando su actuación profesional siempre con sentido humanístico.'
        ]);

        Especialidad::create([
            'nombre' => 'Nefrología',
            'descripcion' => 'El alumno aplicará procedimientos para la prevención, estudio, diagnóstico y tratamiento de las enfermedades renales y las alteraciones del equilibrio hidro-eletrolitico y ácido básico, en pacientes de todas las edades.'
        ]);

        Especialidad::create([
            'nombre' => 'Neurología de Adultos',
            'descripcion' => 'El alumno proporcionara atención específica, directa, integral a los pacientes con problemas neurológicos, para restablecer el funcionamiento normal del sistema nervioso central en todas las edades, que le permita una adecuada integración a su vida cotidiana.'
        ]);

        Especialidad::create([
            'nombre' => 'Oftalmología',
            'descripcion' => 'El alumno manejará los conocimientos, destrezas técnicas y procedimientos necesarios, para determinar el diagnóstico y tratamiento médico, terapeútico y quirúrgico del globo ocular, su aparato de protección y anexos en pacientes con diversos problemas y patologías oftalmológicas para reintegrarlos a sus actividades normales.'
        ]);

        Especialidad::create([
            'nombre' => 'Ortopedia',
            'descripcion' => 'El alumno proporcionará atención directa, integral y constante a las pacientes con problemas ortopédicos en cualquier edad sobre la base de un suficiente conocimiento de la anatomía del aparato musculo-esquelético, mecanismos traumáticos, biomecánica, homeostásis y fisiología del organismo humano normal y patológico apreciando al paciente traumatizado como un individuo integral.'
        ]);

        Especialidad::create([
            'nombre' => 'Otorrinolaringología',
            'descripcion' => 'El alumno manejara las técnicas y procedimientos médico-quirúrgicos de la especialidad en otorrinolaringología para atender los pacientes con padecimientos de los oídos, nariz y garganta, y la resolución quirúrgica de padecimientos de la cabeza y el cuello tanto los electivos como de urgencia, en pacientes de todas las edades. '
        ]);

        Especialidad::create([
            'nombre' => 'Patología Clínica',
            'descripcion' => 'El alumno manejará los diversos procedimientos y técnicas empleadas en el laboratorio clínico, así como su organización y funcionamiento, y la interpretación de pruebas y estudios diversos.'
        ]);

        Especialidad::create([
            'nombre' => 'Pediatría',
            'descripcion' => 'El alumno manejara las técnicas y procedimientos de atención médica, en el paciente pediátrico para reintegrarlo a sus actividades habituales en las mejores condiciones de calidad de vida.'
        ]);

        Especialidad::create([
            'nombre' => 'Psiquiatría General',
            'descripcion' => 'El alumno manejará los conocimientos, destrezas técnicas y procedimientos necesarios, para determinar el diagnóstico y tratamiento médico y psicoterapéutico de las enfermedades mentales y del sistema nervioso central que cursan con trastornos psiquiátricos, con la finalidad de reintegrar al paciente psiquiátrico en las mejores condiciones posibles.'
        ]);

        Especialidad::create([
            'nombre' => 'Radiología e Imagen',
            'descripcion' => 'El alumno evaluará las técnicas y procedimientos utilizados en los estudios diagnósticos y terapéuticos que se realizan mediante el empleo de los rayos x, ultrasonografía, tomografía computada, resonancia magnética, radiología intervencionista, neuroradiologa y medicina nuclear, para apoyar al médico tratante en la conformación del diagnóstico mediante el conocimiento de radiofísica, patología clínica y destrezas prácticas adquiridas.'
        ]);

        Especialidad::create([
            'nombre' => 'Medicina Crítica',
            'descripcion' => 'El alumno aplicará con destreza las medidas pertinentes en diagnósticos y terapéuticas aplicables a enfermos en situaciones de alto riesgo, apoyándose en un constante monitoreo clínico y estudios realizados con tecnología moderna, para favorecer la recuperabilidad del paciente y establecer diferentes criterios de muerte.'
        ]);

        Especialidad::create([
            'nombre' => 'Urología',
            'descripcion' => 'El alumno identificará y resolverá médica o quirúrgicamente las entidades nosológicas del tracto génito urinario en el hombre y urinario en la mujer, manejando las técnicas y procedimientos médicos y quirúrgicos urológicos, para reintegrar al individuo a su entorno en las mejores condiciones.'
        ]);

        Especialidad::create([
            'nombre' => 'Neumología',
            'descripcion' => 'El discente valorará en forma integral a los pacientes adultos con problemas neumológicos, con base en la información clínica adquirida a través de la historia clínica y los resultados de los  estudios de laboratorio y gabinete,  a fin de establecer el diagnóstico y elaborar y ejecutar el plan terapéutico en forma holística, a fin de brindar atención médica segura, eficiente y eficaz al personal militar y derechohabiente, regulando su actuación profesional siempre con sentido humanístico.'
        ]);

        Especialidad::create([
            'nombre' => 'Cirugía Oncológica',
            'descripcion' => 'El personal discente valorará en forma integral a los pacientes adultos con problemas oncológicos que ameriten tratamiento quirúrgico, con base en la información proporcionada a través de la historia clínica y los resultados de los  estudios de laboratorio y gabinete,  a fin de establecer el diagnóstico y elaborar y ejecutar el plan terapéutico en forma holística, brindando atención médica segura, eficiente y eficaz al personal militar y derechohabiente, regulando su actuación profesional siempre con sentido humanístico.'
        ]);

        Especialidad::create([
            'nombre' => 'Oncología Médica',
            'descripcion' => 'El personal discente valorará en forma integral a los pacientes adultos con problemas oncológicos, con base en la información clínica adquirida a través de la historia clínica y los resultados de los  estudios de laboratorio, gabinete, endoscópicos e histopatológicos. Establecerá el diagnóstico presuntivo y definitivo; elaborará y ejecutará el plan terapéutico en forma holística, a fin de brindar atención médica oportuna, eficente, eficaz, segura y cálida al personal militar y derechohabiente, siempre con un sentido humanístico.'
        ]);

        Especialidad::create([
            'nombre' => 'Oncología Pediátrica',
            'descripcion' => 'El personal discente valorará en forma integral a los pacientes en edad pediátrica con problemas oncológicos, con base en la información clínica adquirida a través de la historia clínica y los resultados de los  estudios de laboratorio y gabinete,  a fin de establecer el diagnóstico y elaborar y ejecutar el plan terapéutico en forma integral, a fin de brindar atención médica segura, eficiente y eficaz en estos pacientes.'
        ]);

        Especialidad::create([
            'nombre' => 'Radio-Oncología',
            'descripcion' => 'El personal discente, será un líder que aplicara con eficiencia los tratamientos que requieren el uso de las radiaciones ionizantes para fines médicos en el tratamiento integral de los pacientes con diagnóstico de neoplasias malignas y enfermedades afines,  mediante el empleo eficiente de los conocimientos de oncología,  radio física, patología clínica, radiobiologia, radiología clinica y farmacología oncologica, en el uso de los diferentes equipos de radioterapia asi como de las  destrezas practicas adquiridas, a fin de brindar atención médica segura, eficiente y eficaz al personal militar y derechohabiente, regulando su actuación profesional siempre con sentido humanístico.'
        ]);

        Especialidad::create([
            'nombre' => 'Cirugía Neurológica',
            'descripcion' => 'Especialistas en cirugía neurológica que apliquen las técnicas y procedimientos quirúrgicos para atender a los pacientes con padecimientos de resolución neuroquirúrgica más frecuentes, tanto los electivos como de urgencia, que corresponden a la especialidad de cirugía neurológica, apreciando al paciente como un ser integral.'
        ]);
    }
}
