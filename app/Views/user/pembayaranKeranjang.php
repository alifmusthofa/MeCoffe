<?= $this->extend('user/layout/templateDetail'); ?>
<?= $this->section('content'); ?>
<div>
    <form class="form-outline" action="<?= base_url('/user/listBarangkeranjang/') ?>" method="post" enctype="multipart/form-data">

        <div class="card" style="background :#DDD4CD">
            <h5 class="card-header">Data Diri</h5>
            <div class="card-body">
                <h5 class="card-title">Nama</h5>
                <produk class="card-text"><?= $user['username'] ?></produk>
                <h5 class="card-title">Nomor</h5>
                <produk class="card-text"><?= $user['nomor'] ?></produk>
                <h5 class="card-title">Alamat</h5>
                <produk class="card-text"><?= $user['alamat'] ?></produk>
            </div>
        </div>

        <div class="card" style="background :#DDD4CD">
            <h5 class="card-header">Produk</h5>
            <table class="table" style="padding: 30px;">
                <thead>
                    <tr>
                        <th hidden>#</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>ukuran</th>
                        <th>berat</th>
                        <th>jumlah</th>
                        <th>harga</th>
                        <th>total harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalPembayaran = 0; ?>
                    <?php foreach ($keranjang as $produk) : ?>
                        <tr>

                            <td hidden><?= $produk['id'] ?></td>
                            <input type="number" name="id_product" value="<?= $produk['id'] ?>" class="id" hidden>
                            <td><img src="<?= base_url('assets/images/produk/' . $produk['id'] . '/' . $produk['gambar']); ?>" width="50">
                            </td>
                            <td>
                                <strong><?= $produk['nama'] ?></strong><br>
                            </td>
                            <td>
                                <p><?= $produk['ukuran'] ?></p>
                            </td>
                            <td>
                                <p><?= $produk['berat'] ?></p>
                            </td>
                            <td>
                                <p><?= $jumlah = $produk['jumlah'] ?></p>
                                <input type="number" name='jumlah' value="<?= $jumlah; ?>" hidden>
                            </td>
                            <td>
                                <?php if (($produk['promo']) == 0)
                                    $harga =  $produk['harga'] ?>
                                <?php if (($produk['promo']) > 0)
                                    $harga = ($produk['harga'] - ($produk['harga'] * ($produk['promo'] / 100))) ?>
                                <p class="text">RP. <?= $harga; ?></p>
                                <input type="number" name='harga' value="<?= $harga; ?>" hidden>
                            </td>
                            <td>
                                <?php if (($produk['promo']) == 0)
                                    $totalharga =  $produk['harga'] * $jumlah ?>
                                <?php if (($produk['promo']) > 0)
                                    $totalharga = ($produk['harga'] - ($produk['harga'] * ($produk['promo'] / 100))) * $jumlah ?>
                                <p class="text">RP. <?= $totalharga; ?></p>
                                <input type="number" name='Totalharga' value="<?= $totalharga; ?>" hidden>
                            </td>
                            <?php $totalPembayaran += $totalharga ?>
                            <input type="text" name='status' hidden>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>



            <h5 class="card-footer">TOTAL PEMBAYARAN : RP.
                <?= $totalPembayaran; ?>
            </h5>
            <input type="number" name='totalPembayaran' value="<?= $totalPembayaran; ?>" hidden>
        </div>

        <div class="card" style="background :#DDD4CD">
            <h5 class="card-header">Pilihan Pembayaran</h5>
            <div class="card-body">
                <div class="payment-options">

                    <ul style="align-items: baseline;">
                        <li class="list-group-item">
                            <div class="card-body">
                                <div class="d-flex">
                                    <input type="radio" name="payment" value="Paypay" class="payment-radio" aria-selected="true" checked>
                                    <img src="Paypay.png" class="payment-logo">
                                    <p class="card-text">Paypay</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="card-body">
                                <div class="d-flex">
                                    <input type="radio" name="payment" value="Mastercard" class="payment-radio">
                                    <img src="Mastercard.png" class="payment-logo">
                                    <p class="card-text">Mastercard</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="card-body">
                                <div class="d-flex">
                                    <input type="radio" name="payment" value="Visa" class="payment-radio">
                                    <img src="Visa.png" class="payment-logo">
                                    <p class="card-text">Visa</p>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="d-grid gap-2" style="margin: 20px;">
            <button class="btn btn-primary" type="submit">Chekout</button>
        </div>
    </form>
</div>




<?= $this->endSection() ?>