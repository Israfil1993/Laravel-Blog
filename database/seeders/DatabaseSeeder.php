<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Disable foreign key constraints for users and enable it again.
        Schema::disableForeignKeyConstraints();
        \App\Models\User::truncate();
        \App\Models\Role::truncate();
        \App\Models\Category::truncate();
        \App\Models\Post::truncate();
        \App\Models\Comment::truncate();
        \App\Models\Tag::truncate();
        \App\Models\Image::truncate();



        Schema::enableForeignKeyConstraints();


        //Create roles and users
        \App\Models\Role::factory(1)->create();
        $users = \App\Models\User::factory(10)->create();

        foreach ($users as $user)
        {
            $user->image()->save(\App\Models\Image::factory()->make());
        }
        \App\Models\Category::factory(10)->create();
        $posts = \App\Models\Post::factory(10)->create();
        \App\Models\Comment::factory(100)->create();
        \App\Models\Tag::factory(10)->create();
        foreach ($posts as $post)
        {
            $tags_ids = [];
            $tags_ids[] = Tag::all()->random()->id;
            $tags_ids[] = Tag::all()->random()->id;
            $tags_ids[] = Tag::all()->random()->id;

            $post->tags()->sync($tags_ids);
            $post->image()->save(Image::factory()->make());


        }
        \App\Models\Image::factory(10)->create();





    }
}
