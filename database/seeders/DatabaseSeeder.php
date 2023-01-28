<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\MaritalStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'id' => (string) Str::uuid(),
            'name' => 'Agust',
            'username' => 'oneagustiranda',
            'email' => 'agust@gmail.com',
            'password' => bcrypt('password')
        ]);

        // User::create([
        //     'name' => 'Omalov',
        //     'email' => 'omalov@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        User::factory(3)->create();

        MaritalStatus::create([
            'name' => 'Belum kawin'
        ]);

        MaritalStatus::create([
            'name' => 'Kawin'
        ]);

        MaritalStatus::create([
            'name' => 'Cerai hidup'
        ]);

        MaritalStatus::create([
            'name' => 'Cerai mati'
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(15)->create();


    }
}
