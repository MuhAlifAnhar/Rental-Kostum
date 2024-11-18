<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('roles')->insert([
            'nama_role' => 'admin'
        ]);

        DB::table('roles')->insert([
            'nama_role' => 'superadmin'
        ]);

        DB::table('users')->insert([
            'nama' => 'lisa',
            'email' => 'lisa@gmail.com',
            'password' => bcrypt('lisa12345'),
            'role_id' => 2
        ]);

        DB::table('users')->insert([
            'nama' => 'toko',
            'email' => 'toko@gmail.com',
            'password' => bcrypt('toko12345'),
            'role_id' => 1
        ]);

        DB::table('toko')->insert([
            'nama_toko' => 'Turu Rent',
            'id_admin' => 2
        ]);

        DB::table('keterangan')->insert([
            'nama_keterangan' => 'Di sewa'
        ]);

        DB::table('keterangan')->insert([
            'nama_keterangan' => 'Di booking'
        ]);

        DB::table('keterangan')->insert([
            'nama_keterangan' => 'Ready'
        ]);
    }
}
