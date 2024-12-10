<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
   use HasFactory;
   protected $fillable=['name','description','user_id'];

   public  function upvote()
   {
    return $this->hasMany(Upvote::class);

   }
   public function comment()
   {

   return $this->hasMany(Comment::class)->latest() ;
   }
   public function user()
   {

   return $this->belongsTo(User::class) ;
   }
}
