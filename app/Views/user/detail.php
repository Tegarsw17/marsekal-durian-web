<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Mulai Disini -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail <?= $list_user[0]['nama']; ?></h1>
    </div>
    <div class="card mb-3" style="max-width: 600px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="https://picsum.photos/200/300" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="font-size:large;">Username : <?= ucfirst($list_user[0]['username']); ?></li>
                        <li class="list-group-item" style="font-size:large;">Nama : <?= $list_user[0]['nama']; ?></li>
                        <li class="list-group-item" style="font-size:large;">Role : <?= ucfirst($list_user[0]['nama_user']); ?></li>
                        <li class="list-group-item">
                            <a href="/user/edit/<?= $list_user[0]['id']; ?>" class="btn btn-success">Edit</a>

                            <form action="/user/<?= $list_user[0]['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin menghapus?');">Hapus</button>
                            </form>
                            <br><br>
                            <a href="/user" class="text-primary" style="font-size:medium;">Kembali ke daftar user</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Selesai Disini -->

</div>
<!-- /.container-fluid -->



<?= $this->endsection(); ?>