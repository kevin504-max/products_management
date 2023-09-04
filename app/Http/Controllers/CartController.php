<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();

        return view('cart', compact('cartItems'));
    }

    public function addProduct(Request $request)
    {
        try {
            $product = Product::find($request->product_id);

            if (!$product) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Produto não encontrado!'
                ]);
            }

            $existingCartItem = Cart::where('product_id', $request->product_id)->where('user_id', Auth::id())->first();

            if ($existingCartItem) {
                return response()->json([
                    'status' => 'info',
                    'message' => 'Produto já adicionado ao carrinho!'
                ]);
            }

            $cartItem = new Cart();
            $cartItem->user_id = Auth::id();
            $cartItem->product_id = $request->product_id;
            $cartItem->items = $request->quantity;
            $cartItem->save();

            return response()->json([
                'status' => 'success',
                'message' => $product->name . ' adicionado ao carrinho!'
            ]);
        } catch (\Throwable $th) {
            report ($th);
            return response()->json([
                'message' => 'Erro ao adicionar produto ao carrinho',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function removeProduct(Request $request)
    {
        try {
            $existingCartItem = Cart::where('product_id', $request->product_id)->where('user_id', Auth::id())->first();

            if (!$existingCartItem) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Producto não encontrado!'
                ]);
            }

            $existingCartItem->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Produto removido do carrinho!'
            ]);
        } catch (\Throwable $th) {
            report ($th);
            return response()->json([
                'message' => 'Erro ao remover produto do carrinho',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
