<?= $this->extend('admin/Layout/template'); ?>
<?= $this->section('content'); ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="responsive">
            <h2 class="my-3 ml-3">Produk</h2>
            <nav class="navbar navbar-light  justify-content-between">
                <a class="btn btn-primary mb-3" href="<?= base_url('admin/produk/new') ?>" role="button">Tambahkan</a>
                <form class="form-inline" action="<?= base_url('admin/produk/search') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
            <table class="table ml-1 mr-1 ">
                <thead>
                    <tr>
                        <th hidden>#</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>ukuran</th>
                        <th>berat</th>
                        <th>stok</th>
                        <th>promo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($produk as $p) : ?>
                        <tr>

                            <td hidden><?= $p['id'] ?></td>
                            <td>
                                <strong><?= $p['nama'] ?></strong><br>
                                <small class="text-muted">Rp. <?= $p['harga'] ?></small>
                            </td>
                            <td style="width: 45%"><small><?= $p['deskripsi'] ?></small></td>
                            <td><small><?= $p['ukuran'] ?></small></td>
                            <td><small><?= $p['berat'] ?></small></td>
                            <td>
                                <?php if (($p['stok']) < 20) : ?>
                                    <p class="text-danger"><?php echo $p['stok']; ?></p>
                                <?php else : ?>
                                    <p><?php echo $p['stok']; ?></p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (($p['promo']) > 0) : ?>
                                    <p class="text-warning"><?php echo $p['promo']; ?></p>
                                <?php else : ?>
                                    <p><?php echo $p['promo']; ?></p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($p['status'] === 'jual') : ?>
                                    <small class="text-success"><?= $p['status'] ?></small>
                                <?php else : ?>
                                    <small class="text-muted"><?= $p['status'] ?></small>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/produk/' . $p['id'] . '/preview') ?>" class="btn btn-sm btn-outline-secondary" target="_blank">Preview</a>
                                <a href="<?= base_url('admin/produk/' . $p['id'] . '/edit') ?>" class="btn btn-sm btn-outline-warning">Edit</a>
                                <a href="<?= base_url('admin/produk/' . $p['id'] . '/delete') ?>" onclick="return confirm('Apakah kamu yakin akan menghapus produk <?= $p['nama'] ?> ?');" class="btn btn-sm btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>

        </div>
    </div>


    <?= $this->endSection(); ?>