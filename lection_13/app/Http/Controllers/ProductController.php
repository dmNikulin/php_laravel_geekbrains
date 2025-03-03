<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() 
    {
        return Product::paginate(5);
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function store(Request $request)
    {
        return $product = Product::create([
            'sku'=>$request->get('sku'),
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([], 204);
    }

    public function update(Product $product, Request $request)
    {

        // $product->where('id', $request->get('id'))->update(
        //    [ 'sku'=>$request->get('sku')],
        //     ['name'=>$request->get('name')],
        //     ['price'=>$request->get('price')]
        // );
        
        // return response()->json([], 201);;

        $product->update($request->all());

        return response()->json($product, 202);
    }
        
}
