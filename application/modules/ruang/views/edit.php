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
                <form action="<?= site_url('ruang/edit') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="ruang">Nama Ruangan</label>
                                <input type="text" class="form-control" name="ruang" id="ruang" value="<?= $ruang->nama_ruangan ?>" placeholder="Nama Barang">
                                <?php if (form_error('ruang')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= form_error('ruang') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="fungsi">Fungsi Ruangan</label>
                                <textarea name="fungsi" class="form-control" id="fungsi" cols="30" rows="2" placeholder="Fungsi Ruangan"><?= $ruang->fungsi_ruangan ?></textarea>
                                <?php if (form_error('ruang')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= form_error('ruang') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="luas">Luas Ruangan</label>
                                <input type="text" name="luas" id="luas" class="form-control" placeholder="Luas Ruangan" value="<?= $ruang->luas ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gambar"><img class="img-fluid" src="<?= base_url('assets/img/ruangan/') . $ruang->gbr_ruangan ?>" id="output"></label>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <a href="<?= site_url('ruang') ?>" class="btn btn-info float-left">Kembali</a>
                                <button class="btn btn-success float-right" type="submit">Simpan</button>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $ruang->id_ruangan ?>">
                        <input type="hidden" name="gambarLama" value="<?= $ruang->gbr_ruangan ?>">
                </form>
            </div>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>