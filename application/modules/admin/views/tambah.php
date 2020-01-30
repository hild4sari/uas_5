<div class="row">
    <div class="sixteen wide column">
        <div class="ui segment">
            <form action="<?= site_url('admin/tambah') ?>" method="POST" class="ui form">
                <div class="field">
                    <label>Username</label>
                    <input type="text" name="user" placeholder="Username">
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="text" name="pass" placeholder="Password">
                </div>
                <a href="<?= site_url('admin') ?>" class="ui red animated button" tabindex="0">
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