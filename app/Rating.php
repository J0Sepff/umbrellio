<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['post_id','value'];

    public function post(){
        /*$this->belongsToMany(
            Post::class,
            'ratings',
            'id',
            'post_id'
        );*/
        $this->hasOne(Post::class);
    }

    public static function getRating($post_id){
        $rating = Rating::where('post_id',$post_id)->get();
        $ratingCount = $rating->count();

        if (!($ratingCount > 0)){
            return 0;
        }

        $rate = 0;

        for ($i = 0; $i<$ratingCount; $i++){
            $rate += $rating[$i]->value;
        }

        return $rate/$ratingCount;
    }
}
