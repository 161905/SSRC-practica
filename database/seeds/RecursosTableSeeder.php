<?php

use Illuminate\Database\Seeder;

class RecursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('recursos')->insert([
        	[ //1
        		"nombre" => "ARAMIS",
        		"idAprobador" => 3,
        		"idEjecutor" => 1,
        		"pais" => "CL",
        		"nota" => "Test seeder recursos",
        		"tipo_r" => "INVALIDO",
                "idClasifica" => 1,
        		"grupo_nt" => NULL,
        		"mail_gsd" => 0,
        		"cod_gsd" => NULL
        	],
        	[ //2
        		"nombre" => "VTP",
        		"idAprobador" => 2,
        		"idEjecutor" => 5,
        		"pais" => "CL",
        		"nota" => "Areas compartidas Vicepresidencia Tecnica y Proyectos",
        		"tipo_r" => "ELLIPSE",
                "idClasifica" => 2,
        		"grupo_nt" => NULL,
        		"mail_gsd" => 1,
        		"cod_gsd" => "C1"
        	],
        	[ //3
        		"nombre" => "Presentaciones DMVE",
        		"idAprobador" => NULL,
        		"idEjecutor" => 5,
        		"pais" => "CL",
        		"nota" => "Areas compartidas Presentaciones DMVE",
        		"tipo_r" => "ELLIPSE",
                "idClasifica" => 2,
        		"grupo_nt" => "Algun grupo NT",
        		"mail_gsd" => 1,
        		"cod_gsd" => "C1"
        	],
        	[ //4
        		"nombre" => "SOHI",
        		"idAprobador" => NULL,
        		"idEjecutor" => 5,
        		"pais" => "CL",
        		"nota" => "Areas compartida Salud Ocupacional",
        		"tipo_r" => "ELLIPSE",
                "idClasifica" => 2,
        		"grupo_nt" => NULL,
        		"mail_gsd" => 1,
        		"cod_gsd" => "C1"
        	],
        	[ //5
        		"nombre" => "BART 4.0",
        		"idAprobador" => 1,
        		"idEjecutor" => 5,
        		"pais" => "CL",
        		"nota" => "Sistema BART 4.0",
        		"tipo_r" => "ELLIPSE",
                "idClasifica" => 3,
        		"grupo_nt" => "Algun grupo NT 2",
        		"mail_gsd" => 0,
        		"cod_gsd" => NULL
        	],
        	[ //6	
        		"nombre" => "LBXP_SGO",
        		"idAprobador" => 5,
        		"idEjecutor" => 5,
        		"pais" => "CL",
        		"nota" => "Area Compartida Proyecto Desarrollo Los Bronces(PDLB)",
                "idClasifica" => 2,
        		"tipo_r" => "ELLIPSE",
        		"grupo_nt" => NULL,
        		"mail_gsd" => 1,
        		"cod_gsd" => "C1"
        	]
        ]);
    }
}
