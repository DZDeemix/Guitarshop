<?php

namespace App\Http\Controllers\Admin;

use App\Guest;
use App\Order;
use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminGuestController extends Controller
{
    public function show()
    {
        $pgn = Settings::all()->first()->paginatoin_admin;
        $data = Guest::paginate($pgn);

        return view('Admin.Guests.showguests',['data' => $data]);
    }
}
