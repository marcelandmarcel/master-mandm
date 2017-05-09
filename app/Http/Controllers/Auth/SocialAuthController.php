<?php

namespace App\Http\Controllers\Auth;

use App\User;
//use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    

     /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect(); 
    }   


    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->fields('id','name','email','gender','avatar','nickname')->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        auth()->login($authUser);
        //return redirect($this->redirectPath());
        return redirect()->home();
    }


     /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where($provider . '_id', $user->id)->orWhere('email', $user->email)->first();
        if ($authUser) {
            User::Where('email', $user->email)->update(array(
                $provider . '_id' => $user->id,
                'avatar' => $user->avatar));
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            $provider . '_id' => $user->id,
            'avatar' => $user->avatar,
            'password' => bcrypt(str_random())
        ]);
    }

}
