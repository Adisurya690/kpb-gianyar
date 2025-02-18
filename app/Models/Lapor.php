<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapor extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'name', 'reporter');
    }

    public function statusHistories()
    {
        return $this->hasMany(StatusHistory::class, 'lapor_id');
    }
}
