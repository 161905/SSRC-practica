<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
                "name" => "Nombre Apellido Test",
                "userid" => "USERTEST",
                "email" => "tikajo1@hotmail.com",
                "password" => bcrypt('123456'),
                "rut" => "777777777",
                "perfil" => "SUPERVISOR",
                "tipo" => "EMPLEADO",
                "division" => "CLSCL",
                "anexo" => "TEST ANEXO"
            ],
            [
        		"name" => "Maiyuang",
                "userid" => "MAHOFAN",
        		"email" => "maiyuang@anglo.com",
        		"password" => bcrypt('123456'),
        		"rut" => "12345678K",
        		"perfil" => "DUEÑO",
        		"tipo" => "EMPLEADO",
        		"division" => "CLSCL",
                "anexo" => "ANEXO DE PRUEBA 1"
        	],
        	[
        		"name" => "Carlos Schipmann",
                "userid" => "CASCHIPMAN",
        		"email" => "carlos@anglo.com",
        		"password" => bcrypt('123456'),
        		"rut" => "15555678K",
        		"perfil" => "SUPERVISOR",
        		"tipo" => "EMPLEADO",
        		"division" => "CLSOL",
                "anexo" => "ANEXO DE PRUEBA 2"
        	],
        	[
        		"name" => "Sandra Westberg",
                "userid" => "SWESTBERG",
        		"email" => "sandra@anglo.com",
        		"password" => bcrypt('123456'),
        		"rut" => "999999998",
        		"perfil" => "CONSULTA",
        		"tipo" => "HONORARIO",
        		"division" => "CLLTO",
                "anexo" => NULL
        	],
        	[
        		"name" => "Jose Anibal Poblete",
                "userid" => "JAPOBLE",
        		"email" => "japoblete@anglo.com",
        		"password" => bcrypt('123456'),
        		"rut" => "12115599K",
        		"perfil" => "EJECUTOR",
        		"tipo" => "CONTRATISTA",
        		"division" => "CLLTO",
                "anexo" => "Anexo de prueba 3"
        	],
            [
                "name" => "Eduardo Ho",
                "userid" => "EDUHO",
                "email" => "eduho@anglo.com",
                "password" => bcrypt('123456'),
                "rut" => "17115599K",
                "perfil" => "SUPERVISOR",
                "tipo" => "EMPLEADO",
                "division" => "CLSOL",
                "anexo" => "Anexo de prueba 4"
            ],
            [
                "name" => "Patricio Prado",
                "userid" => "PAPRADO",
                "email" => "papradro@anglo.com",
                "password" => bcrypt('123456'),
                "rut" => "19115599K",
                "perfil" => "EJECUTOR",
                "tipo" => "EMPLEADO",
                "division" => "CLSLC",
                "anexo" => "Anexo de Patricio Prado"
            ],
            [
                "name" => "Carlos Carmona",
                "userid" => "CARCARM",
                "email" => "carlos.carmona@anglo.com",
                "password" => bcrypt('123456'),
                "rut" => "11775599K",
                "perfil" => "DUEÑO",
                "tipo" => "CONTRATISTA",
                "division" => "CLLTO",
                "anexo" => "Anexo de Carlos Carmona"
            ],
            [
                "name" => "Cristobal Carmona",
                "userid" => "CRCARMON",
                "email" => "cristobal.carmona@anglo.com",
                "password" => bcrypt('123456'),
                "rut" => "187667674",
                "perfil" => "CONSULTA",
                "tipo" => "ESTUDIANTE",
                "division" => "CLSLC",
                "anexo" => "Anexo de prueba Cristobal Carmona"
            ],
            [
                "name" => "Guacolda Rodriguez",
                "userid" => "GRODRIGUEZr",
                "email" => "grodriguez@anglo.com",
                "password" => bcrypt('123456'),
                "rut" => "76265749",
                "perfil" => "CONSULTA",
                "tipo" => "CONTRATISTA",
                "division" => "CLSLC",
                "anexo" => "Anexo de Guacolda Rodriguez"
            ]


        ]);
    }
}
