<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    //Table Name
    protected $table = 'workers';
    //Primary  Key
    public $primaryKey = 'id';
    //timestamp
    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\User');
    }
}
