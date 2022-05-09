<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Jumlah Tanaman -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pohon</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <!-- <?= $jumlah_pohon[0]['nama_durian']; ?> -->
                                <?= $jumlah_pohon; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-tree fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jenis Pohon</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jenis_pohon[0]['jenis']; ?></div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-comments fa-2x text-gray-500"></i> -->
                            <i class="fa-solid fa-database fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Tanaman Sakit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tanaman_sakit; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-syringe fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pegawai
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_user - 1; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pembagian Durian</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Musangking
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Bawor
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Duri Hitam
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Petruk
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle" style="color:#ef42f5"></i> Matahari
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Durian Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Durian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Pohon</th>
                            <th>Kegiatan</th>
                            <th>Status</th>
                            <th>Start date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($list_pohon as $list) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $list['nama_durian']; ?></td>
                                <td><?= $list['kegiatan']; ?></td>
                                <td><span class="badge badge-<?php if ($list['status'] == 'Sehat') {
                                                                    echo "success";
                                                                } elseif ($list['status'] == 'Sakit') {
                                                                    echo "danger";
                                                                } else {
                                                                    echo "warning";
                                                                } ?>"><?= $list['status']; ?></span></td>
                                <td><?= $list['tanggal_tanam']; ?></td>
                                <td>
                                    <a href="#"><i class="far fa-eye fa-lg"></i></a>
                                    <!-- <a href="#"><span class="badge badge-primary">Edit</span></a> -->
                                    <a href="#" class="btn btn-primary btn-sm ml-1">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->



<?= $this->endsection(); ?>