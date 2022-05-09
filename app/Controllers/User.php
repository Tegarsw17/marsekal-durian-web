<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->usermodel = new UserModel();
    }

    public function index()
    {

        $data = [
            'title' => 'User | Duren Marsekal',
            'list_user' => $this->usermodel->getUser()->getResultArray(),
        ];

        // dd($data);
        return view('user', $data);
    }
}
