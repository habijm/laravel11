<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Judul 1',
                'slug' => 'judul-1',
                'author' => 'Habi Jiyan Mustaqim',
                'body' => '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa deleniti provident nisi, repellendus
                aspernatur veritatis distinctio natus corporis velit excepturi reiciendis, ipsum fugiat doloremque animi
                dicta sed deserunt fuga nostrum vitae! Laboriosam mollitia, necessitatibus laudantium vel provident deserunt
                voluptas veritatis unde qui ratione tempore corporis quidem illo rem at molestiae vitae, ullam sapiente.
                Dolores sint quasi, ipsam sequi nemo porro dignissimos? Cum doloribus odio sint adipisci possimus enim
                consequatur dignissimos, vitae aspernatur id quasi commodi illum aut tempore esse nobis omnis voluptatem
                deleniti impedit aliquid quibusdam, at ut ipsa! Natus, quia? Eum cum, suscipit accusamus qui reprehenderit
                itaque architecto reiciendis?'
            ],
            [
                'id' => 2,
                'title' => 'Judul 2',
                'slug' => 'judul-2',
                'author' => 'Habi Jiyan Mustaqim',
                'body' => '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa deleniti provident nisi, repellendus
                aspernatur veritatis distinctio natus corporis velit excepturi reiciendis, ipsum fugiat doloremque animi
                dicta sed deserunt fuga nostrum vitae! Laboriosam mollitia, necessitatibus laudantium vel provident deserunt
                voluptas veritatis unde qui ratione tempore corporis quidem illo rem at molestiae vitae, ullam sapiente.
                Dolores sint quasi, ipsam sequi nemo porro dignissimos? Cum doloribus odio sint adipisci possimus enim
                consequatur dignissimos'
            ]

        ];
    }
    public static function find($slug): array
    {
        // return Arr::first(static::all(), function ($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });

        $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

        if (!$post) {
            abort(404);
        }
        return $post;
    }
}