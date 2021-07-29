<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthComumController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/comum';

    public function __construct()
    {
        $this->middleware('auth')->except('login', 'showLoginForm');
    }

    public function showLoginForm()
    {
        return view('auth.comum');
    }

    public function guard()
    {
        return Auth::guard();
    }

    public function logout(Request $request) {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
        ? new JsonResponse([], 204)
        : redirect('/comum/login');
    }
}
