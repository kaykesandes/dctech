<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {    
        $products = Product::all();

        return view('products.index', compact('products'));
    }
    
    public function create()
    {
        return view();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:products',
            'qty' => 'required',
            'valor' => 'required'
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produto cadastrado com sucesso');
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|unique:products',
            'qty' => 'required',
            'valor' => 'required'
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso');
    }

    public function edit(Product $product)
    {
        return view('products.form', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()
                ->route('index')
                ->with('success', 'Caso removido com sucesso.');
    }
}
