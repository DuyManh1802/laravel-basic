<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\category;

    class CategoryController extends Controller
    {
        public function index()
        {
            $categories = category::all();
            return view('category.list', compact('categories'));
        }

        public function create()
        {
            return view('category.create');
        }

        public function store(Request $request)
        {
            $this->validate($request, [
                'category_name' =>'required'
            ]);

            category::create([
                'category_name' =>$request->category_name,
            ]);
            return redirect()->route('category.index')->with('success', 'Created successfully!');
        }

        public function edit($id)
        {
            $categories = category::find($id);
            return view('category.edit', compact('categories'));
        }

        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'category_name' =>'required'
            ]);

            category::where('id', $id)->update([
                'category_name' =>$request->category_name,
            ]);
            return redirect()->route('category.index', $id)->with('success', 'Edited successfully!');
        }

        public function delete($id)
        {
            category::where('id', $id)->delete();
            return redirect()->route('category.index')->with('success', 'Deleted successfully');
        }
    }
?>