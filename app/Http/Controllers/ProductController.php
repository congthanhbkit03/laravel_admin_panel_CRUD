<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\products;
use App\Models\category;

class ProductController extends Controller
{
    public function index()
    {
        $product = products::get();

        return view('products.index', ['data' => $product]);
    }

    public function add()
    {
        $category = category::get();

        return view('products.form', ['category' => $category]);
    }

    public function save(Request $request)
    {
        $data = [
            'item_code' => $request->item_code,
            'productname' => $request->productname,
            'category' => $request->id_category,
            'price' => $request->price
        ];

        products::create($data);

        return redirect()->route('products');
    }

    public function edit($id)
    {
        $product = products::find($id);
        $category = category::get();

        return view('products.form', ['product' => $product, 'category' => $category]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'item_code' => $request->item_code,
            'productname' => $request->productname,
            'category' => $request->id_category,
            'price' => $request->price
        ];

        products::find($id)->update($data);

        return redirect()->route('products');
    }

    public function delete($id)
    {
        products::find($id)->delete();

        return redirect()->route('products');
    }
}