<h1>Form Tambah Barang</h1>
<form action="<?php echo base_url();?>index.php/jenis_barang/addsave" method="POST">
        jenis_barang:<input type="teks" name="jenis_barang" value="<?php echo $jenis_barang; ?>"><br>
        keterangan : <textarea name="ket"><?php echo $ket;?></textarea><br>
<button type="submit">Simpan</button>
</form>