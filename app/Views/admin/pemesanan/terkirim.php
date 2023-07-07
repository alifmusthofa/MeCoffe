<?= $this->extend('admin/Layout/template'); ?>
<?= $this->section('content'); ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="responsive">
            <h2 class="my-3 ml-3">Pemesanan Terkirim</h2>
            <table class="table ml-1 mr-1 ">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Waktu Pesan</th>
                        <th>Waktu Kirim</th>
                        <th>id_user</th>
                        <th>id_barang</th>
                        <th>id_transaksi</th>
                        <th>jumlah</th>
                        <th>harga</th>
                        <th>totalharga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($daftarpembelian as $p) : ?>
                    <tr>

                        <td><?= $p['id'] ?></td>
                        <td><small><?= $p['created_at'] ?></small></td>
                        <td><small><?= $p['updated_at'] ?></small></td>
                        <td><?= $p['id_user'] ?></td>
                        <td><small><?= $p['id_barang'] ?></small></td>
                        <td><small><?= $p['id_transaksi'] ?></small></td>
                        <td><small><?= $p['jumlah'] ?></small></td>
                        <td><small><?= $p['harga'] ?></small></td>
                        <td><small><?= $p['totalharga'] ?></small></td>
                        <td> <a href="<?= base_url('admin/terkirim/' . $p['id'] . '/kembalikan') ?>"
                                onclick="return confirm('Apakah kamu yakin akan mengembalikan proses pengiriman nomor id : <?= $p['id'] ?> ?');"
                                class="btn btn-sm btn-outline-danger">Kembalikan</a>
                        </td>

                    </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
            <?php echo $pager->links('bootstrap', 'bootstrap_pagination') ?>
        </div>
    </div>



    <?= $this->endSection(); ?>