<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusHistory extends Model
{
    // protected $guarded = [];

    protected $fillable = ['lapor_id', 'status', 'note'];

    // public function report()
    // {
    //     return $this->belongsTo(Lapor::class, 'lapor_id');
    // }

    public function lapor()
    {
        return $this->belongsTo(Lapor::class, 'lapor_id');
    }
}
