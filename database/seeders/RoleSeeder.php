<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ROLES
        $role1 = Role::create(['name' => 'SuperAdmin']);
        $role2 = Role::create(['name' => 'Docente']);
        $role3 = Role::create(['name' => 'Estudiante']);
        $role4 = Role::create(['name' => 'Admin']);


        // PERMISOS
        Permission::create(['name' => 'admin.home',
                            'description' => 'Ver Dashboard'])->syncRoles([$role1, $role2, $role4]);

        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Ver Usuarios para Roles'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Asignar un Rol'])->syncRoles([$role1, $role4]);
        // Permission::create(['name' => 'admin.users.update',
        //                     'description' => ''])->syncRoles([$role1, $role4]);


        Permission::create(['name' => 'admin.personas.index',
                            'description' => 'Ver listado de personas'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.personas.edit',
                            'description' => 'Editar datos de Personas'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.personas.create',
                            'description' => 'Crear nuevas Personas'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.personas.destroy',
                            'description' => 'Eliminar Personas'])->syncRoles([$role1, $role4]);

        Permission::create(['name' => 'admin.curso_idiomas.index',
                            'description' => 'Ver lista de Curso Idiomas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.curso_idiomas.edit',
                            'description' => 'Editar Curso Idiomas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.curso_idiomas.create',
                            'description' => 'Crear Curso Idiomas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.curso_idiomas.destroy',
                            'description' => 'Eliminar Curso Idiomas'])->syncRoles([$role1, $role2]);
//desde aqui
        Permission::create(['name' => 'admin.curso_extras.index',
                            'description' => 'Ver lista de Cursos Extras'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.curso_extras.edit',
                            'description' => 'Editar Cursos Extras'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.curso_extras.create',
                            'description' => 'Crear Cursos Extras'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.curso_extras.destroy',
                            'description' => 'Eliminar Cursos Extras'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.formacions.index',
                            'description' => 'Ver listado de Formaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.formacions.edit',
                            'description' => 'Editar Formaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.formacions.create',
                            'description' => 'Crear  Formaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.formacions.destroy',
                            'description' => 'Eliminar Formaciones'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.experiencias.index',
                            'description' => 'Ver listado de Experiencias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.experiencias.edit',
                            'description' => 'Editar Experiencias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.experiencias.create',
                            'description' => 'Crear Experiencias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.experiencias.destroy',
                            'description' => 'Eliminar Experiencias'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.docentes.index',
                            'description' => 'Ver lista de Docentes'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.docentes.edit',
                            'description' => 'Editar Docentes'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.docentes.create',
                            'description' => 'Crear Docentes'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.docentes.destroy',
                            'description' => 'Eliminar Docentes'])->syncRoles([$role1, $role4]);

        Permission::create(['name' => 'admin.facultads.index',
                            'description' => 'Ver lista de Facultades'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.facultads.edit',
                            'description' => 'Editar Facultades'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.facultads.create',
                            'description' => 'Crear Facultades'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.facultads.destroy',
                            'description' => 'Eliminar Facultades'])->syncRoles([$role1, $role4]);

        Permission::create(['name' => 'admin.carreras.index',
                            'description' => 'Ver lista de Carreras'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.carreras.edit',
                            'description' => 'Editar Carreras'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.carreras.create',
                            'description' => 'Crear Carreras'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.carreras.destroy',
                            'description' => 'Eliminar Carreras'])->syncRoles([$role1, $role4]);

        Permission::create(['name' => 'admin.materias.index',
                            'description' => 'Ver listado de Materias'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.materias.edit',
                            'description' => 'Editar Materias'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.materias.create',
                            'description' => 'Crear Materias'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.materias.destroy',
                            'description' => 'Eliminar Materias'])->syncRoles([$role1, $role4]);
//ver por si acaso
        Permission::create(['name' => 'admin.docente_materia.index',
                            'description' => 'Ver listado de Materias Dictadas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.docente_materia.edit',
                            'description' => 'Editar Materias Dictadas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.docente_materia.create',
                            'description' => 'Crear Materias Dictadas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.docente_materia.destroy',
                            'description' => 'Eliminar Materias Dictadas'])->syncRoles([$role1, $role2]);
        // eventos
        Permission::create(['name' => 'admin.eventos.index',
                            'description' => 'Ver listado de Eventos'])->syncRoles([$role1, $role2]);

    }
}
