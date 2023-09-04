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

    public function store(Request $request)
    {
        try {
            if (Product::where('code', $request->code)->first()) {
                return redirect()->back()->with([
                    'status' => 'warning',
                    'message' => 'Já existe um produto com esse código.'
                ]);
            }

            $product = new Product();

            $product->name = $request->name;
            $product->code = $request->code;
            $product->price = str_replace(',', '', $request->price) / 100;
            $product->save();

            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Produto cadastrado com sucesso!'
            ]);

        } catch (\Throwable $th) {
            report ($th);
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Algo deu errado! tente novamente.'
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $product = Product::find($request->id);

            $product->name = $request->name;
            $product->code = $request->code;
            $product->price = str_replace(',', '', $request->price) / 100;
            $product->save();

            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Produto atualizado com sucesso!'
            ]);

        } catch (\Throwable $th) {
            report ($th);
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Algo deu errado! tente novamente.'
            ]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $product = Product::find($request->id);

            $product->delete();

            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Produto excluído com sucesso!'
            ]);

        } catch (\Throwable $th) {
            report ($th);
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Algo deu errado! tente novamente.'
            ]);
        }
    }
}
