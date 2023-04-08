<?php
    namespace App\Controllers;
    use App\Models\Modeldosen;

    class dosen extends BaseController
    {
        public function index()
        {
            $Modeldosen = new Modeldosen();
            $pager = \Config\Services::pager();

            $data = array (
                'Modeldosen' => $Modeldosen->paginate(10, 'dosen'),
                'pager' => $Modeldosen->pager
            );

            return view('dosen', $data);
        }

        public function update($id)
        {
            $model = new Modeldosen();   
            $data['dosen'] = $model->getdosenById($id)->getRow();
            echo view('dosen_edit', $data);
        }

        public function edit()
        {
            $model = new Modeldosen();
            $id = $this->request->getPost('id_dosen');
            $data = array (
                'nama_dosen'  => $this->request->getPost('nama_dosen'),
                'nidn' => $this->request->getPost('nidn'),
                'alamat_rumah' => $this->request->getPost('alamat_rumah'),
            );
            $model->updatedosen($data, $id);
            return redirect()->to('/dosen');

        }

        public function delete($id)
        {
            $model = new Modeldosen();
            $model->deletedosen($id);
            return redirect()->to('/dosen');
        }

        public function input()
        {
            echo view('dosen_input');
        }

        public function insert()
        {
            $model = new Modeldosen();
            //$id = $this->request->getPost('id');
            $data = array (
                'nama_dosen'  => $this->request->getPost('nama_dosen'),
                'nidn' => $this->request->getPost('nidn'),
                'alamat_rumah' => $this->request->getPost('alamat_rumah'),
            );
            $model->insertdosen($data);
            return redirect()->to('/dosen');   
        }

    }
    

?>