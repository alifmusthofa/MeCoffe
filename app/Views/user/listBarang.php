<?= $this->extend('user/layout/templateDaftarBarang'); ?>
<?= $this->section('content'); ?>

<?php



$session = session();
$pembelian = $session->getFlashdata('pembelian');
?>

<?php if ($pembelian) { ?>
<div class="konfirmasi">
    <div class="card" style="background-color: darkkhaki;">
        <h1>Terima Kasih Telah Membeli Produk Kami!</h1>
        <img src="thank-you-image.png" alt="Thank You" class="thank-you-image">
        <p style="margin-bottom: 10px;">Pesanan Anda telah berhasil diproses.</p>
        <p>Silakan tunggu konfirmasi dari kami.</p>
    </div>
</div>
<?php } ?>






<?php $nomer = 0 ?>
<?php $idtransaksi = "" ?>

<?php foreach ($hasil as $p) : ?>
<?php
    $string = $p['created_at'];
    $timestamp = strtotime($string);
    $newString = date("H:i d-m-Y", $timestamp);
    ?>

<!-- if -->
<?php if ($idtransaksi != $p['id_transaksi']) :   ?>
<?php if ($idtransaksi != "") :   ?>
</div>
</div>
</div>
</div>
<?php endif; ?>


<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapse<?= $nomer ?>" aria-expanded="false"
                aria-controls="flush-collapse<?= $nomer ?>">
                <h4>
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

                <!-- else-->

                <?php endif; ?>


                <p>papap</p>



                <?php endforeach ?>






                <?= $this->endSection() ?>