<?= $this->extend('user/layout/templateDaftarBarang'); ?>
<?= $this->section('content'); ?>

<div class="konfirmasi">
    <div class="card" style="background-color: darkkhaki;">
        <h1>Terima Kasih Telah Membeli Produk Kami!</h1>
        <img src="thank-you-image.png" alt="Thank You" class="thank-you-image">
        <p style="margin-bottom: 10px;">Pesanan Anda telah berhasil diproses.</p>
        <p>Silakan tunggu konfirmasi dari kami.</p>
    </div>
</div>




<?= $this->endSection() ?>