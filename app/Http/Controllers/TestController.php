<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;

class TestController extends Controller
{
    public function orm()
    {

        $posts = Post::all();

        foreach ($posts as $post) {
            echo $post->title;
            echo '<br>';
            echo $post->content;
            echo '<br>';
            echo $post->user->name;
            echo '<br>';
            echo $post->category->name;
            echo '<br><hr>';
            
        }

        die();
    }
}
