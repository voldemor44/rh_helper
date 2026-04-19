<?php

namespace Database\Seeders;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Permission;
use App\Models\TypePermission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Nette\Utils\Random;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Récupérer les IDs des utilisateurs existants
        # $userIds = User::pluck('id')->all();
        $user1 = User::skip(3)->take(1)->first();
        $user2 = User::skip(4)->take(1)->first();
        $user3 = User::skip(5)->take(1)->first();
        // Récupérer les IDs des types de permission existants
        $typePermissionIds = TypePermission::pluck('id')->all();

        // Générer des données de test pour les permissions
        for ($i = 1; $i <= 10; $i++) {
            if ($i <= 3) {
                Permission::create([
                    'contenu' => 'Contenu de la permission ' . $i,
                    'user_id' => $user1->id,
                    'type_permission_id' => $typePermissionIds[array_rand($typePermissionIds)],
                    'objet' => 'Objet ' . $i,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } elseif ($i <= 8 && $i >= 4) {
                Permission::create([
                    'contenu' => 'Contenu de la permission ' . $i,
                    'user_id' => $user2->id,
                    'type_permission_id' => $typePermissionIds[array_rand($typePermissionIds)],
                    'objet' => 'Objet ' . $i,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } else {
                Permission::create([
                    'contenu' => 'Contenu de la permission ' . $i,
                    'user_id' => $user3->id,
                    'type_permission_id' => $typePermissionIds[array_rand($typePermissionIds)],
                    'objet' => 'Objet ' . $i,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
