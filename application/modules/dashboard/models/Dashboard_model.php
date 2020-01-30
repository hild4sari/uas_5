<?php
class Dashboard_model extends CI_Model
{
    public function join()
    {
        return $this->db->query("SELECT inventaris.nama_barang,inventaris.id_inv,inventaris.merek,inventaris.nilai_wajar,jenis.*,sumber.*,kondisi.*,tahun.*,ruang.* FROM inventaris INNER JOIN jenis on inventaris.id_jenis=jenis.id_jenis INNER JOIN sumber on inventaris.id_sumber=sumber.id_sumber INNER JOIN kondisi on inventaris.id_kondisi=kondisi.id_kondisi INNER JOIN tahun on inventaris.id_tahun=tahun.id_tahun INNER JOIN ruang on inventaris.id_ruangan=ruang.id_ruangan GROUP BY inventaris.nama_barang,inventaris.id_ruangan,inventaris.merek,inventaris.merek ORDER BY id_inv ASC")->result();
    }
    function fetch_data()
    {

        $query = $this->db->query("SELECT inventaris.nama_barang,inventaris.id_inv,inventaris.merek,inventaris.nilai_wajar,jenis.*,sumber.*,kondisi.*,tahun.*,ruang.* FROM inventaris INNER JOIN jenis on inventaris.id_jenis=jenis.id_jenis INNER JOIN sumber on inventaris.id_sumber=sumber.id_sumber INNER JOIN kondisi on inventaris.id_kondisi=kondisi.id_kondisi INNER JOIN tahun on inventaris.id_tahun=tahun.id_tahun INNER JOIN ruang on inventaris.id_ruangan=ruang.id_ruangan GROUP BY inventaris.nama_barang,inventaris.id_ruangan,inventaris.merek,inventaris.merek ORDER BY id_inv ASC");

        return $query->result();
    }
}
