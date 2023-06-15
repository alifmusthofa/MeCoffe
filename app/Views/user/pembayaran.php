<?= $this->extend('user/layout/templateDetail'); ?>
<?= $this->section('content'); ?>

<div class="card" style="background :sandybrown">
    <h5 class="card-header">Data Diri</h5>
    <div class="card-body">
        <h5 class="card-title">Nama</h5>
        <produk class="card-text">Lila</produk>
        <h5 class="card-title">Nomor</h5>
        <produk class="card-text">08950408435</produk>
        <h5 class="card-title">Alamat</h5>
        <produk class="card-text">Jln. Sultan Agung RT 20 RW 07</produk>
    </div>
</div>

<div class="card" style="background :sandybrown">
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


            <tr>

                <td hidden><?= $produk['id'] ?></td>
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
                    <p><?= $jumlah ?></p>
                </td>
                <td>
                    <p class="text">
                        <?php if (($produk['promo']) == 0)
                            echo "RP. " . $produk['harga'] ?>
                        <?php if (($produk['promo']) > 0)
                            echo "RP. " . $produk['harga'] - ($produk['harga'] * ($produk['promo'] / 100)) ?>
                    </p>
                </td>
                <td>
                    <p class="text">
                        <?php if (($produk['promo']) == 0)
                            echo "RP. " . $produk['harga'] * $jumlah ?>
                        <?php if (($produk['promo']) > 0)
                            echo "RP. " . ($produk['harga'] - ($produk['harga'] * ($produk['promo'] / 100))) * $jumlah ?>
                    </p>
                </td>
            </tr>


        </tbody>
    </table>
    <h5 class="card-footer">TOTAL PEMBAYARAN : <?php if (($produk['promo']) == 0)
                                                    echo "RP. " . $produk['harga'] * $jumlah ?>
        <?php if (($produk['promo']) > 0)
            echo "RP. " . ($produk['harga'] - ($produk['harga'] * ($produk['promo'] / 100))) * $jumlah ?></h5>
</div>

<div class="card" style="background :sandybrown">
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
<div>
    <form class="form-outline" action="<?= base_url('/user/listBarang/') ?>" method="post" enctype="multipart/form-data">

        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Chekout</button>
        </div>
    </form>
</div>
<div>

</div>



<?= $this->endSection() ?>