<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Key extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'game_id',
        'platform_id',
    ];

    public function canBeClaimed() 
    {
        // TODO Logik für das Key claimen, timeout, key hat kein anderer user, etc.
        return true;
    }

    public function claim() 
    {
        // TODO Logik mit timeout und so
        if (!Auth::check()) {
            return;
        }

        $this->user()->associate(Auth::user());

        $this->save();
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}
