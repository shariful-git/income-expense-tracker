<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Auth::user()
            ->transactions()
            ->with('category')
            ->orderByDesc('date')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $categories = Auth::user()->categories()->orderBy('type')->orderBy('name')->get();
        return view('transactions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount'      => 'required|numeric|min:0.01',
            'date'        => 'required|date',
            'description' => 'nullable|string|max:1000',
        ]);

        // Ensure category belongs to user
        $category = Auth::user()->categories()->findOrFail($request->category_id);

        Auth::user()->transactions()->create([
            'category_id' => $category->id,
            'amount'      => $request->amount,
            'date'        => $request->date,
            'description' => $request->description,
        ]);

        return redirect()->route('transactions.index')
                         ->with('success', 'Transaction added successfully!');
    }

    public function edit(Transaction $transaction)
    {
        $this->authorizeTransaction($transaction);

        $categories = Auth::user()->categories()->orderBy('type')->orderBy('name')->get();

        return view('transactions.edit', compact('transaction', 'categories'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $this->authorizeTransaction($transaction);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount'      => 'required|numeric|min:0.01',
            'date'        => 'required|date',
            'description' => 'nullable|string|max:1000',
        ]);

        $category = Auth::user()->categories()->findOrFail($request->category_id);

        $transaction->update([
            'category_id' => $category->id,
            'amount'      => $request->amount,
            'date'        => $request->date,
            'description' => $request->description,
        ]);

        return redirect()->route('transactions.index')
                         ->with('success', 'Transaction updated!');
    }

    public function destroy(Transaction $transaction)
    {
        $this->authorizeTransaction($transaction);
        $transaction->delete();

        return redirect()->route('transactions.index')
                         ->with('success', 'Transaction deleted!');
    }

    private function authorizeTransaction(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
