<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call(ModePaiementSeeder::class);

        $this->call(TypeEntrepriseSeeder::class);

        $this->call(EntrepriseSeeder::class);

        $this->call(TypeContactsSeeder::class);


        $this->call(DepartementsSeeder::class);

        $this->call(FonctionsSeeder::class);



        $this->call(StatutUtilisateurSeeder::class);

        $this->call(RolesSeeder::class);


        \App\Models\User::factory(10)->create();


       // $this->call(ProjetsSeeder::class);

      //  $this->call(ProjetUtilisateurSeeder::class);

        $this->call(RoleUserSeeder::class);

        $this->call(TypeDossiersSeeder::class);

       # $this->call(ModelesDossiersSeeder::class);

        // $this->call(TachesSeeder::class);


        \App\Models\Contact::factory(10)->create();

        $this->call(TypeEvenementsSeeder::class);

        $this->call(EvenementsSeeder::class);

        $this->call(TypePermissionsSeeder::class);

        $this->call(PermissionsSeeder::class);



        $this->call(StatusDossiersSeeder::class);



        $this->call(ParametresSeeder::class);

        $this->call(ManagerDepartementsSeeder::class);

        $this->call(TarifSeeder::class);

       $this->call(AbonnementsSeeder::class);
    }
}
