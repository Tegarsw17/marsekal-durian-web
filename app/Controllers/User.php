<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;

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

    public function detail($id)
    {
        $data = [
            'title' => 'Detail | Duren Marsekal',
            'nav' => 'user',
            'list_user' => $this->usermodel->where(['id' => $id])->getUser()->getResultArray(),
        ];
        // dd($data);
        return view('user/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data | Duren Marsekal',
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

        session()->setFlashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');

        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $this->usermodel->delete($id);
        session()->setFlashdata('pesan', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');
        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data | Duren Marsekal',
            'nav' => 'user',
            'validation' => \Config\Services::validation(),
            'user' => $this->usermodel->getUserWithPassword($id)->getResultArray(),
        ];

        // dd($data);

        return view('user/edit', $data);
    }

    public function update($id)
    {
        $usernameLama = $this->usermodel->getUserWithPassword($id)->getResultArray();
        if ($usernameLama[0]['username'] == $this->request->getVar('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[users.username]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 5 huruf'
                ]
            ],
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/user/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $this->usermodel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'id_user' => $this->request->getVar('role'),
            'password' => $this->request->getVar('password'),
        ]);

        session()->setFlashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');

        return redirect()->to('/user');
    }
}
