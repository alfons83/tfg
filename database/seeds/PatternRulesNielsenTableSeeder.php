<?php

use Illuminate\Database\Seeder;

class PatternRulesNielsenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pattern_rules_nielsen');


        factory(App\Models\patterns\RulesNielsen::class)->create([

            'id' => '1',
            'name' => 'Visibilidad del estado del sistema',
            'description' => 'El sistema debe informar a los usuarios del estado del sistema, dando una retroalimentación apropiada en un tiempo razonable.'


        ]);

        factory(App\Models\patterns\RulesNielsen::class)->create([

            'id' => '2',
            'name' => 'Utilizar el lenguaje de los usuarios',
            'description' => 'El sistema debe utilizar el lenguaje de los usuarios, con palabras o frases que le sean conocidas, en lugar de los términos que se utilizan en el sistema, para que al usuario no se le dificulte utilizar el sistema'


        ]);
        factory(App\Models\patterns\RulesNielsen::class)->create([

            'id' => '3',
            'name' => 'Control y libertad para el usuario',
            'description' => 'En casos en los que los usuarios elijan una opción del sistema por error, éste debe contar con las opciones de deshacer y rehacer para proveer al usuario de una salida fácil sin tener que utilizar diálogo extendido'


        ]);
        factory(App\Models\patterns\RulesNielsen::class)->create([

            'id' => '4',
            'name' => 'Consistencia y estándares',
            'description' => 'El usuario debe seguir las normas y convenciones de la plataforma sobre la que está implementando el sistema, para que no se tenga que preguntar el significado de las palabras, situaciones o acciones del sistema'


        ]);
        factory(App\Models\patterns\RulesNielsen::class)->create([

            'id' => '5',
            'name' => 'Prevención de errores',
            'description' => 'Es más importante prevenir la aparición de errores que generar buenos mensajes de error. Hay que eliminar acciones predispuestas al error o, en todo caso, localizarlas y preguntar al usuario si está seguro de realizarlas'

        ]);

        factory(App\Models\patterns\RulesNielsen::class)->create([

            'id' => '6',
            'name' => 'Minimizar la carga de la memoria del usuario',
            'description' => 'El sistema debe minimizar la información que el usuario debe recordar mostrándola a través de objetos, acciones u opciones. El usuario no tiene por qué recordar la información que recibió anteriormente. Las instrucciones para el uso del sistema deberían ser visibles o estar al alcance del usuario cuando se requieran'


        ]);

        factory(App\Models\patterns\RulesNielsen::class)->create([

            'id' => '7',
            'name' => 'Flexibilidad y eficiencia de uso',
            'description' => 'Los aceleradores permiten aumentar la velocidad de interacción para el usuario experto tal que el sistema pueda atraer a usuarios principiantes y experimentados. Es importante que el sistema permita personalizar acciones frecuentes para así acelerar el uso de éste'


        ]);
        factory(App\Models\patterns\RulesNielsen::class)->create([

            'id' => '8',
            'name' => 'Diálogos estéticos y diseño minimalista',
            'description' => 'La interfaz no debe contener información que no sea relevante o se utilice raramente, pues cada unidad adicional de información en un diálogo compite con las unidades relevantes de la información y disminuye su visibilidad relativa'


        ]);
        factory(App\Models\patterns\RulesNielsen::class)->create([

            'id' => '9',
            'name' => 'Ayudar a los usuarios a reconocer, diagnosticar y recuperarse de los errores',
            'description' => 'Los mensajes de error deben expresarse en un lenguaje claro, indicar exactamente el problema y ser constructivos'


        ]);
        factory(App\Models\patterns\RulesNielsen::class)->create([

            'id' => '10',
            'name' => 'Ayuda y documentación',
            'description' => 'A pesar de que es mejor un sistema que no necesite documentación, puede ser necesario disponer de ésta. Si así es, la documentación tiene que ser fácil de encontrar, estar centrada en las tareas del usuario, tener información de las etapas a realizar y no ser muy extensa'


        ]);
    }
}
