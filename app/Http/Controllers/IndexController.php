<?php

namespace App\Http\Controllers;

use App\Models\product_log;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function dashboard()
    {
        $user_division = Auth::user()->division;
        $products = products::latest()->get();

        if ($user_division == 'manager' || $user_division == 'production') {
            return view("pages.dashboard", [
                'products' => $products,
            ]);
        } else if ($user_division == 'stock') {
            return redirect('/stock');
        } else {
            return redirect('/login');
        }
    }

    public function login()
    {
        return view('pages.login');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function editProduct($id)
    {
        $product = products::findOrFail($id);

        return view('pages.edit', data: [
            'product' => $product,
        ]);
    }

    public function logs()
    {
        $logs = product_log::latest()->get();

        return view('pages.logs', [
            'logs' => $logs,
        ]);
    }

    public function stock()
    {
        $products = products::all();

        return view('pages.stocks', [
            'products' => $products,
        ]);
    }
}
