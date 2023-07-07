<?= $this->extend('user/layout/templateDetail'); ?>
<?= $this->section('content'); ?>

<?php
$session = session();
$pembelian = $session->getFlashdata('pembelian');
?>

<?php if ($pembelian) { ?>
<div class="konfirmasi">
    <div class="card" style="background-color: #512E02;">
        <h1>Terima Kasih Telah Membeli Produk Kami!</h1>
        <img src="<?= base_url('img/tanda.png'); ?>" alt="Thank You" class="thank-you-image"
            style="max-height: 50px;max-width: 50px;">
        <p style="margin-bottom: 10px;color:white">Pesanan Anda telah berhasil diproses.</p>
        <p style="color:white">Silakan tunggu konfirmasi dari kami.</p>
    </div>
</div>
<?php } ?>

<?php $nomer = 0 ?>
<?php $idtransaksi = "" ?>
<br>
<h2>Daftar pembelian</h2>
<?php foreach ($hasil as $p) : ?>
<?php
    $string = $p['created_at'];
    $timestamp = strtotime($string);
    $newString = date("H:i d-m-Y", $timestamp);
    ?>

<!-- if -->
<?php if ($idtransaksi != $p['id_transaksi']) :   ?>
<?php if ($idtransaksi != "") :   ?>
</table>
</div>
</div>
<?php endif; ?>

<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapse<?= $nomer ?>" aria-expanded="false"
                aria-controls="flush-collapse<?= $nomer ?>">
                <h4 class="accordion-title">
                    <?= $nomer += 1; ?>.&nbsp;
                    Nomor ID : <?= $p['id'] ?>&nbsp;
                    METODE : <?= $p['metodePembayaran'] ?>&nbsp;
                    TOTAL PEMBELIAN : RP. <?= $p['totalpembelian'] ?>&nbsp;
                    <?= $newString ?>&nbsp;&nbsp;
                </h4>
            </button>
        </h2>
        <div id="flush-collapse<?= $nomer - 1 ?>" class="accordion-collapse collapse"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <?php $idtransaksi = $p['id_transaksi'] ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $p['nama'] ?></td>
                            <td><?= $p['jumlah'] ?></td>
                            <td><?= $p['harga'] ?></td>
                            <td><?= $p['totalharga'] ?></td>
                        </tr>
                        <?php else : ?>
                        <tr>
                            <td><?= $p['nama'] ?></td>
                            <td><?= $p['jumlah'] ?></td>
                            <td><?= $p['harga'] ?></td>
                            <td><?= $p['totalharga'] ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>