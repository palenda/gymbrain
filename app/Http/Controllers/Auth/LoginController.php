<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Auth\AuthService;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\User as SocialiteUser;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    private AbstractProvider $provider;

    public function __construct(private readonly AuthService $authService)
    {
        $this->provider = Socialite::driver('google');
    }

    final public function loginWithGoogle(): RedirectResponse
    {
        return $this->provider->redirect();
    }

    final public function callbackFromGoogle(): RedirectResponse
    {
        /** @var SocialiteUser $googleUser */
        $googleUser = $this->provider->stateless()->user();
//        auth()->login($this->authService->getUser($googleUser), true);

        return redirect(config('app.url'));
    }

    final public function logout(Request $request): RedirectResponse
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return redirect(config('app.url'));
    }
}
