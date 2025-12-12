<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FinanceController extends Controller
{
    public function index()
    {
        $finances = Finance::orderBy('date', 'desc')->paginate(10);
        return view('finance.index', compact('finances'));
    }

    public function create()
    {
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
        $finance->delete();
        return redirect()->route('finances.index')->with('success', 'Finance entry deleted successfully.');
    }
}
