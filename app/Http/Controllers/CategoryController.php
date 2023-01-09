<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\category;

    class CategoryController extends Controller
    {
        private $categories;

        public function __construct()
        {
            $this->categories = new category();
        }

        public function index()
        {
            $categories = $this->categories->allCategory();
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

            $data = [
                $request->category_name,
                date('Y-m-d H:i:s')

            ];
            $this->categories->addCategory($data);
            return redirect()->route('category.index')->with('success', 'Created successfully!');
        }

        public function edit($id)
        {
            $categories = $this->categories->findID($id);
            return view('category.edit', compact('categories'));
        }

        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'category_name' =>'required'
            ]);

            $data = [
                'category_name' =>$request->category_name,
            ];
            $this->categories->updateCategory($data, $id);
            return redirect()->route('category.index')->with('success', 'Edited successfully!');
        }

        public function delete($id)
        {
            $this->categories->deleteCategory($id);
            return redirect()->route('category.index')->with('success', 'Deleted successfully');
        }
    }
?>
