<?php namespace App\Services;

use App\User;
use App\UserProfile;

use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class AccountRegistrar implements RegistrarContract {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        $user =  User::create([
            'name' => $data['firstname']." ".trim($data['subname']." ".$data['lastname']),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $profile = new UserProfile($data);

        $user->profile()->save($profile);

        return $user;
    }

}