<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

         //Table name
         protected $table = 'branches';
         //primary key
         public $primaryKey = 'id';
         //Timestamp
         public $timestamp = true;
     
         protected $fillable = [
             'branch_name',
             'campus' 
         ];
            
        //relationship with users
        public function Post(){
            return $this->hasMany('Post::class');
        }
}
