<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected  $table = 'options';
    protected $fillable = ['title', 'poll_id'];
//    public $timestamps = false;


    public function poll() {
        return $this->belongsTo(Poll::class);
    }
}
