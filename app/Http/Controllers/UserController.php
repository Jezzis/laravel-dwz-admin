<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Http\Requests;
use app\Repositories\User\UserRepositoryContract;

class UserController extends Controller
{
    /**
     * @var UserRepositoryContract
     */
    protected $userRepo;

    public function __construct()
    {
        $this->userRepo = App::make('App\Repositories\User\UserRepositoryContract');
    }

    public function index()
    {
        dd(['id' => 1]);
        $userList = $this->userRepo->simpleSelect(['id' => 1]);
        dd($userList, true);
        return view('user.list', ['list' => $userList]);
    }

    public function postList()
    {

    }

    public function show($id)
    {
        $user = $this->userRepo->findOrFail($id);
        dd($user, true);
    }
}
