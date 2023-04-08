<?php
    namespace App\Controllers;
    use App\Models\Modelpetugas_kampus;

    class petugas_kampus extends BaseController
    {
        public function index()
        {
            $Modelpetugas_kampus = new Modelpetugas_kampus();
            $pager = \Config\Services::pager();

            $data = array (
                'Modelpetugas_kampus' => $Modelpetugas_kampus->paginate(10, 'petugas_kampus'),
                'pager' => $Modelpetugas_kampus->pager
            );

            return view('Petugas_kampus', $data);
        }

        public function update($id)
        {
            $model = new Modelpetugas_kampus();   
            $data['petugas_kampus'] = $model->getpetugas_kampusById($id)->getRow();
            echo view('petugas_kampus_edit', $data);
        }

        public function edit()
        {
            $model = new Modelpetugas_kampus();
            $id = $this->request->getPost('id_petugas');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'jabatan' => $this->request->getPost('jabatan'),
                'no_hp' => $this->request->getPost('no_hp'),
            );
            $model->updatepetugas_kampus($data, $id);
            return redirect()->to('/petugas_kampus');

        }

        public function delete($id)
        {
            $model = new Modelpetugas_kampus();
            $model->deletepetugas_kampus($id);
            return redirect()->to('/petugas_kampus');
        }

        public function input()
        {
            echo view('petugas_kampus_input');
        }

        public function insert()
        {
            $model = new Modelpetugas_kampus();
            //$id = $this->request->getPost('id');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'jabatan' => $this->request->getPost('jabatan'),
                'no_hp' => $this->request->getPost('no_hp'),
            );
            $model->insertpetugas_kampus($data);
            return redirect()->to('/petugas_kampus');   
        }

    }
    

?>