<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapor extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'reporter', 'name');
    }
    
    public function internal()
    {
        return $this->belongsTo(Internal::class, 'reporter', 'name');
    }    

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($lapor) {
            if (request()->has('images')) {
                foreach (request()->file('images') as $image) {
                    $path = $image->store('lapor_images', 'public'); // Simpan file

                    // Simpan path ke tabel images
                    $lapor->images()->create([
                        'path' => $path,
                    ]);
                }
            }
        });
    }

    // Relasi ke tabel images
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function statusHistories()
    {
        return $this->hasMany(StatusHistory::class, 'lapor_id');
    }
}
