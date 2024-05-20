<?php

namespace Database\Seeders;

use App\Helpers\Helpers;
use App\Types\Constants\dataUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'uuid' => Helpers::buildUUID(),
                    'birthday' => '1990-03-16',
                    'gender' => \dataUser::USER['GENDER']['MALE'],
                    'phone' => '0977491325',
                    'address' => 'Ha Noi',
                    'last_name' => 'a',
                    'first_name' => 'b',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('admin9a12'),
                    'user_type' => \dataUser::USER['USER_TYPE']['ADMIN'],
                    'status' => \dataUser::USER['STATUS']['ACTIVE'],
                    'email_verified_at' => date("Y/m/d H:i:s"),
                    'created_at' => date("Y/m/d H:i:s"),
                    'updated_at' => date("Y/m/d H:i:s"),
                ],
            ]
        );
    }
}
