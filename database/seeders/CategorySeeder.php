<?php

namespace Database\Seeders;

use App\Helpers\Helpers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
                [
                    'uuid' => Helpers::buildUUID(),
                    'user_id' => 1,
                    'rank' => 0,
                    'title' => 'Genre',
                    'type' => \dataCategory::TYPE[2],
                    'status' => \dataCategory::ACTIVE,
                    'created_at' => date("Y/m/d H:i:s"),
                    'updated_at' => date("Y/m/d H:i:s"),
                ]
            ]
        );
    }
}
