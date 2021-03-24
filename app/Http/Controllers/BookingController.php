<?php

namespace App\Http\Controllers;
use App\Ticket;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function search(Request $request)
    {
        $key1 = $request->input('key1');
        $key2 = $request->input('key2');
        $datesearch = $request->input('datesearch');
        $show_tickets  = Ticket::with('users','vehicles')->
        where('awaycome', '=',  $key1 )->
        Where('destination', '=', $key2  )->
        orWhere('departure_time', '=',   $datesearch   )
        ->get(); 
        return view('bookingticket', ['show_tickets' => $show_tickets, ]);
    }

}
