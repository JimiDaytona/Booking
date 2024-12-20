<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateIn',
        'dateOut',
        'user_id',
        'room_id',
        'person',
    ];

    public $timestamps = false;
    public static function scopeOverlapping($dateIn, $dateOut, $room_id)
    {
        return Reservation::where('room_id', $room_id)
            ->where(function ($query) use ($dateIn, $dateOut) {
                $query->where(function ($query) use ($dateIn, $dateOut) {
                    // Полное совпадение диапазонов
                    $query->where('dateIn', '=', $dateIn)
                        ->where('dateOut', '=', $dateOut);
                })->orWhere(function ($query) use ($dateIn, $dateOut) {
                    // Новый диапазон начинается внутри существующего
                    $query->where('dateIn', '>', $dateIn)
                        ->where('dateIn', '<', $dateOut);
                })->orWhere(function ($query) use ($dateIn, $dateOut) {
                    // Новый диапазон заканчивается внутри существующего
                    $query->where('dateOut', '>', $dateIn)
                        ->where('dateOut', '<', $dateOut);
                })->orWhere(function ($query) use ($dateIn, $dateOut) {
                    // Новый диапазон охватывает существующий
                    $query->where('dateIn', '<', $dateIn)
                        ->where('dateOut', '>', $dateOut);
                });
            })->first();

    }

    public static function getForUser()
    {
        return Reservation::where('user_id', Auth::id())
            ->get();
    }

    public function user():BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function room():BelongsTo
    {
        return $this->BelongsTo(Room::class);
    }
}
