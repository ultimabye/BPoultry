<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\AppQueues;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewUserRequest;
use App\Jobs\VerifyMailJob;
use App\Models\User;
use Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Log;

class AuthController extends Controller
{

    private $client;

    /**
     * DefaultController constructor.
     */
    public function __construct()
    {
        $this->client = DB::table('oauth_clients')->where('password_client', 1)->first();
    }

   




    // public function register(NewUserRequest $request)
    // {
    //     if ($this->client == null) {
    //         abort(500, 'Invalid client.');
    //         return;
    //     }

    //     $signature = $request->signature;
    //     Log::channel('slackNotification')->info('New Sign Up Request', [
    //         'Package Signature' => json_encode($signature)
    //     ]);

    //     $user = User::create([
    //         User::NAME => $request->name,
    //         User::EMAIL => $request->email,
    //         User::PASSWORD => Hash::make($request->password),
    //         User::LOCALE => $request->locale,
    //         User::SIGNUP_SOURCE => $request->signature
    //     ]);

    //     event(new Registered($user));

    //     return $user;
    // }




    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:5',
        ]);

        $endPoint = config('services.passport.login_endpoint');
        $clientId = config('services.passport.client_id');
        $clientSecret = config('services.passport.client_secret');

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        $params = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'grant_type' => 'password',
            'username' => '' . $request->username,
            'password' => $request->password,
            'scope' => ''
        ];

        $proxy->request->add($params);

        return app()->handle($proxy);
    }





    public function refreshToken(Request $request)
    {
        $request->validate([
            'refresh_token' => 'required|string',
        ]);

        $endPoint = config('services.passport.login_endpoint');
        $clientId = config('services.passport.client_id');
        $clientSecret = config('services.passport.client_secret');

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        $params = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'grant_type' => 'refresh_token',
            'refresh_token' => $request->refresh_token,
            'scope' => ''
        ];

        $proxy->request->add($params);

        return app()->handle($proxy);
    }






    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json('Logged out successfully', 200);
    }
}
