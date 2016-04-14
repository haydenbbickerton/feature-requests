<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UserRepository;
use Socialite;
use Auth;
use JWTAuth;
use Cookie;

class AuthController extends Controller
{
    /*
     * The base domain
     */
    protected $baseDomain;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
        $this->baseDomain = parse_url(env('APP_URL'))['host'];

        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        // Log out and remove the jwt-cookie
        Auth::logout();
        $cookie = Cookie::forget('jwt-auth', null, $this->baseDomain);

        // Redirect to login
        return redirect()
                ->route('auth.login')
                ->withCookie($cookie)
                ->with('message', 'You have logged out successfully')
                ->with('alert-class', 'alert-info');
    }


    /**
     * Redirect to Google's authentication page
     */
    public function google()
    {
        return Socialite::driver('google')->scopes(['profile', 'email'])->redirect();
    }

    /**
     * Handle the oAuth redirection from Google
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect(Request $request)
    {
        // https://laracasts.com/discuss/channels/laravel/socialite-invalidstateexception-in-abstractproviderphp/replies/130641
        $state = $request->get('state');
        $request->session()->put('state', $state);

        try {
            $gUser = Socialite::driver('google')->user();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // Make them authenticate again
            return redirect()->route('auth.google');
        }

        // Get or create our user
        $user = $this->users->firstOrCreate([
            'google_id' => $gUser->id,
            'display_name' => $gUser->name,
            'email' => $gUser->email,
            'picture' => $gUser->avatar,
            'first_name' => $gUser->user['name']['givenName'],
            'last_name' => $gUser->user['name']['familyName']
        ]);
        $this->users->update(['access_token' => $gUser->token], $user->id); // token isn't fillable

        // Log them in
        Auth::login($user, true);

        // Generate our JWT
        $token = JWTAuth::fromUser($user);

        /*
            Making cookie on base domain so the subdomain picks it up.
            TODO: There's probably a better way to handle this. Seems janky
            and wouldn't work for any UI that isn't on root/subdomain.
        */
        $cookie = Cookie::make('jwt-auth', $token, 120, null, $this->baseDomain, false, false);

        // Redirect to the main UI
        return redirect()
                ->to(env('APP_UI_URL'))
                ->withCookie($cookie);
    }
}
