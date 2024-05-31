<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $fs = new Filesystem;
        
        // Delete files
        $except_file_names = [
            'place\tugu digulis.jpg', // Add file names to exclude (menu\<file_name)
        ];
        
        $file_paths = $fs->files(public_path('upload/place'));
        foreach ($file_paths as $file_path) {
            $file_name = last(explode('/', $file_path));
            if (!in_array($file_name, $except_file_names)) {
                $fs->delete($file_path);
            }
        }

        echo "Upload/place/* successfully deleted!\n";
        // \App\Models\User::factory(10)->create();
        \App\Models\Place::create([
            'name' => 'Rumah Radakng, Pontianak Kalimantan Barat',
            'latitude' => '-0.046648779135022106', 
            'longitude' => '109.3201113678288',
            'address' => 'X83C+62M, Sungai Bangkong, Kec. Pontianak Kota, Kota Pontianak, Kalimantan Barat 78113',
            'description' => 'Replika balai suku Dayak tradisional, yang dipasang pada pilar yang dicat dan digunakan untuk konser & acara.',
            'image' => 'rumah radakng.jpg'

        ]);
        
        \App\Models\User::create([
            'name' => 'Marini',
            'email' => 'superadmin@roles.id',
            'password'=> Hash::make('123456')
        ]);
    }
}
