<?= $this->extend('admin/Layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <h1>Ukuran</h1>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-5">
                <?= $this->include('admin/categories/form') ?>
            </div>

            <div class="col-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Ukuran</h3>
                        <div class="card-tools">
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th style="width:15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($categories as $category) : ?>
                                    <tr>
                                        <td><?= $category->id ?></td>
                                        <td><?= $category->name ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/categories/' . $category->id) ?>" class="badge bg-info">edit</a>
                                            <!-- <a href=" //site_url('admin/categories/delete/'. $category->id) "
                                            class="badge bg-danger delete-item">delete</a> -->
                                            <form method="POST" action="<?= site_url('admin/categories/' . $category->id) ?>" accept-charset="UTF-8" class="delete" style="display:inline-block">
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="badge bg-danger" style="border:none !important">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <?php echo $pager->links('bootstrap', 'bootstrap_pagination')
                        ?>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->



<?= $this->endSection(); ?>