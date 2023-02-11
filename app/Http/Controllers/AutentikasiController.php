<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AutentikasiController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function createRegister(Request $request)
    {
        $validUser = $request->validate([
            'nama' => ['min:3','max:191'],
            'alamat' => ['required', 'min:6', 'max:191'], // wajib
            'email' => ['required','email:dns','unique:users,email', 'min:2', 'max:191'], // wajib
            'password' => ['required','min:6','max:255'] // wajib
        ]);
        $validUser['password'] = Hash::make($request->password);
        User::create($validUser);
        return redirect(route('login'))->with('success', 'anda berhasil daftar! saatnya login');
    }
    public function login() {
        return view('auth.login');
    }
    public function createLogin(Request $request)
    {
        $validUser = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($validUser)){
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        throw ValidationException::withMessages([
            'email' => 'your provide credentials does not match our records',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function userDetail(User $user)
    {
        return view('auth.user', compact('user'));
    }
}