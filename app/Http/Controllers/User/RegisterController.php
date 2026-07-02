<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
   
    public function showRegisterForm()
    {
        // 「resources/views/user/register.blade.php を表示してね」という命令です
        return view('user.register'); 
    }
}