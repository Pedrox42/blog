<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['created_at', 'updated_at'];
    use HasFactory;

    public static function adjustLink($link)
    {
        if(substr_count($link, '.') != 0){
            $linkAdjustment = explode('.',$link)[1];
            if($linkAdjustment === 'youtube'){
                $adjustedLink = "https://www.youtube.com/embed/" . explode('=', $link)[1];
            }else if(explode('/', $adjustedLink)[0] === 'be') {
                $adjustedLink = "https://www.youtube.com/embed/" . explode('/', $linkAdjustment)[1];
            }else{
                $adjustedLink = "https://www.youtube.com/embed/6HaTP7Mj_TM";
            }
            return $adjustedLink;
        }else{
            return "https://www.youtube.com/embed/6HaTP7Mj_TM";
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
