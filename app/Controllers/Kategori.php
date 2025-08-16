<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new KategoriModel();
    }

    public function index()
    {
        $data['kategori'] = $this->model->findAll();
        return view('kategori/index', $data);
    }

    public function create()
    {
        return view('kategori/create');
    }

    public function store()
    {
        $this->model->save($this->request->getPost());
        return redirect()->to('/kategori');
    }

    public function edit($id)
    {
        $data['kategori'] = $this->model->find($id);
        return view('kategori/edit', $data);
    }

    public function update($id)
    {
        $this->model->update($id, $this->request->getPost());
        return redirect()->to('/kategori');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/kategori');
    }
}
