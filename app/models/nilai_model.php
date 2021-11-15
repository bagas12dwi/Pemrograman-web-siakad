<?php

class nilai_model{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
        
    }
    
    public function tambahDataPenilaian($data)
    {
        $query = "INSERT INTO nilai VALUES ('', :jenis_penilaian, :id_siswa, :nama_siswa, :id_kelas, :id_guru, :semester, :id_mapel, :nilai, :is_save)";
        $this->db->query($query);
        $this->db->bind('jenis_penilaian', $data['jenis_penilaian']);
        $this->db->bind('id_siswa', $data['id_siswa']);
        $this->db->bind('nama_siswa', $data['nama_siswa']);
        $this->db->bind('id_kelas', $data['id_kelas']);
        $this->db->bind('id_guru', $data['id_guru']);
        $this->db->bind('semester', $data['semester']);
        $this->db->bind('id_mapel', $data['id_mapel']);
        $this->db->bind('nilai', $data['nilai']);
        $this->db->bind('is_save', false);
        $this->db->execute();

        $count = $this->db->hitungBaris();

        return $count;
    }

    public function getNilaiByIdSiswa($id)
    {
        $this->db->query("SELECT nilai.id, nilai.jenis_penilaian, mapel.nama_mapel, nilai.nilai FROM nilai JOIN mapel ON nilai.id_mapel = mapel.id WHERE id_siswa = $id AND is_save = 0;");
        return $this->db->resultSet();
    }

    public function updateIsSave()
    {
        
    }
}