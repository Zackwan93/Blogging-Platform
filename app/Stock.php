<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //Table Name
    protected $table = 'stocks';
    //Primary  Key
    public $primaryKey = 'id';
    //timestamp
    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\User');
    }
}
