<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('users')->insert([
            'nameUser'=>'Administrador',
            'lastnameUser1'=>'Administrador',
            'lastnameUser2'=>'Administrador',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('1234'),
            'created_at'=>date('Y-m-d h:m:s')
            
        ]);
        DB::table('users')->insert([
            'nameUser'=>'Comprador 1',
            'lastnameUser1'=>'Compra',
            'lastnameUser2'=>'Compra',
            'email'=>'comprador1@gmail.com',
            'password'=>Hash::make('1234'),
            'created_at'=>date('Y-m-d h:m:s')
        ]);
    }
}
