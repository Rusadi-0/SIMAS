<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_model extends CI_Model
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
    public function getSM()
    {
        $query = "SELECT * 
                  FROM `surat_masuk` 
                  ORDER BY `surat_masuk`.`id` 
                  DESC
                ";
        return $this->db->query($query)->row_array();
    }
    public function getSurat()
    {
        $query = "SELECT * 
                  FROM `surat_masuk` ORDER BY `surat_masuk`.`noAgenda` 
                  DESC
                ";
        return $this->db->query($query)->row_array();
    }
    public function hitungJumlahAsset()
    {
        $query = $this->db->get('surat_keluar');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function hitungJumlahMasuk()
    {
        $query = $this->db->get('surat_masuk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function hitungJumlahDisposisi()
    {
        $query = "SELECT * FROM `surat_masuk` WHERE dibaca='1'AND melihat='1' AND baruDisposisi ='0'";
        if ($this->db->query($query)->num_rows() > 0) {
            return $this->db->query($query)->num_rows();
        } else {
            return 0;
        }
    }
    public function hitungJumlahBelum()
    {
        $query = "SELECT * FROM `surat_masuk` WHERE dibaca ='0'";
        if ($this->db->query($query)->num_rows() > 0) {
            return $this->db->query($query)->num_rows();
        } else {
            return 0;
        }
    }
}
