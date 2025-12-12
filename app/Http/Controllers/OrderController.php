<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->paginate(10);
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('order.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'total_amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Order::create($data);

        return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat.');
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        return view('order.edit', compact('order', 'customers'));
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'total_amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $order->update($data);

        return redirect()->route('orders.index')->with('success', 'Order berhasil diupdate.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus.');
    }
}
