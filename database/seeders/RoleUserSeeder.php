<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user_id = User::first()->id;
        $user2 = User::skip(1)->take(1)->first();
        $user3 = User::skip(2)->take(1)->first();

        DB::table('role_user')->insert([
            [
                'user_id' => $user_id, // ID de l'utilisateur
                'role_id' => 1, // ID du rôle
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user2->id, // ID de l'utilisateur
                'role_id' => 2, // ID du rôle
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user3->id, // ID de l'utilisateur
                'role_id' => 3, // ID du rôle
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user3->id, // ID de l'utilisateur
                'role_id' => 4, // ID du rôle
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);

        for ($i = 4; $i <= 10; $i++) {

            $user = User::skip(($i - 1))->take(1)->first();


            DB::table('role_user')->insert([
                [
                    'user_id' => $user->id, // ID de l'utilisateur
                    'role_id' => 3, // ID du rôle
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
