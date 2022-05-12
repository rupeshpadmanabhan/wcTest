<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index()
    {
        $data = Product::latest('created_at')->get();
        return view('welcome',compact('data'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
                
        Product::create($request->all());
                    
        return redirect('/')->with('msg', 'Product created!');
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        return view('product.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $obj = Product::findOrFail($id);

        $obj->update($request->all());
               
        return Redirect('/product')->with('msg', 'Product updated!');
    }


    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
           
        return Redirect('/product')->with('msg', 'Product deleted!');
    }
}
