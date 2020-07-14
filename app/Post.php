<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Tag;
use App\Category;
use App\Post_file;
use App\PostView;
class Post extends Model
{

    public function selectLang ($lang , $name) {
        $column_ar = $name.'_ar';
        $column_en = $name.'_en';
        if ($lang == 'ar') {
            return ($this->$column_ar) ? $this->$column_ar : $this->$column_en;
        }else {
             return ($this->$column_en) ? $this->$column_en : $this->$column_ar;
        }
    }
	protected $guarded =[];

    public function getRouteKeyName()
    {
        return 'slug'; 
    }

    public function views()
    {
        return $this->hasMany(PostView::class);
    }
    
    //scopes --------------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('title_ar', 'like', "%$search%")->orWhere('title_en', 'like', "%$search%");
        });

    }// end of scopeWhenSearch

     public static function getMostView()
    {
        return  Post::join('post_views', 'posts.id', '=', 'post_views.post_id')->orderBy('post_views.count', 'DESC')->with(['user', 'category', 'tags'])->published()->limit(5)->get();


    }// end of getMostView

  public static function frontSearch()
    {
      
       return Post::when(request()->category, function ($query) {
           $query->whereIn('category_id',request()->category);
       })->when(request()->search_text, function ($query) {
           $query->where('title_ar', 'like', '%' . request()->search_text . '%')
                  ->orWhere('title_en','like', '%' . request()->search_text . '%')
                  ->orWhere('body_ar','like', '%' . request()->search_text . '%')
                  ->orWhere('body_en','like', '%' . request()->search_text . '%');
       })->with(['user', 'category', 'tags'])->orderBy('id', 'desc')->paginate(9);

    }// end of frontSearch

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

	// public function files()
 //    {
 //        return $this->hasMany(Post_file::class);
 //    }

    public function getCoverPathAttribute()
    {
        return asset('uploads/posts/' . $this->cover);

    }//end of get cover path

    public function getImagePathAttribute()
    {
        return asset('uploads/posts/' . $this->image);

    }//end of get image path


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeDrafted($query)
    {
        return $query->where('is_published', false);
    }

  
}
