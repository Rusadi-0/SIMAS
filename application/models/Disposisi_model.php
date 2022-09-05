<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi_model extends CI_Model
{
    public function getSuratMasuk()
    {
        $query = "SELECT * 
                  FROM `surat_masuk` 
                  ORDER BY `surat_masuk`.`id` 
                  DESC
                ";
        return $this->db->query($query)->result_array();
    }
    public function getSurat()
    {
        $query = "SELECT * FROM `surat_masuk` WHERE dibaca='0' ORDER BY `surat_masuk`.`dibaca` DESC";
        return $this->db->query($query)->row_array();
    }
    public function getSuratKaban()
    {
        $query = "SELECT * FROM `surat_masuk` WHERE dibaca='0' ORDER BY `surat_masuk`.`dibaca` DESC";
        return $this->db->query($query)->result_array();
    }
    public function getSuratMelihat()
    {
        $query = "SELECT * FROM `surat_masuk` WHERE melihat='0' ORDER BY `surat_masuk`.`melihat` DESC";
        return $this->db->query($query)->row_array();
    }
    public function getSuratTerlihat()
    {
        $query = "SELECT * FROM `surat_masuk` WHERE melihat='0' ORDER BY `surat_masuk`.`melihat` DESC";
        return $this->db->query($query)->result_array();
    }
    public function getDisposisi($id)
    {
        $query = "SELECT * FROM `lembar_disposisi` WHERE id='$id';";
        return $this->db->query($query)->row_array();
    }
    public function getPejabat()
    {
        $query = "SELECT * FROM `pejabat`";
        return $this->db->query($query)->result_array();
    }


}
