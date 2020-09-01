<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = ['path'];
    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
