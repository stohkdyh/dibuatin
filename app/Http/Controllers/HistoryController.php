<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user()->id;
        $orders = Order::where('user_id', $user)->get();
        // $projects = Project::all();
        
        return view('history', compact('orders'));
        // return view('history');
    }
}
