<?php

class Mahasiswa_model extends CI_Model
{
    public function tampil_mhs()
    {
        return $this->db->get('mahasiswa')->result_array();
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nim" => $this->input->post('nim', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan')




        ];
        $this->db->insert('mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('mahasiswa',);
    }

    public function getMahasiswaById($id)
    {
        return  $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
    }
    public function ubahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nim" => $this->input->post('nim', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan')




        ];
        $this->db->where('id', $this->input->post('id'));

        $this->db->update('mahasiswa', $data);
    }

    public function cariDataMahasiswa()
    {
        $keywoard = $this->input->post('keywoard');
        $this->db->like('nama', $keywoard);
        $this->db->or_like('jurusan', $keywoard);
        $this->db->or_like('nim', $keywoard);
        $this->db->or_like('email', $keywoard);
        return $this->db->get('mahasiswa')->result_array();
    }
}
