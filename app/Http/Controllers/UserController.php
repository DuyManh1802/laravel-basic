<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Auth;

    class UserController extends Controller
    {
        public function index()
        {
            $users = User::all();
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

            User::create([
                'name' =>$request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('user.list')->with('success', 'Created successfully!' );
        }

        public function edit($id)
        {
            $users = User::find($id);
            return view('user.edit', compact('users'));
        }

        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'name' =>'required',
            ]);
            $users = User::find($id);
            $data = [
                'name' => $request->name,
            ];

            $users->update($data);
            return redirect()->route('user.list', $users->id)->with('success', 'Updated successfully!');
        }

        public function changePassword($id)
        {
            $users = User::find($id);
            return view('user.changePassword', compact('users'));
        }

        public function changePasswordSave(Request $request, $id)
        {
            $this->validate($request, [
                'current_password' => 'required|string',
                'new_password' => 'required|confirmed|min:8|string'
            ]);
            $users = User::find($id);
            if (!Hash::check($request->get('current_password'), $users->password)){
                return back()->with('error', "Current Password is Invalid");
            }

            if (strcmp($request->get('current_password'), $request->new_password) == 0){
                return redirect()->back()->with("error", "New Password cannot be same as your current password.");
            }

            $users->password = Hash::make($request->new_password);
            $users->save();
            return redirect()->route('user.list', $users->id)->with('success', "Password Changed Successfully");
        }

        public function delete($id)
        {
            User::where('id', $id)->delete();
            return redirect()->route('user.list', $id)->with('success', 'Deleted successfully!' );
        }
    }
?>