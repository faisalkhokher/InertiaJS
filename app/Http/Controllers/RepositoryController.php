<?php

namespace App\Http\Controllers;

use App\Repositiries\Interfaces\UserInterface;
use App\Repositiries\OrderRepository;
use App\Repositiries\PaymentRepository;
use App\Repositiries\UserRepository;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    // Todo:  controller of that class and make private data variable of repository and bind interface and repository in __construct
    private $user_repository;
    public function __construct(UserInterface $user_repository)
    {
       $this->user_repository = $user_repository;
    }

    // Todo : this function gettingUsers implamentation is used in user repository class
    public function fetchUsers()
    {
       $users =  $this->user_repository->gettingUsers();
       return $users;
    }

    // Todo : this is example of  Dependency Injection
    // Todo : if we use DI and that class have __const then we use that class bind into service providors
    public function users(UserRepository $userRepository  , PaymentRepository  $paymentRepository , OrderRepository  $orderRepository)
    {
        $orderRepository->all();
        return $paymentRepository->charge(2500);
//        return  $userRepository->user();
    }

}
