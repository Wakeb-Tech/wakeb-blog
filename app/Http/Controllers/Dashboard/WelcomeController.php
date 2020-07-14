<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use App\Category;

class WelcomeController extends Controller
{
    public function index() {

    	$posts      = Post::count();
        $tags       = Tag::count();
        $categories = Category::count();

        return view('dashboard.welcome', get_defined_vars());

    }
}
