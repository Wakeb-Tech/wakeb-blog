<?php

namespace App\Http\Controllers\Dashboard;

use App\Post;
use App\Tag;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
   
    public function index()
    {
         $posts = Post::whenSearch(request()->search)
            ->paginate(5);

        return view('dashboard.posts.index', compact('posts'));
    }

    

    public function create()
    {
        $tags = Tag::orderby('created_at','DESC')->get();
        $categories = Category::orderby('created_at','DESC')->get();
        return view('dashboard.posts.create',compact('categories','tags'));
    }
    public function swapPublishPost($id)
    {
        $post = Post::find($id);
        $post->is_published = !$post->is_published;

        $post->update();
        session()->flash('success', 'Post Updated successfully');
        return redirect()->route('dashboard.posts.index');
        
    }

 
    public function store(PostRequest $request)
    {
        $post = new Post;

        $post->category_id = $request->category_id;

        if($request->has('title_ar')) {
            $post->title_ar = $request->title_ar; 
        }
        if($request->has('title_en')) {
            $post->title_en = $request->title_en; 
        }
        if($request->has('body_ar')) {
            $post->body_ar = $request->body_ar; 
        }
        if($request->has('body_en')) {
            $post->body_en = $request->body_en; 
        }
        if($request->has('desc_en')) {
            $post->desc_en = $request->desc_en; 
        }
        if($request->has('desc_ar')) {
            $post->desc_ar = $request->desc_ar; 
        }
        if($request->has('desc_ar')) {
            $post->desc_ar = $request->desc_ar; 
        }
        if($request->has('meta_keywords')) {
            $post->meta_keywords = str_replace(' ', ',', $request->meta_keywords);
        }
        if($request->has('meta_description')) {
            $post->meta_description = $request->meta_description;
        }

        if($request->has('slug') && isset($request->slug)) {
            $post->slug = Str::slug($request->slug, '_'); 
        }else {
            if($request->has('title_ar')) {
                $post->slug = Str::slug($request->title_ar, '_'); 
            }elseif($request->has('title_en')) {
                $post->slug = Str::slug($request->title_en, '_'); 
            }
        }

        if($request->has('cover')) {
            $basename = Str::random();
            $file = $request->file('cover');
            $original = $basename . "." . $file->getClientOriginalExtension();

            $file->move("uploads/posts", $original);

            $post->cover = $original ;

        }

        if($request->has('image')) {
            $basename = Str::random();
            $file = $request->file('image');
            $original = $basename . "." . $file->getClientOriginalExtension();

            $file->move("uploads/posts", $original);

            $post->image = $original ;

        }

        $post->user_id = auth()->user()->id ;
        $post->is_published  = true ;
        $post->save();

        foreach ($request->tag_name as $tag) {
            $tag_found = Tag::where('name', $tag)->first();
            if (!$tag_found) {
                $newTag = Tag::create([
                    'name' => $tag
                ]);
                $post->tags()->attach($newTag->id);
            } else {
                $post->tags()->attach($tag_found->id);
            }
        }


       session()->flash('success', 'Post added successfully');
        return redirect()->route('dashboard.posts.index');
                        

    }

  
    public function edit(Post $post)
    {
        $tag = $post->tags;
        $categories = Category::all();
        $tags = Tag::get();
        return view('dashboard.posts.edit', compact('categories','post', 'tag','tags'));
    }


    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id);
        $post->category_id = $request->category_id;
         if($request->has('title_ar')) {
            $post->title_ar = $request->title_ar; 
        }
        if($request->has('title_en')) {
            $post->title_en = $request->title_en; 
        }
        if($request->has('body_ar')) {
            $post->body_ar = $request->body_ar; 
        }
        if($request->has('body_en')) {
            $post->body_en = $request->body_en; 
        }
        if($request->has('desc_en')) {
            $post->desc_en = $request->desc_en; 
        }
        if($request->has('desc_ar')) {
            $post->desc_ar = $request->desc_ar; 
        }
        if($request->has('desc_ar')) {
            $post->desc_ar = $request->desc_ar; 
        }
        if($request->has('meta_keywords')) {
            $post->meta_keywords = str_replace(' ', ',', $request->meta_keywords);
        }
        if($request->has('meta_description')) {
            $post->meta_description = $request->meta_description;
        }

        if($request->has('slug') && isset($request->slug)) {
            $post->slug = Str::slug($request->slug, '_'); 
        }else {
            if($request->has('title_ar')) {
                $post->slug = Str::slug($request->title_ar, '_'); 
            }elseif($request->has('title_en')) {
                $post->slug = Str::slug($request->title_en, '_'); 
            }
        }
      

        if($request->hasFile('cover')) {
            \File::delete('uploads/posts/' . $post->image);
            $basename = Str::random();
            $file = $request->file('cover');
            $original = $basename . "." . $file->getClientOriginalExtension();
            $file->move("uploads/posts", $original);
            $post->cover = $original ;

        }

        if($request->hasFile('image')) {
            \File::delete('uploads/posts/' . $post->image);
            $basename = Str::random();
            $file = $request->file('image');
            $original = $basename . "." . $file->getClientOriginalExtension();
            $file->move("uploads/posts", $original);
            $post->image = $original ;

        }


        $post->user_id = auth()->user()->id;
        $post->update();
        $post->tags()->detach(); 
          foreach ($request->tag_name as $tag) {
            $tag_found = Tag::where('name', $tag)->first();
            if (!$tag_found) {
                $newTag = Tag::create([
                    'name' => $tag
                ]);
                $post->tags()->attach($newTag->id);
            } else {
                $post->tags()->attach($tag_found->id);
            }
        }

        session()->flash('success', 'Post Updated successfully');
        return redirect()->route('dashboard.posts.index');

    }

     public function destroy(Post $post)
    {
        \File::delete('uploads/posts/' . $post->image);
        \File::delete('uploads/posts/' . $post->cover);
        $post->delete();
        session()->flash('success', 'Post deleted successfully');
        return redirect()->route('dashboard.posts.index');

    }//end of destroy
}
