<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::whereUserId(51)->orderByDesc('created_at')->get();
        $statusColor = ['новый' => '#BEBEBE', 'в процессе' => '#FFC700', 'выполнен' => '#96C25F', 'отменен' => '#F0777A', ];

        return view('main.profile', [
            'user' => auth()->user(),
            'orders' => $orders,
            'statusColor' => $statusColor,
        ]);
    }
}
