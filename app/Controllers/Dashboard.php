<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DashboardModel;

class Dashboard extends BaseController
{
    private $db;
    private $kondisi;

    public function __construct()
    {
        $this->dashmodel = new DashboardModel();
    }

    public function index()
    {
        $data = [
            // 'jumlah_pohon' => $this->dashmodel->countAllPohon()->getResultArray(),
            'title' => 'Dashboard|Duren Marsekal',
            'list_pohon' => $this->dashmodel->getDurianUpdate()->getResultArray(),
            'jumlah_pohon' => $this->dashmodel->countAllPohon(),
            'tanaman_sakit' => $this->dashmodel->getTanamanSakit(),
            'jenis_pohon' => $this->dashmodel->getJenisTanaman()->getResultArray(),
        ];


        // dd($data);
        return view('dashboard', $data);
    }
}
