<?php

class input_model extends CI_ModeL
{

    public function insert_data_jawaban($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function insert_data_mahasiswa($data)
    {
        $this->db->insert("mahasiswa", $data);
    }
    public function fetch_data2()
    {
        //$query = $this->db->get("admin");
        $query = $this->db->query("SELECT * FROM pertanyaan JOIN kategori ON kategori.id_kategori = pertanyaan.id_kategori  ORDER BY id_pertanyaan ASC");
        return $query;
    }

    public function count($table)
    {
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    public function countPertanyaanKategori($table, $id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    public function h($kate)
    {
        $query = $this->db->query("SELECT jawaban FROM `hasil`JOIN pertanyaan on pertanyaan.id_pertanyaan = hasil.id_pertanyaan WHERE pertanyaan.id_kategori = '$kate'");
        return $query;
    }

    public function hitungProdi($where)
    {
        $this->db->select('COUNT(npm) as prodi');
        $this->db->from('mahasiswa');
        $this->db->where('id_prodi', $where);
        $query = $this->db->get();
        foreach ($query->result() as $r) {
            return $r->prodi;
        }
    }

    public function hitungFakultas($where)
    {
        $this->db->select('COUNT(npm) as prodi');
        $this->db->from('mahasiswa');
        $this->db->where('id_fakultas', $where);
        $query = $this->db->get();
        foreach ($query->result() as $r) {
            return $r->prodi;
        }
    }


    public function hasil()
    {
        return $this->db->get('hasil');
    }


    public function getnpm()
    {
        $query = $this->db->query("SELECT DISTINCT npm FROM hasil;");
        return $query;
    }

    public function getnpmwhere($npm)
    {
        $query = $this->db->query("SELECT * FROM `hasil` JOIN mahasiswa ON mahasiswa.npm = hasil.npm JOIN prodi ON mahasiswa.id_prodi = prodi.id_prodi JOIN fakultas ON mahasiswa.id_fakultas = fakultas.id_fakultas WHERE hasil.npm = '$npm'");
        return $query;
    }

    public function pertanyaan()
    {
        return $this->db->get('pertanyaan');
    }

    public function getdatapertanyaanjwb()
    {
        $this->db->join('hasil b', 'b.id_pertanyaan= a.id_pertanyaan');
        $this->db->where('b.npm', '17.0504.0078');
        return $this->db->get('pertanyaan a')->result_array();
    }

    public function datatable($table)
    {
        return $this->db->get($table);
    }

    public function getnilai($jwb, $id)
    {
        $query = $this->db->query("SELECT count(id_hasil) AS hasil FROM `hasil`WHERE id_pertanyaan = '$id' AND jawaban ='$jwb'");
        return $query;
    }

    public function delete()
    {
        $this->db->truncate('hasil');
        $this->db->empty_table('mahasiswa');
    }

    public function dataPertanyaan($where)
    {
        $this->db->select('*');
        $this->db->from('pertanyaan');
        $this->db->where('id_kategori', $where);
        return $query = $this->db->get();
    }

    public function detailHasil($id)
    {
        $this->db->join('pertanyaan b', 'b.id_pertanyaan = a.id_pertanyaan');
        $this->db->join('mahasiswa c', 'c.npm = a.npm');
        $this->db->join('prodi d', 'c.id_prodi = d.id_prodi');
        $this->db->join('fakultas e', 'c.id_fakultas = e.id_fakultas');
        $this->db->join('kategori f', 'f.id_kategori = b.id_kategori');
        $this->db->where('a.npm', $id);
        return $this->db->get('hasil a')->result_array();
    }

    public function grafikKategori($where, $hasil)
    {
        $query = $this->db->query("SELECT count(id_hasil) AS hasil FROM `hasil` JOIN pertanyaan ON pertanyaan.id_pertanyaan = hasil.id_pertanyaan WHERE jawaban = '$hasil' AND pertanyaan.id_kategori = '$where'");
        return $query;
    }

    // SELECT count(id_hasil) AS hasil FROM `hasil` JOIN pertanyaan ON pertanyaan.id_pertanyaan = hasil.id_pertanyaan WHERE jawaban = 'Cukup Puas' AND pertanyaan.id_pertanyaan = '24';
}
