<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AuthController extends Controller
{// Show login form
    public function showLoginForm() {
        return view('userprofile.logingform');
    }
// Handle login request
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // Attempt login
        $logingatt = $request->only('email','password');
        // Check if the user exists and the password is correct
        if(Auth::attempt($logingatt)){
            $request->session()->regenerate();
            return redirect()->intended('/recipes');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password'
        ]);
    }
 // Handle logout request
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
