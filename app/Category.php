<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_ar','name_en'];

    //attributes----------------------------------
    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }// end of getNameAttribute

    // posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //scopes --------------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name_en', 'like', "%$search%")
            ->orWhere('name_ar', 'like', "%$search%");
        });

    }// end of scopeWhenSearch


    

}//end of model

