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
            'nav' => 'user',
            'list_user' => $this->usermodel->getUser()->getResultArray(),
        ];

        // dd($data);
        return view('user/user', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'User | Duren Marsekal',
            'nav' => 'user',
            'validation' => \Config\Services::validation(),
        ];

        return view('user/create', $data);
    }

    public function save()
    {

        // validation
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 5 huruf'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{filed} sudah terdaftar'
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/user/create')->withInput()->with('validation', $validation);
        }

        $this->usermodel->save([
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'id_user' => $this->request->getVar('role'),
            'password' => $this->request->getVar('password'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/user');
    }
}
