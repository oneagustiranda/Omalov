<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "judul post satu",
            "slug" => "judul-post-satu",
            "author" => "agust",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Porro accusantium quam atque illum eius aliquam itaque rem repellat 
             aut molestias iure iste, sapiente nam quos, adipisci odio illo magnam 
             molestiae aspernatur labore. Facere libero tempore facilis earum quas 
             tenetur voluptates tempora fuga? Facere excepturi eaque animi nostrum ipsa quae, 
             iure consectetur voluptatem eum reprehenderit aliquid quia, asperiores, tempore 
             culpa adipisci odio. Praesentium consequatur eligendi ab, aliquam voluptatibus 
             nostrum voluptas esse excepturi sunt. Mollitia tempore dolor nisi voluptatem 
             distinctio dolorum officiis."
        ],
        [
            "title" => "judul post kedua",
            "slug" => "judul-post-dua",
            "author" => "randa",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Porro accusantium quam atque illum eius aliquam itaque rem repellat 
             aut molestias iure iste, sapiente nam quos, adipisci odio illo magnam 
             molestiae aspernatur labore. Facere libero tempore facilis earum quas 
             tenetur voluptates tempora fuga? Facere excepturi eaque animi nostrum ipsa quae, 
             iure consectetur voluptatem eum reprehenderit aliquid quia, asperiores, tempore 
             culpa adipisci odio. Praesentium consequatur eligendi ab, aliquam voluptatibus 
             nostrum voluptas esse excepturi sunt. Mollitia tempore dolor nisi voluptatem 
             distinctio dolorum officiis."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
