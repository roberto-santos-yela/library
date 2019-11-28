<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['id','title','description'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'users_lend_books');
    }

}
