<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(\Illuminate\Http\Request $request)
    {
        //return $request->only($this->username(), 'password');
        return ['email' => $request->email, 'password' => $request->password, 'confirmed' => 1];
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        //User check
        $userCheck = User::where('email', $user->email)->first();
        
        if($userCheck) {
            $loginUser = $userCheck;
            // si no tiene nombre
            if(emty($loginUser->name)) {
                $loginUser->name = $user->name;    
            }
            // si no tiene nombre
            if(emty($loginUser->picture)) {
                $loginUser->picture = $user->avatar;    
            }
        } else {
            $loginUser = new User;
            $loginUser->email = $user->email;
            $loginUser->name = $user->name;
            $loginUser->username = str_slug($user->name, '-');
            $loginUser->picture = $user->avatar;
            $loginUser->password = Hash::make(str_random(8));
        }
        
        $loginUser->confirmed = true;
        $loginUser->save();

        auth()->login($loginUser, true);

        return redirect()->action('UserController@profile', $loginUser->username);

        // $user->token;
    }
}
