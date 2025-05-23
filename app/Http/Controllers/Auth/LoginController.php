<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function username()
    {
        return 'name';
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::attempt([
            'name' => $request->input('name'),
            'password' => $request->input('password')
        ], $request->filled('remember'));
    }

    protected $redirectTo = '/home';

    protected function sendFailedLoginResponse(Request $request)
    {
        $login = $request->input('name');
        $user = User::where('name', $login)->first();

        $message = $user
            ? 'Password salah.'
            : 'Nama tidak ditemukan.';

        throw ValidationException::withMessages([
            'name' => [$message],
        ]);
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
