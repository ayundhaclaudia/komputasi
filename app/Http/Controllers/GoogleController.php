<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Cari user berdasarkan email atau google_id
            $finduser = User::where('google_id', $user->id)
                            ->orWhere('email', $user->email)
                            ->first();

            if($finduser){
                // Update google_id jika belum ada (login pertama kali via google untuk akun lama)
                $finduser->update(['google_id' => $user->id]);
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            } else {
                // Buat user baru jika tidak ditemukan
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('my-google-password') // Dummy password
                ]);

                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            return redirect('login')->with('error', 'Gagal login menggunakan Google.');
        }
    }
}
