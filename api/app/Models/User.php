<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'longitude',
        'latitude'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//    protected $appends=['weather'];
//
//    protected function weather(): Attribute
//    {
//        $data = Http::get(
//            "https://api.openweathermap.org/data/2.5/weather?lat="
//            . $this->latitude . "&lon="
//            . $this->longitude . "&appid="
//            . env('OPEN_WEATHER_API_KEY')
//        )->body();
//        return Attribute::make(
//            get: fn($value) => json_decode($data),
//        );
//    }
}
