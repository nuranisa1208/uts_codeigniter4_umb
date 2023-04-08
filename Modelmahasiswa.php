<?php namespace App\Models;

use CodeIgniter\Model;

class Modelmahasiswa extends Model
{
    //table name
    protected $table = "mahasiswa";

    //allowed fields
    protected $allowedFields = 
    [
        'nim',
        'nama',
        'email'
    ];

    public function getmahasiswa()
    {
        return $this->findAll();
    }


    public function getmahasiswaById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id_mahasiswa' => $id]);
        }   
    }
	
	public function updatemahasiswa($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_mahasiswa' => $id));
        return $query;
    }
	
	public function deletemahasiswa($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_mahasiswa' => $id));
        return $query;
    }

    public function insertmahasiswa($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>