<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = ['user_id', 'heading', 'content', 'ip'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function rating(){
        /*$this->belongsToMany(
          Rating::class,
          'ratings',
          'post_id',
          'id'
        );*/
        $this->hasMany(Rating::class);
    }

    public static function getRating($post_id){
        return Rating::getRating($post_id);
    }

    public static function getTop($page, $size){

        /*
       if (empty($_GET['size']) or $_GET['size']>100 or $_GET['size']<1){
           $size = 10;
       }else{
           $size = $_GET['size'];
       }

       if ($_GET['size'] == '5' or $_GET['size'] == '25' or $_GET['size'] == '50' or $_GET['size'] == '100'){
           $size = $_GET['size'];
       }else{
           $size = 10;
       }
       */

        dd(DB::table('posts')
            ->join('ratings', function ($join) {
                $join->on('posts.id', '=', 'ratings.post_id');
                //->where('ratings.value', '>', 0);
            })
            //->join('ratings', 'posts.id', '=', 'ratings.post_id')
            ->get());

        return Post::all()->forPage(1,$size);
//            ->sortBy('id',null,true);

    }
}
