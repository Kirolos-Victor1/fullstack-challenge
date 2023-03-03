<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;

class UserResource extends JsonResource
{
    public function toArray(Request $request)
    {
        $data = Http::get(
            "https://api.openweathermap.org/data/2.5/weather?lat="
            . $this->latitude . "&lon="
            . $this->longitude . "&appid="
            . env('OPEN_WEATHER_API_KEY')
        )->body();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'weather' => json_decode($data),
        ];
    }
}
