<div class="row">
    <div class="sixteen wide column">
        <div class="ui segment">
            <form action="<?= site_url('admin/edit') ?>" method="post" class="ui form">
                <div class="field">
                    <input type="hidden" name="id" value="<?= $user->id_user ?>">
                    <label>Username</label>
                    <input type="text" name="user" value="<?= $user->username ?>">
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="text" name="pass" value="<?= $user->password ?>">
                </div>
                <a href="<?= site_url('admin') ?>" class="ui red animated button" tabindex="0">
                    <div class="visible content">Kembali</div>
                    <div class="hidden content">
                        <i class="left arrow icon"></i>
                    </div>
                </a>
                <button class="ui green button" type="submit">Ubah</button>
            </form>
        </div>
    </div>
</div>