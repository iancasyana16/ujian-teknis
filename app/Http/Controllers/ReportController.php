<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('reports.view');
        $start = $request->input('start', now()->subMonth()->format('Y-m-d'));
        $end = $request->input('end', now()->format('Y-m-d'));

        $incomes = Finance::where('type', 'Income')
            ->whereBetween('date', [$start, $end])
            ->sum('amount');

        $expenses = Finance::where('type', 'Expense')
            ->whereBetween('date', [$start, $end])
            ->sum('amount');

        return view('reports.index', compact('incomes', 'expenses', 'start', 'end'));
    }
}
