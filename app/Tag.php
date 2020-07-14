<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    //attributes----------------------------------
    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }// end of getNameAttribute
 //scopes --------------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });

    }// end of scopeWhenSearch

}
