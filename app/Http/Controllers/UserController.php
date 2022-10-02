<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use League\CommonMark\Util\ArrayCollection;

class UserController extends Controller
{
    public function index(User $user){  
        return $user->all();
    }
    public function show(User $user){
        $tmp = new UserResource($user);
        return $tmp->response();
    }
}
