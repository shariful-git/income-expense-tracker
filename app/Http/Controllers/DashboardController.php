<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        // Current month boundaries
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endOfMonth   = Carbon::now()->endOfMonth()->format('Y-m-d');

        // All transactions this month with category
        $monthlyTransactions = $user->transactions()
            ->with('category')
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->orderByDesc('date')
            ->get();

        // Calculate totals
        $income = $monthlyTransactions
            ->where('category.type', 'income')
            ->sum('amount');

        $expenses = $monthlyTransactions
            ->where('category.type', 'expense')
            ->sum('amount');

        $balance = $income - $expenses;

        // Recent 5 transactions for quick view
        $recentTransactions = $user->transactions()
            ->with('category')
            ->orderByDesc('id')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'income',
            'expenses',
            'balance',
            'monthlyTransactions',
            'recentTransactions'
        ));
    }
}
