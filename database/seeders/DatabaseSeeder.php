<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

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

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(15)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto earum ex debitis exercitationem cupiditate alias excepturi voluptas.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto earum ex debitis exercitationem cupiditate alias excepturi voluptas. Ipsum cumque voluptates veniam consequatur voluptatem voluptas aspernatur, alias officiis nemo! Exercitationem officia quasi culpa in ex magnam officiis quo saepe assumenda atque, aliquam dolores illo quisquam, ullam libero. Voluptatibus sint hic neque vel? Odio maxime est aliquid ut eligendi totam facilis impedit, modi assumenda sunt in cupiditate nesciunt deleniti nulla dicta, accusamus voluptas nobis libero fuga eum facere laudantium sint sit. Natus tempore officia cupiditate sit consequatur?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto earum ex debitis exercitationem cupiditate alias excepturi voluptas.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto earum ex debitis exercitationem cupiditate alias excepturi voluptas. Ipsum cumque voluptates veniam consequatur voluptatem voluptas aspernatur, alias officiis nemo! Exercitationem officia quasi culpa in ex magnam officiis quo saepe assumenda atque, aliquam dolores illo quisquam, ullam libero. Voluptatibus sint hic neque vel? Odio maxime est aliquid ut eligendi totam facilis impedit, modi assumenda sunt in cupiditate nesciunt deleniti nulla dicta, accusamus voluptas nobis libero fuga eum facere laudantium sint sit. Natus tempore officia cupiditate sit consequatur?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto earum ex debitis exercitationem cupiditate alias excepturi voluptas.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto earum ex debitis exercitationem cupiditate alias excepturi voluptas. Ipsum cumque voluptates veniam consequatur voluptatem voluptas aspernatur, alias officiis nemo! Exercitationem officia quasi culpa in ex magnam officiis quo saepe assumenda atque, aliquam dolores illo quisquam, ullam libero. Voluptatibus sint hic neque vel? Odio maxime est aliquid ut eligendi totam facilis impedit, modi assumenda sunt in cupiditate nesciunt deleniti nulla dicta, accusamus voluptas nobis libero fuga eum facere laudantium sint sit. Natus tempore officia cupiditate sit consequatur?',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

    }
}
