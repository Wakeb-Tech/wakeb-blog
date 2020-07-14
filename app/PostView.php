<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class PostView extends Model
{
    protected $guarded =[];

     public function post()
    {
    	return $this->belongsTo(Post::class);
    }

     public static function createViewLog($post) {
            $postView= PostView::where('post_id', $post->id)->first();
            if(!$postView) {
                $postView = new PostView ();
              	$postView->post_id = $post->id;
                $postView->count = 1 ;
            	$postView->save();
            } else {
            	$postView->count += 1 ;
            	$postView->update();
            }
           
    }
}
