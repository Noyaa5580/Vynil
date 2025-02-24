<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $items = Product::all();
        return response()->json($items);
    }
    public function Search(Request $request, $search)
    {
        $items = DB::table("products")->whereLike("name", "%" . $search . "%")->orWhereLike("artist", "%" . $search . "%")->get();
        return response()->json($items);
        if ($request->is('/api/search/value=*')) {
            return dd($items);
        }
    }

    public function show($id)
    {
        $item = Product::find($id);
        return response()->json($item);
    }

    public function limited($start, $limit)
    {
        $items = DB::table("products")->where('id', '>=', $start)->where('id', '<=', $limit)->get();
        return response()->json($items);
    }


    public function store(Request $request)
    {
        DB::table('products')->insert($request->all());
        return response()->json(['status' => 'sucsess', 200]);
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->artist = $request->artist;
        $product->img = $request->img;
        $product->price = $request->price;
        $product->description = $request->description;
        $result = $product->save();
        if ($result) {
            return ['result' => 'Данные обновлены'];
        } else {
            return ['result' => 'data not updated'];
        }
    }
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(null, 204);
    }


    public function indexUser()
    {
        $items = User::all();
        return response()->json($items);
    }
    public function showUser($id)
    {
        $item = User::find($id);
        return response()->json($item);
    }
}
