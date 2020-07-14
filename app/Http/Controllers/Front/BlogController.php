<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\PostView;

class BlogController extends Controller
{
    public function index () {
    	$categories = Category::all();
    	$posts = Post::with(['user', 'category', 'tags'])->published()->paginate(9);

        $most_views = Post::getMostView();

    	return view('front.index' , compact('posts', 'most_views','categories'));


    }

    public function getpost( Post $post ) {
        PostView::createViewLog($post);
    	return view('front.post', compact('post'));
    }



     public function categortFilter(Request $request) {
         $posts = Post::frontSearch();

         $categories = Category::all();

        return view('front.category', compact('posts','categories'));
    }

    public function categortPosts($id) {
         $posts = Post::where('category_id',$id)->with(['user', 'category', 'tags'])->paginate(9);
         $categories = Category::all();

        return view('front.cat_posts', compact('posts','categories'));
    }


     public function tagFilter($id) {

         $posts = Post::whereHas('tags', function($q) use($id) {
            return $q->where('tag_id', $id);
                })->with(['user', 'category', 'tags'])->paginate(9);

         $categories = Category::all();

        return view('front.category', compact('posts','categories'));
    }


}
