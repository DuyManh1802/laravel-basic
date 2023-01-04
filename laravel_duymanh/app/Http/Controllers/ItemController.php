<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\category;

class ItemController extends Controller
{
    public function index()
    {
        $items = item::all();
        return view('item.list', compact('items'));
    }

    public function create()
    {
        $categories = category::all();
        return view('item.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'item_name' =>'required',
            'category_id' =>'required',
        ]);

        item::create([
            'item_name' =>$request->item_name,
            'category_id'=>$request->category_id,
        ]);
        return redirect()->route('item.index')->with('success', 'Created successfully!' );
    }

    public function edit($id)
    {
        $items = item::find($id);
        return view('item.edit', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'item_name' =>'required'
        ]);

        item::where('id', $id)->update([
            'item_name' =>$request->item_name,
        ]);
        return redirect()->route('item.index', $id)->with('success', 'Edited successfully!' );
    }

    public function delete($id)
    {
        item::where('id', $id)->delete();
        return redirect()->route('item.index')->with('success', 'Deleted successfully');
    }
}