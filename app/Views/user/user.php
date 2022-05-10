<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Mulai Disini -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Durian Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <form class="d-none d-sm-inline-block form-inline mr-auto md-3 my-2 my-md-0 mw-100 navbar-search" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <a href="/user/create" class="btn btn-success  mb-3"><i class="fas fa-plus mr-2"></i>Tambah data</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($list_user as $list) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $list['nama']; ?></td>
                                <td><?= $list['username']; ?></td>
                                <td><?= $list['nama_user']; ?></td>
                                <td><a href="" class="btn btn btn-primary">Edit</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Selesai Disini -->

</div>
<!-- /.container-fluid -->



<?= $this->endsection(); ?>