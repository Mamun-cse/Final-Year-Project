<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CustomeRegistartionController extends Controller
{
    public function index()
    {
      //return view('auth.login');
    }   
    

    public function customLogin(Request $request)
    {
      $request->validate([
          'email' => 'required',
          'password' => 'required',
      ]);
 
      $credentials = $request->only('email', 'password');
      if (Auth::attempt($credentials)) {
         \Alert::success('Success ', 'sign in complete');
         return redirect()->to('/');
      }
      \Alert::success('Success ', 'Login details are not valid');
      return redirect()->to('/');
    }
    public function registration_index(){
        return view('registration');
    }
    public function registration(Request $request){
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'


        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
          \Alert::success('Success ', 'sign up complete');
        }
      
       

        return redirect()->to('/');

    } 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['fname'].' '. $data['lname'],
        'fname' => $data['fname'],
        'lname' => $data['lname'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    public function signOut() {
      Session::flush();
      Auth::logout();
      \Alert::success('Success ', 'log out complete');
      return redirect()->to('/');
  }

    
}
