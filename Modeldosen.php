<?php namespace App\Models;

use CodeIgniter\Model;

class Modeldosen extends Model
{
    //table name
    protected $table = "dosen";

    //allowed fields
    protected $allowedFields = 
    [
        'nama_dosen',
        'nidn',
        'alamat_rumah'
    ];

    public function getdosen()
    {
        return $this->findAll();
    }


    public function getdosenById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id_dosen' => $id]);
        }   
    }
	
	public function updatedosen($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_dosen' => $id));
        return $query;
    }
	
	public function deletedosen($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_dosen' => $id));
        return $query;
    }

    public function insertdosen($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>