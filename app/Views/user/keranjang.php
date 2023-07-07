<?= $this->extend('user/layout/templateDaftarBarang'); ?>
<?= $this->section('content'); ?>

<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow mb-4" style="margin-top: 20px;">

        <div class=" card-body">
            <div class="responsive">
                <h2 class="my-3 ml-3">Keranjang</h2>
                <table class="table ml-1 mr-1 ">
                    <thead>
                        <tr>
                            <th hidden>id keranjang</th>
                            <th>id_barang</th>
                            <th>Nama</th>
                            <th>jumlah</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($keranjang as $p) : ?>
                            <tr>

                                <td hidden><?= $p['id'] ?></td>
                                <td><small><?= $p['id_barang'] ?></small></td>
                                <td><small><?= $p['nama'] ?></small></td>
                                <td><small><?= $p['jumlah'] ?></small></td>
                                <td>
                                    <?php if ($p['status'] === 'beli') : ?>
                                        <small class="text-success"><?= $p['status'] ?></small>
                                    <?php else : ?>
                                        <small class="text-secondary"><?= $p['status'] ?></small>
                                    <?php endif ?>
                                </td>

                                <td>
                                    <?php if ($p['status'] === 'beli') : ?>
                                        <a href="<?= base_url('user/ubahkeranjang/' . $p['id'] . '/tunda') ?>" class="btn btn-sm btn-outline-secondary">Tunda</a>
                                    <?php else : ?>
                                        <a href="<?= base_url('user/ubahkeranjang/' . $p['id'] . '/beli') ?>" class="btn btn-sm btn-outline-success">Beli</a>
                                    <?php endif ?>


                                    <a href="<?= base_url('user/hapuskeranjang/' . $p['id'] . '/delete') ?>" class="btn btn-sm btn-outline-danger">Batalkan</a>
                                </td>



                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>

            </div>
        </div>
        <a href="<?= base_url('user/keranjangpembayaran') ?>" class="btn btn-success">Kasir</a>
    </div>





    <?= $this->endSection() ?>