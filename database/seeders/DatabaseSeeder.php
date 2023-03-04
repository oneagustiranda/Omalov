<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\FriendRequest;
use Illuminate\Support\Str;
use App\Models\MaritalStatus;
use App\Models\UserIdentity;
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
            // 'id' => (string) Str::uuid(),
            'id' => 'a854c115-2928-4434-b72d-0696255fc296',
            'name' => 'Agust',
            'username' => 'oneagustiranda',
            'email' => 'agust@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => true,
        ]);

        User::create([
            // 'id' => (string) Str::uuid(),
            'id' => 'd1e1545b-852d-494c-a9ad-6e3ba0ea26e3',
            'name' => 'Lia',
            'username' => 'lia',
            'email' => 'lia@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => true,
        ]);

        User::factory(100)->create();

        UserIdentity::create([
            'id' => (string) Str::uuid(),
            'user_id' => 'a854c115-2928-4434-b72d-0696255fc296',
            'gender' => 'Laki-laki',
            'marital_status_id' => 1,
            'year_birth' => '1993',
            'province' => 'Kepulauan Riau',
            'city' => 'Batam'
        ]);

        UserIdentity::create([
            'id' => (string) Str::uuid(),
            'user_id' => 'd1e1545b-852d-494c-a9ad-6e3ba0ea26e3',
            'gender' => 'Perempuan',
            'marital_status_id' => 1,
            'year_birth' => '1999',
            'province' => 'Kepulauan Riau',
            'city' => 'Batam'
        ]);

        FriendRequest::create([
            'id' => (string) Str::uuid(),
            'user_id' => 'd1e1545b-852d-494c-a9ad-6e3ba0ea26e3',
            'friend_id' => 'a854c115-2928-4434-b72d-0696255fc296',
            'accepted' => true,
        ]);

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
