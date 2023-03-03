<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HomeController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $users = User::paginate(5);
        return UserResource::collection($users);
    }
}
