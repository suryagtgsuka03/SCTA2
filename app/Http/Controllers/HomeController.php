<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('private.dashboard');
    }
    public function monitor()
    {
        return view('private.monitor');
    }
    public function invoice()
    {
        return view('private.invoice');
    }
    
    public function pembukuan()
    {
        return view('private.pembukuan');
    }

    public function pengeluaran()
    {
        return view('private.pengeluaran');
    }
}