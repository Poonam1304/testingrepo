<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function Ussersdata(){
      
        return view('index');
    }
   
    public function getaddform(){
        return view('Admin.adduser');
    }
    public function storeuser(request $request){
        $this->validate($request, [
            'name' => 'required|max:50',
            'mobile' => 'required',
            'email' => 'required|unique:users,email',
           
            'password' => 'required',
            


        ], [

            'name.required' => 'The Name field is required.',
            'mobile.required' => 'The number field is required.',
            'name.max' => 'The Name may not be greater than 50 characters.',
           
           
            'email.required' => 'The Email field is required. ',
            'password.required' => 'The Password field is required.',
            


        ]);
        
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->mobile =$request->mobile;
        $users->status =$request->status;
        $users->gender =$request->gender;

        $users-> hobbies = json_encode($request->hobbies);            
        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('image')->storeAs('uploads', $imageName, 'public');


        $users->image = $imageName;
        $users->image = '/storage/'.$path;
        $users->address =$request->address;
        $users->password = Hash::make($request->password);
        $users->save();
         return redirect()->route('userslist')->with('success',' admin user added successfully');
    }
    
}
public function userslist(){
    $users = User::paginate(2);
    return view('userlist', compact('users'));
}

public function delete(request $request)
    {
 
        $users = User::where('id', $request->userid);

        $users->delete();
       

         return redirect('userslist')->with('success',"user Deleted successfully");
    }

    public function edituser( $id){
        $cruds = User::all();
        $users = User::find($id);
       return view('edituser',compact('cruds','users'));

    }
    public function updateuser(request $request, $id){
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
         $users->save();
         return redirect()->route('userslist')->with('success',' admin user added successfully');
    }
}