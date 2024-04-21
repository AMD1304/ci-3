<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu_model extends CI_Model
{
    public function hapusSub($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }
}
