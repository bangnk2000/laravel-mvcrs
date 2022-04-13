<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name'=>'product_list','description'=>'Product List','group_name'=>'product'],
            ['name'=>'product_show','description'=>'Product Show','group_name'=>'product'],
            ['name'=>'product_create','description'=>'Product Create','group_name'=>'product'],
            ['name'=>'product_store','description'=>'Product Store','group_name'=>'product'],
            ['name'=>'product_edit','description'=>'Product Edit','group_name'=>'product'],
            ['name'=>'product_update','description'=>'Product Update','group_name'=>'product'],
            ['name'=>'product_delete','description'=>'Product Delete','group_name'=>'product'],

            ['name'=>'category_list','description'=>'Category List','group_name'=>'category'],
            ['name'=>'category_show','description'=>'Category Show','group_name'=>'category'],
            ['name'=>'category_create','description'=>'Category Create','group_name'=>'category'],
            ['name'=>'category_store','description'=>'Category Store','group_name'=>'category'],
            ['name'=>'category_edit','description'=>'Category Edit','group_name'=>'category'],
            ['name'=>'category_update','description'=>'Category Update','group_name'=>'category'],
            ['name'=>'category_delete','description'=>'Category Delete','group_name'=>'category'],

            ['name'=>'user_list','description'=>'User List','group_name'=>'user'],
            ['name'=>'user_show','description'=>'User Show','group_name'=>'user'],
            ['name'=>'user_create','description'=>'User Create','group_name'=>'user'],
            ['name'=>'user_store','description'=>'User Store','group_name'=>'user'],
            ['name'=>'user_edit','description'=>'User Edit','group_name'=>'user'],
            ['name'=>'user_update','description'=>'User Update','group_name'=>'user'],
            ['name'=>'user_delete','description'=>'User Delete','group_name'=>'user'],

            ['name'=>'role_list','description'=>'Role List','group_name'=>'role'],
            ['name'=>'role_show','description'=>'Role Show','group_name'=>'role'],
            ['name'=>'role_create','description'=>'Role Create','group_name'=>'role'],
            ['name'=>'role_store','description'=>'Role Store','group_name'=>'role'],
            ['name'=>'role_edit','description'=>'Role Edit','group_name'=>'role'],
            ['name'=>'role_update','description'=>'Role Update','group_name'=>'role'],
            ['name'=>'role_delete','description'=>'Role Delete','group_name'=>'role'],
        ]);
    }
}
