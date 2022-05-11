<?php

namespace App\Repositiries;

use App\Models\User;
use App\Repositiries\Interfaces\UserInterface;

class UserRepository implements UserInterface
{
    private $key;
    public function __construct($key)
    {
        $this->key = $key;
    }

    public function gettingUsers()
    {
        // TODO: Implement gettingUsers() method.
        $users = User::value('email');
        return [
            'users' => $users,
            'key' => $this->key
        ];
    }


    public function user()
    {
        $users = User::value('email');
        return [
            'users' => $users,
            'key' => $this->key
        ];
    }
}
