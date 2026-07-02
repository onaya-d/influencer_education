<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    // 配信日時設定
    public function index()
    {
        return view('admin.delivery');
    }
}