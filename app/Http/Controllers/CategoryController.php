<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = category::get();

        return view('category/index', ['category' => $category]);
    }

    public function add()
    {
        return view('category.form');
    }

    public function save(Request $request)
    {
        category::create(['name' => $request->name]);

        return redirect()->route('category');
    }

    public function edit($id)
    {
        $category = category::find($id);
        //echo "$category";
        return view('category.form', ['category' => $category]);
    }

    public function update($id, Request $request)
    {
        category::find($id)->update(['name' => $request->name]);

        return redirect()->route('category');
    }

    public function delete($id)
    {
        category::destroy($id);
        return redirect()->route('category');
    }
}
