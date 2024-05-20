<?php

namespace App\Services\Admins;

use Illuminate\Support\Facades\Auth;

class LoginService
{

    public function loginAdmin($_data)
    {
        $remember = isset($_data['remember_token']);
        $login = Auth::guard(\dataAuth::AUTH['GUARD']['ADMIN'])->attempt(['email' => $_data['email'], 'password' => $_data['password'], 'status' => \dataUser::USER['STATUS']['ACTIVE'], 'user_type' => \dataUser::USER['USER_TYPE']['ADMIN']], $remember);
        if ($login) {
            Auth::shouldUse(\dataAuth::AUTH['GUARD']['ADMIN']);
        }
        return $login;
    }

}
