<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $table = 'polls';
    protected $fillable = ['title', 'start_date', 'end_date'];
//    public $timestamps = false;

    public function options()
    {
        return $this->hasMany(Option::class,'poll_id');
    }
}
