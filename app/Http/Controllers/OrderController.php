<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    
    public function index()
    {
        $data = Order::latest('created_at')->get();
        return view('order.index',compact('data'));
    }

    public function create()
    {
        $data = Product::all();
        return view('order.create',compact('data'));
    }

    public function store(Request $request)
    {
                
        Order::create($request->all());
                    
        return redirect('order.index')->with('msg', 'Order created!');
    }

    public function edit($id)
    {
        $data = Order::findOrFail($id);
        return view('order.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $obj = Order::findOrFail($id);

        $obj->update($request->all());
               
        return Redirect('order')->with('msg', 'Product updated!');
    }


    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
           
        return Redirect('order')->with('msg', 'Order deleted!');
    }
}
