<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();

            return view('dashboard.products.index', compact('products'));
        } catch (\Throwable $th) {
            report ($th);
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Algo deu errado! tente novamente.'
            ]);
        }
    }
}
