<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Policies\OrderPolicy;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('orders.view', OrderPolicy::class);
        $orders = Order::with('customer')->paginate(10);
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $this->authorize('orders.create', OrderPolicy::class);
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
        $this->authorize('orders.update', OrderPolicy::class);
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
        $this->authorize('orders.delete', OrderPolicy::class);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus.');
    }
}
