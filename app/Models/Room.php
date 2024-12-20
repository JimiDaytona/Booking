<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    use HasFactory;

    public function reservations(): HasOne
    {
        return $this->hasOne(Reservation::class);
    }

    public $timestamps = false;

    protected $fillable = ['name', 'img', 'price', 'description', 'person'];
    public static function searchRoom($dateIn, $dateOut, $person = 1, $price = null)
    {
        return DB::table('rooms')
            ->leftJoin('reservations', 'rooms.id', '=', 'reservations.room_id')
            ->where(function ($query) use ($dateIn, $dateOut) {
                $query->where(function ($subQuery) use ($dateIn, $dateOut) {
                    $subQuery->where('reservations.dateIn', '>=', $dateOut)
                        ->orWhere('reservations.dateOut', '<=', $dateIn);
                })
                    ->orWhereNull('reservations.id'); // Учитываем комнаты без бронирований
            })
            ->where('rooms.person', '>=', $person)
            ->where('rooms.price', '<=', $price)
            ->distinct()
            ->select('rooms.*')
            ->get();
    }
}
