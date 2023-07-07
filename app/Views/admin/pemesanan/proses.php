<?= $this->extend('admin/Layout/template'); ?>
<?= $this->section('content'); ?>

<!-- DataTales Example -->
<?php
$session = session();
$gagalStok = $session->getFlashdata('gagal');
?>
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="responsive">
            <h2 class="my-3 ml-3">Pemesanan Proses</h2>
            <h4 class="my-3 ml-3">Jumlah pesananan : <?php echo $jumlah->total ?></h4>
            <?php if ($gagalStok) { ?>
                <h4 class="my-3 ml-3" style="color:red"><?php echo $gagalStok ?></h4>
            <?php } ?>
            <table class="table ml-1 mr-1 ">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Waktu Pesan</th>
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
                            <td><?= $p['id_user'] ?></td>
                            <td><small><?= $p['id_barang'] ?></small></td>
                            <td><small><?= $p['id_transaksi'] ?></small></td>
                            <td><small><?= $p['jumlah'] ?></small></td>
                            <td><small><?= $p['harga'] ?></small></td>
                            <td><small><?= $p['totalharga'] ?></small></td>
                            <td> <a href="<?= base_url('admin/pemesanan/' . $p['id'] . '/done') ?>" class="btn btn-sm btn-outline-success">Done</a>
                            </td>



                            <td hidden><small><?= $p['updated_at'] ?></small></td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
            <?php echo $pager->links('bootstrap', 'bootstrap_pagination') ?>
        </div>
    </div>



    <?= $this->endSection(); ?>