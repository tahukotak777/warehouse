<?php

namespace App\Http\Controllers;

use App\Models\product_log;
use App\Models\products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function dashboard()
    {
        $user_division = Auth::user()->division;

        if ($user_division == 'manager') {
            return redirect('/user');
        } else if ($user_division == 'production') {
            return redirect('/product');
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

    public function product() {
        if (auth()->user()->division == 'production') {
            $products = products::all();
    
            return view('pages.products', [
                'products'=>$products,
            ]);
        }
    }

    public function editProduct($id)
    {
        if (auth()->user()->division == 'production') {
            $product = products::findOrFail($id);
    
            return view('pages.edit', data: [
                'product' => $product,
            ]);
        }
    }

    public function logs()
    {
        if (auth()->user()->division == 'production') {
            $logs = product_log::latest()->get();
    
            return view('pages.logs', [
                'logs' => $logs,
            ]);
        }
    }

    public function stock()
    {
        if (auth()->user()->division == 'stock') {
            $products = products::all();
    
            return view('pages.stocks', [
                'products' => $products,
            ]);
        }
    }

    public function user() {
        if (auth()->user()->division == 'manager') {
            $users = User::all(['id','name', 'email', 'division']);
    
            return view('pages.users', [
                'users'=>$users,
            ]);
        }
    }

    public function manage_division($id) {
        if (auth()->user()->division == 'manager') {
            $user = User::findOrFail($id, ['id','name', 'email', 'division']);
    
            return view('pages.manage_division', [
                'user'=>$user,
            ]);
        }
    }
}
