<h1>Jenis Barang</h1>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis</th>
            <th>keterangan</th>
            <th><a href="<?php echo base_url();?>index.php/jenis_barang/add">Tambah Data</a></th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($jenis_barang as $baris){?>
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $baris->jenis_barang;?></td>
            <td><?php echo $baris->ket;?></td>
            <td><a href="<?php echo base_url();?>index.php/jenis_barang/delete/<?php echo $baris->id_jenisbarang;?>">Hapus</a> 
            <a href="<?php echo base_url();?>index.php/jenis_barang/update/<?php echo $baris->id_jenisbarang;?>">Ubah</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>