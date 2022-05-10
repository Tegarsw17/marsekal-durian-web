<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DashboardModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    private $db;
    private $kondisi;

    public function __construct()
    {
        $this->dashmodel = new DashboardModel();
        $this->usermodel = new UserModel();
    }

    public function index()
    {
        $data = [
            // 'jumlah_pohon' => $this->dashmodel->countAllPohon()->getResultArray(),
            'title' => 'Dashboard | Duren Marsekal',
            'nav' => 'dashboard',
            'list_pohon' => $this->dashmodel->getDurianUpdate()->getResultArray(),
            'jumlah_pohon' => $this->dashmodel->countAllPohon(),
            'tanaman_sakit' => $this->dashmodel->getTanamanSakit(),
            'jenis_pohon' => $this->dashmodel->getJenisTanaman()->getResultArray(),
            'total_user' => $this->usermodel->countUser(),
        ];


        // dd($data);
        return view('dashboard', $data);
    }

    public function tes()
    {
        return view('blank');
    }
}
