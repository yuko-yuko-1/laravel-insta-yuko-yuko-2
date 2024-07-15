<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function __construct(User $user){
    //     $this->user = $user;
    // }

    public function run(): void
    {      
        $users = [
            [
                'name' => 'YA',
                'email' => 'ya@mail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'updated_at' => NOW(),
                'created_at' => NOW()
            ],
            [
                'name' => 'YU',
                'email' => 'yu@mail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'updated_at' => NOW(),
                'created_at' => NOW()
            ],
            [
                'name' => 'YO',
                'email' => 'yo@mail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'updated_at' => NOW(),
                'created_at' => NOW()
            ],       
        ];
        foreach ($users as $user) {
            // 重複をチェックしてから挿入
            if (!DB::table('users')->where('email', $user['email'])->exists()) {
                DB::table('users')->insert($user);
            }
        }
        // $this->user->insert($users);
    }
}
