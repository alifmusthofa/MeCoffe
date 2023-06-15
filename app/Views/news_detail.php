<?= $this->extend('layout/post_layout') ?>

<?= $this->section('content') ?>
<div class="content">
    <h2 class="h2"><?= $news['title'] ?></h2>
    <h2 class="h2"><?= $news['title'] ?></h2>
    <div class="mb-5">
        <span><?= $news['created_at'] ?></span>
    </div>
    <div><?= $news['content'] ?></div>
</div>


<?= $this->endSection() ?>