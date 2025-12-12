<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;
use App\Policies\FinancePolicy;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FinanceController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize("finances.view", FinancePolicy::class);
        $finances = Finance::orderBy('date', 'desc')->paginate(10);
        return view('finance.index', compact('finances'));
    }

    public function create()
    {
        $this->authorize('finances.create', FinancePolicy::class);
        return view('finance.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        Finance::create($data);

        return redirect()->route('finances.index')->with('success', 'Finance entry created successfully.');
    }

    public function edit(Finance $finance)
    {
        $this->authorize('finances.update', FinancePolicy::class);
        return view('finance.edit', compact('finance'));
    }

    public function update(Request $request, Finance $finance)
    {
        $data = $request->validate([
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $finance->update($data);

        return redirect()->route('finances.index')->with('success', 'Finance entry updated successfully.');
    }

    public function destroy(Finance $finance)
    {
        $this->authorize('finances.delete', FinancePolicy::class);
        $finance->delete();
        return redirect()->route('finances.index')->with('success', 'Finance entry deleted successfully.');
    }
}
