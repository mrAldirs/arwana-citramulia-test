<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $data = Transaction::orderBy('created_at', 'desc')->get();
        return view('transaction.index', compact('data'));
    }

    public function create()
    {
        $product = Product::whereNot('stock', 0)->pluck('name', 'id');
        $productPrice = Product::pluck('price', 'id');
        return view('transaction.create', compact('product', 'productPrice'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Transaction::$rules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sequence = Transaction::count() + 1;
        $reference = 'TRX' . str_pad($sequence, 5, '0', STR_PAD_LEFT);

        Transaction::create([
            'product_id' => $request->product_id,
            'reference' => $reference,
            'customer' => $request->customer,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'status' => 'draft'
        ]);

        return redirect()->route('transaction.index')->with('success', 'Transaction created successfully');
    }

    public function show(string $id)
    {
        $data = Transaction::findOrFail($id);
        return view('transaction.show', compact('data'));
    }

    public function edit(string $id)
    {
        $data = Transaction::findOrFail($id);
        $product = Product::whereNot('stock', 0)->pluck('name', 'id');
        $productPrice = Product::pluck('price', 'id');
        return view('transaction.edit', compact('data', 'product', 'productPrice'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), Transaction::$rules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $transaction = Transaction::findOrFail($id);
        $transaction->update([
            'product_id' => $request->product_id,
            'customer' => $request->customer,
            'quantity' => $request->quantity,
            'total' => $request->total,
        ]);

        return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully');
    }

    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transaction.index')->with('success', 'Transaction deleted successfully');
    }

    public function action_done(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $product = Product::where('id', $transaction->product_id)->first();
        $product->update([
            'stock' => $product->stock - $transaction->quantity,
        ]);
        $transaction->update([
            'status' => 'done',
        ]);
        
        return redirect()->route('transaction.show', [$id])->with('success', 'Transaction updated successfully');
    }

    public function generate_pdf()
    {
        Carbon::setLocale('id');
        $dateNow = Carbon::now()->isoFormat('D MMMM YYYY');

        $data = Transaction::all();
        $total = Transaction::sum('total');
    
        $pdf = PDF::loadView('transaction.pdf.pdf', compact('data', 'total', 'dateNow'));

        return $pdf->download("summary_transaction.pdf");
    }
}
