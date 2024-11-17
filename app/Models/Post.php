<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
            [
                'id'     => 1,
                'slug'   => 'Tentang OLIVIA Laundry 1',
                'title'  => 'Tentang OLIVIA Laundry 1',
                'author' => 'Nasa Ngainur Rohmah',
                'body'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Ea, error cum rem tenetur minima impedit temporibus dolore 
                aperiam quod distinctio vel expedita provident, aspernatur 
                inventore molestias accusamus suscipit velit sapiente?'
            ],
            [
                'id'     => 2,
                'slug'   => 'Tentang OLIVIA Laundry 1',
                'title'  => 'Tentang OLIVIA Laundry 2',
                'author' => 'Nasa Ngainur Rohmah',
                'body'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Ea, error cum rem tenetur minima impedit temporibus dolore 
                aperiam quod distinctio vel expedita provident, aspernatur 
                inventore molestias accusamus suscipit velit sapiente?'
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