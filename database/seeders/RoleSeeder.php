<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name'=>'super_admin','description'=>'Quan tri he thong'],
            ['name'=>'customer','description'=>'Khach hang'],
            ['name'=>'developer','description'=>'Phat trien he thong'],
        ]);
    }
}
