<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\item;
    use App\Models\category;

    class ItemController extends Controller
    {
        private $items;

        public function __construct()
        {
            $this->items = new item();
        }
        public function index()
        {
            $items = $this->items->allItem();
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

            $data = [
                'item_name' =>$request->item_name,
                'category_id'=>$request->category_id,
            ];
            $this->items->addItem($data);
            return redirect()->route('item.index')->with('success', 'Created successfully!' );
        }

        public function edit($id)
        {
            $items = $this->items->findID($id);
            return view('item.edit', compact('items'));
        }

        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'item_name' =>'required'
            ]);

            $data = [
                'item_name' =>$request->item_name,
            ];
            $this->items->updateItem($data, $id);
            return redirect()->route('item.index')->with('success', 'Edited successfully!' );
        }

        public function delete($id)
        {
            $this->items->deleteItem($id);
            return redirect()->route('item.index')->with('success', 'Deleted successfully');
        }
    }
?>