<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Mulai Disini -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
    </div>
    <form action="/user/save" method="post">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username'); ?>" ?>
            <div class="invalid-feedback">
                <?= $validation->getError('username'); ?>
            </div>
        </div>
        <div class=" form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role">
                <option value="2">Supervisor</option>
                <option value="3">Manager</option>
                <option value="4">Petani</option>
                <option value="1">Admin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">
            <div class="invalid-feedback">
                <?= $validation->getError('password'); ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <!-- Selesai Disini -->

</div>
<!-- /.container-fluid -->



<?= $this->endsection(); ?>