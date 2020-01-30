<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Form Edit</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="<?= site_url('tahun/edit') ?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tahun">Nama tahun</label>
                                <input type="hidden" id="id" name="id" value="<?= $tahun->id_tahun ?>">
                                <input type="text" class="form-control" name="tahun" id="tahun" value="<?= $tahun->tahun ?>" placeholder="Nama tahun">
                                <?php if (form_error('tahun')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= form_error('tahun') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <textarea class="form-control" name="ket" id="ket" cols="30" rows="3"><?= $tahun->ket_tahun ?></textarea>
                            </div>
                            <div class="form-group">
                                <a href="<?= site_url('tahun') ?>" class="btn btn-info float-left">Kembali</a>
                                <button class="btn btn-success float-right" type="submmit">Simpan</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>