<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $orders = Order::where('status', '!=', 1)->orderBy('created_at', 'desc')->get();

            return view('dashboard.order.index', compact('orders'));
        } catch (\Throwable $th) {
            report ($th);
            return response()->json([
                'message' => 'Erro ao acessar página de compras! Tente novamente.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function view($id)
    {
        $order = Order::where('id', $id)->first();

        return view('dashboard.order.view', compact('order'));
    }

    public function history()
    {
        try {
            $orders = Order::where('status', 1)->get();

            return view('dashboard.order.history', compact('orders'));
        } catch (\Throwable $th) {
            report ($th);
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Erro ao acessar histórico de pedidos! Tente novamente.'
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $order = Order::find($request->id);
            $order->status = $request->order_status;
            $order->save();

            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'O status do pedido foi atualizado com sucesso!'
            ]);
        } catch (\Throwable $th) {
            report ($th);
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Erro ao atualizar status do pedido! Tente novamente.'
            ]);
        }
    }
}
