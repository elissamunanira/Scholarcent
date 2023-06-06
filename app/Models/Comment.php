<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


     //Table name
     protected $table = 'comments';
     //primary key
     public $primaryKey = 'id';
     //Timestamp
     public $timestamp = true;
 
     protected $fillable = [
         'name',
         'email',
         'comment_body'
     ];
 



    // relationship with post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
