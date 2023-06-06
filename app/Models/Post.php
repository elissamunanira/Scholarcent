<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //use HasFactory;

    //Table name
    protected $table = 'posts';
    //primary key
    public $primaryKey = 'id';
    //Timestamp
    public $timestamp = true;

    protected $fillable = [
        'title',
        'body',
        'branch_name'
    ];

    // relationship with comments
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    // relationship with image
    // public function images()
    // {
    //     return $this->hasMany(Image::class);
    // }

    //relationship with users
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Branch(){
        return $this->belongsToMany(Branch::class);
    }
}


