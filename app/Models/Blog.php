<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Blog extends Model
{
    protected $guarded = [];

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author'] = Auth::user()->nickname;
        return $data;
    }
}
