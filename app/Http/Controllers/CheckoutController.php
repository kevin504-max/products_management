<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        try {
            $cartItems = Cart::where('user_id', Auth::id())->get();

            if ($cartItems->count() == 0) {
                return redirect()->route('dashboard')->with([
                    'status' => 'info',
                    'message' => 'Seu carrinho está vazio!'
                ]);
            }

            return view('checkout', compact('cartItems'));
        } catch (\Throwable $th) {
            report ($th);
            return response()->json([
                'message' => 'Erro ao acessar página de pagamento! Tente novamente.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function placeOrder(Request $request)
    {
        try {
            $order = new Order();
            $order->user_id = Auth::id();
            $order->status = 0;

            $cartItems = Cart::where('user_id', Auth::id())->get();

            $total = 0;
            foreach ($cartItems as $item) {
                $total += $item->product->price * $item->items;
            }

            $order->total_price = $total;
            $order->tracking_number = 'TR' . rand(100000, 999999);
            $order->save();

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->items,
                    'price' => $item->product->price
                ]);
            }

            Cart::destroy($cartItems);

            return redirect()->route('dashboard')->with([
                'status' => 'success',
                'message' => 'Compra finalizada com sucesso! Volte sempre.'
            ]);
        } catch (\Throwable $th) {
            report ($th);
            return response()->json([
                'message' => 'Erro ao finalizar compra! Tente novamente.',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
