<?php
    namespace App\Controllers;
    use App\Models\Modelmahasiswa;

    class mahasiswa extends BaseController
    {
        public function index()
        {
            $Modelmahasiswa = new Modelmahasiswa();
            $pager = \Config\Services::pager();

            $data = array (
                'Modelmahasiswa' => $Modelmahasiswa->paginate(10, 'mahasiswa'),
                'pager' => $Modelmahasiswa->pager
            );

            return view('mahasiswa', $data);
        }

        public function update($id)
        {
            $model = new Modelmahasiswa();   
            $data['mahasiswa'] = $model->getmahasiswaById($id)->getRow();
            echo view('mahasiswa_edit', $data);
        }

        public function edit()
        {
            $model = new Modelmahasiswa();
            $id = $this->request->getPost('id_mahasiswa');
            $data = array (
                'nim'  => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
            );
            $model->updatemahasiswa($data, $id);
            return redirect()->to('/mahasiswa');

        }

        public function delete($id)
        {
            $model = new Modelmahasiswa();
            $model->deletemahasiswa($id);
            return redirect()->to('/mahasiswa');
        }

        public function input()
        {
            echo view('mahasiswa_input');
        }

        public function insert()
        {
            $model = new Modelmahasiswa();
            //$id = $this->request->getPost('id');
            $data = array (
                'nim'  => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
            );
            $model->insertmahasiswa($data);
            return redirect()->to('/mahasiswa');   
        }

    }
    

?>