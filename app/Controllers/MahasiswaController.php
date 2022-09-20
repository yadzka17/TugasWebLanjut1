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
     return view('templates/header', $data)
            . view('mahasiswa/list',$data)
            . view('templates/footer');
    }
    public function create(){
        $data = [
            "title"=>"create Mahasiswa",
        ];
        return view('templates/header', $data)
               . view('mahasiswa/create')
               . view('templates/footer');
       
    }
    
    public function store()
    {
        if(!$this->validate([
            'npm' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
        ])){
            return redirect()->to('/mahasiswa/create');
        }
        $mahasiswa_model = new MahasiswaModel();
        $data = [
            'npm' => $this->request->getPost('npm'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
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
        $mahasiswa = $mahasiswa_model->find($id);

        $data = [
            'title' => 'Edit Mahasiswa'
        ];

        return view('templates/header', $data)
              .view('mahasiswa/edit', $mahasiswa)
              .view('templates/footer');
    }

    public function update($id)
    {
        if(!$this->validate([
            'npm' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
        ])){
            return redirect()->to('/mahasiswa/edit/'.$id);
        }
        $mahasiswa_model = new Mahasiswa();
        $data = [
            'npm' => $this->request->getVar('npm'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
        ];
        $mahasiswa_model->update($id, $data);

        return redirect()->to('/mahasiswa');
    }
}
