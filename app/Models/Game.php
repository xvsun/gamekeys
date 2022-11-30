<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'platform_id',
    ];

    public function keys()
    {
        return $this->hasMany(Key::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}
