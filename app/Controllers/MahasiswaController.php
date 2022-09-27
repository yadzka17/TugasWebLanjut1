<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    public function index()
    {
        $mahasiswaModel = new MahasiswaModel();
     $mahasiswa = $mahasiswaModel->findAll();
    
     $data = [
         "title"=>"Mahasiswa",
         "mahasiswa" => $mahasiswa
     ];
     return view('mahasiswa/list',$data);
            
    }
    public function create(){
        $data = [
            "title"=>"create Mahasiswa",
        ];
        return view('mahasiswa/create', $data);
               
       
    }
    
    public function store()
    {
        if(!$this->validate([
            'npm' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
        ])){
            return redirect()->to('/mahasiswa/create');
        }
        $mahasiswa_model = new MahasiswaModel();
        $data = [
            'npm' => $this->request->getPost('npm'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];
        $mahasiswa_model->save($data);

        return redirect()->to('/mahasiswa');
    }

    public function delete($id)
    {
        $mahasiswa_model = new MahasiswaModel();
        $mahasiswa_model->delete($id);

        return redirect()->to('/mahasiswa');
    }

    public function edit($id)
    {
        $mahasiswa_model = new MahasiswaModel();
        // $mahasiswa = $mahasiswa_model->find($id);

        $data = [
            'title' => 'Edit Mahasiswa',
            'mahasiswa' => $mahasiswa_model->find($id)
        ];

        return 
              view('mahasiswa/edit', $data);
              
    }

    public function update($id)
    {
        if(!$this->validate([
            'npm' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
        ])){
            return redirect()->to('/mahasiswa/edit/'.$id);
        }
        $mahasiswa_model = new MahasiswaModel();
        $data = [
            'npm' => $this->request->getVar('npm'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ];
        $mahasiswa_model->update($id, $data);

        return redirect()->to('/mahasiswa');
    }
}
