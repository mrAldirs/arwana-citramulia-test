<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $transactionCount = Transaction::count();
        return view('home', compact('productCount', 'transactionCount'));
    }
}
