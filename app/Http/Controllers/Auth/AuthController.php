<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UserRepository;
use Socialite;
use Auth;

class AuthController extends Controller
{

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Show the application login form.
     *
     */
    public function login()
    {
        return view('auth.login');
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
        $gUser = Socialite::driver('google')->user();

        // Check the email domain
        $this->checkEmail($gUser->email, env('ALLOWED_EMAIL_DOMAIN'));

        // Get or create our user
        $user = $this->users->firstOrCreate([
            'google_id' => $gUser->id,
            'display_name' => $gUser->name,
            'email' => $gUser->email,
            'picture' => $gUser->avatar,
            'first_name' => $gUser->user['name']['givenName'],
            'last_name' => $gUser->user['name']['familyName'],
        ]);

        // The access token isn't fillable, save it separately
        $this->users->update(['access_token' => $gUser->token], $user->id);

        // Log them in
        Auth::login($user, true);

        // Redirect to the main UI
        return redirect(env('APP_UI_URL'));
    }

    private function checkEmail($email, $allowedEmailDomain)
    {
        /*
          Freak out if they aren't signing in with
          an email from approved domain.
         */
        if (explode('@', $email)[1] !== $allowedEmailDomain) {

            $errorMsg = 'Your email is not a ' . $allowedEmailDomain .
                        ' address. Only employees may access this website.';

            $request->session()->flash('error', $errorMsg);
            return redirect()->route('auth.login');
        }
    }
}
