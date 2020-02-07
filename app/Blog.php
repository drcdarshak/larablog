<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // Table name
    public $table = 'blogs';
    //primary key
    public $primaryKey = 'id';
    //timastamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

}
