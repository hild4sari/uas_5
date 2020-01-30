<div class="row">
    <div class="sixteen wide column">
        <div class="ui segment">
            <form action="<?= site_url('tahun/tambah') ?>" method="POST" class="ui form">
                <div class="field">
                    <label>Tahun</label>
                    <input type="text" name="tahun" placeholder="tahun" value="<?= set_value('tahun') ?>">
                    <?php if (form_error('tahun')) : ?>
                        <div class="ui red pointing label">
                            <?= form_error('tahun') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="field">
                    <label>Keterangan</label>
                    <textarea rows="2" name="ket" placeholder="Keterangan"></textarea>
                </div>
                <a href="<?= site_url('tahun') ?>" class="ui red animated button" tabindex="0">
                    <div class="visible content">Kembali</div>
                    <div class="hidden content">
                        <i class="left arrow icon"></i>
                    </div>
                </a>
                <button class="ui green button" type="submit">Tambah</button>
            </form>
        </div>
    </div>
</div>