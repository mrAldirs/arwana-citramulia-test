<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::orderBy('name', 'asc')->get();
        return view('product.index', compact('data'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), Product::$rules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = $request->file('image');
        $image->storeAs('public/product', $image->hashName());

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            'description' => $request->description,
            'stock' => $request->stock,
            'image' => $image->hashName(),
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

    public function show(string $id)
    {
        $data = Product::findOrFail($id);
        return view('product.show', compact('data'));
    }

    public function edit(string $id)
    {
        $data = Product::findOrFail($id);
        return view('product.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), Product::$rules);

        if ($validator->fails()) {
            $validator->validate();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            Storage::delete('public/product/'. $data->image);

            $image->storeAs('public/product', $image->hashName());
            $data->image = $image->hashName();
        }

        $data->update([
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            'description' => $request->description,
            'stock' => $request->stock,
        ]);

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    public function destroy(string $id)
    {
        $data = Product::findOrFail($id);
        Storage::delete('public/product/'. $data->image);
        $data->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
