<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Data</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Form Tambah</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="<?= site_url('inventaris/tambah') ?>" method="POST" class="ui form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inv">Nama Barang</label>
                                <input type="text" class="form-control" name="inv" id="inv" value="<?= set_value('inv') ?>" placeholder="Nama Barang">
                                <?php if (form_error('inv')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= form_error('inv') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="kode">Kode Inventaris</label>
                                <input type="text" class="form-control" name="kode" id="kode" value="<?= set_value('kode') ?>" placeholder="Kode Inventaris">
                                <?php if (form_error('kode')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= form_error('kode') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="merek">Merek</label>
                                <input class="form-control" type="text" name="merek" id="merek" placeholder="Merek">
                            </div>
                            <div class="form-group">
                                <label for="seri">Seri</label>
                                <input class="form-control" type="text" name="seri" id="seri" placeholder="No Seri">
                            </div>
                            <div class="form-group">
                                <label for="nilai">Nilai Wajar</label>
                                <input class="form-control" type="text" name="nilai" id="nilai" placeholder="Nilai Wajar">
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <select class="form-control form-control-sm select2" style="width: 100%;" name="kondisi" id="kondisi">
                                    <option>Pilih Kondisi</option>
                                    <?php foreach ($kondisi as $ruangs) : ?>
                                        <option value="<?= $ruangs->id_kondisi ?>"><?= $ruangs->kondisi ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (form_error('kondisi')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= form_error('kondisi') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select class="form-control form-control-sm select2" style="width: 100%;" name="tahun" id="tahun">
                                    <option>Pilih Tahun</option>
                                    <?php foreach ($tahun as $ruangs) : ?>
                                        <option value="<?= $ruangs->id_tahun ?>"><?= $ruangs->tahun ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (form_error('tahun')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= form_error('tahun') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="ruang">Ruangan</label>
                                <select class="form-control form-control-sm select2" style="width: 100%;" name="ruang" id="ruang">
                                    <option>Pilih Ruangan</option>
                                    <?php foreach ($ruang as $ruangs) : ?>
                                        <option value="<?= $ruangs->id_ruangan ?>"><?= $ruangs->nama_ruangan ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (form_error('ruang')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= form_error('ruang') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="sumber">Sumber</label>
                                <select class="form-control form-control-sm select2" style="width: 100%;" name="sumber" id="sumber">
                                    <option>Pilih Sumber</option>
                                    <?php foreach ($sumber as $ruangs) : ?>
                                        <option value="<?= $ruangs->id_sumber ?>"><?= $ruangs->sumber ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (form_error('sumber')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= form_error('sumber') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select class="form-control form-control-sm select2" style="width: 100%;" name="jenis" id="jenis">
                                    <option>Pilih Jenis</option>
                                    <?php foreach ($jenis as $ruangs) : ?>
                                        <option value="<?= $ruangs->id_jenis ?>"><?= $ruangs->jenis ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (form_error('jenis')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= form_error('jenis') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gambar"><img class="img-fluid" src="<?= base_url() ?>assets/img/noimage.png" id="output"></label>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <a href="<?= site_url('inventaris') ?>" class="btn btn-info float-left">Kembali</a>
                                <button class="btn btn-success float-right" type="submit">Tambah</button>
                            </div>
                        </div>
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