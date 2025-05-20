<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    //shows the home page
    public function index(){
        return view('Users.index');
         
    } 
 
    //show registration form
    public function register(){
        return view('Users.register');
    }
  
    //store registration data
    public function store(Request $request){

     $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
    ]);

          // Hash the password before storing
         $data['password'] = bcrypt($data['password']);

    // Set default role and status for new registrations
    $data['role'] = 'member';
    $data['status'] = 'pending';

        $newUser = User::create($data);// save data into the database via model

return redirect()->route('Users.index')->with('success', 'Registration submitted. Awaiting approval.');


    }

    // show login form
     public function showLoginForm()
    {
        return view('Users.login');
    }

    public function login(Request $request)
       {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

     
    $user = User::where('email', $request->email)->first();
    
      
    if ($user && Hash::check($request->password, $user->password)) {
        if ($user->status !== 'approved' && $user->role !== 'admin') {
            return back()->with('error', 'Your account is awaiting approval by the pastor.');
        }

        Auth::login($user, $request->has('remember'));

        // Redirect based on role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Welcome, Pastor!');
        } elseif ($user->role === 'member') {
            return redirect()->route('Users.dashboard')->with('success', 'Welcome, Member!');
        } elseif ($user->role === 'leader') {
            return redirect()->route('Users.dashboard')->with('success', 'Welcome, Leader!');
        }
      
     

                 // Not verified
            Auth::logout();
            return back()->with('error', 'Your account is awaiting approval by the pastor.');
        }
     
                return back()->with('error', 'Invalid email or password. Please register if you don\'t have an account.');
   

    }
            // Logout user
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
   
}
  

