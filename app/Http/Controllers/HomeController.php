<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function monitor()
    {
        return view('private.monitor');
    }
    public function invoice()
    {
        return view('private.invoice');
    }

    public function torder()
    {
        return view('private.torder');
    }

    public function ptrans()
    {
        return view('private.torder');
    }

    public function pengeluaran()
    {
        return view('private.pengeluaran');
    }
}