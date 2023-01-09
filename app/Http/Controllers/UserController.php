<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Auth;

    class UserController extends Controller
    {
        private $user;

        public function __construct()
        {
            $this->user = new User();
        }

        public function index()
        {
            $users = $this->user->allUser();
            return view('user.list', compact('users'));
        }

        public function create()
        {
            return view('user.create');
        }

        public function store(Request $request)
        {
            $this->validate($request, [
                'name' =>'required|string|max:255',
                'email' => 'required|string|unique:users|email',
                'password' => 'min:8|string|max:32|confirmed',
            ]);

            $data = [
                $request->name,
                $request->email,
                Hash::make($request->password),
                date('Y-m-d H:i:s')
            ];

            $this->user->addUser($data);
            return redirect()->route('user.list')->with('success', 'Created successfully!' );
        }

        public function edit($id)
        {
            $users = $this->user->findID($id);
            return view('user.edit', compact('users'));
        }

        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'name' =>'required',
            ]);
            $data = [
                'name' => $request->name,
                date('Y-m-d H:i:s')
            ];
            $this->user->updateUser($data, $id);
            return redirect()->route('user.list')->with('success', 'Updated successfully!');
        }

        public function delete($id)
        {
            $this->user->deleteUser($id);
            return redirect()->route('user.list')->with('success', 'Deleted successfully!' );
        }
    }
?>
