<?php namespace App\Models;

use CodeIgniter\Model;

class Modelpetugas_kampus extends Model
{
    //table name
    protected $table = "petugaskampus";

    //allowed fields
    protected $allowedFields = 
    [
        'nama',
        'jabatan',
        'no_hp'
    ];

    public function getpetugas_kampus()
    {
        return $this->findAll();
    }


    public function getpetugas_kampusById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id_petugas' => $id]);
        }   
    }
	
	public function updatepetugas_kampus($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_petugas' => $id));
        return $query;
    }
	
	public function deletepetugas_kampus($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_petugas' => $id));
        return $query;
    }

    public function insertpetugas_kampus($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>