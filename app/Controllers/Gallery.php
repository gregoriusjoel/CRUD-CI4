<?php

namespace App\Controllers;

use App\Models\GalleryModel;

class Gallery extends BaseController
{
    public function index()
    {
        $model = new GalleryModel();
        $keyword = $this->request->getGet('q');

        if ($keyword) {
            $model->like('title', $keyword)
                ->orLike('artist', $keyword);
        }

        $data['galleries'] = $model->paginate(8); // tampilkan 8 per halaman
        $data['pager'] = $model->pager;
        $data['keyword'] = $keyword;

        return view('gallery/index', $data);
    }

    public function search()
    {
        $keyword = $this->request->getGet('q');
        $galleryModel = new \App\Models\GalleryModel();

        $results = $galleryModel
            ->like('title', $keyword)
            ->orLike('artist', $keyword)
            ->findAll();

        $gridView = view('gallery/_list', ['galleries' => $results]);
        $tableView = view('gallery/_table', ['galleries' => $results]);

        return $this->response->setJSON([
            'grid' => $gridView,
            'table' => $tableView
        ]);
    }


    public function create()
    {
        return view('gallery/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'title' => 'required',
            'artist' => 'required',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $image = $this->request->getFile('image');
        $newName = $image->getRandomName();
        $image->move('uploads', $newName);

        $galleryModel = new \App\Models\GalleryModel();
        $galleryModel->save([
            'title' => $this->request->getPost('title'),
            'artist' => $this->request->getPost('artist'), // <- PENTING
            'image' => $newName
        ]);

        return redirect()->to(base_url('gallery'))->with('message', 'Gambar berhasil ditambahkan');
    }



    public function edit($id)
    {
        $model = new GalleryModel();
        $data['gallery'] = $model->find($id);

        return view('gallery/edit', $data);
    }

    public function update($id)
    {
        $model = new GalleryModel();

        $gallery = $model->find($id);
        $imageName = $gallery['image'];

        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);
        }

        $model->update($id, [
            'title' => $this->request->getPost('title'),
            'image' => $imageName,
        ]);

        return redirect()->to('/gallery');
    }

    public function delete($id)
    {
        $model = new GalleryModel();
        $gallery = $model->find($id);

        if ($gallery) {
            unlink('uploads/' . $gallery['image']);
            $model->delete($id);
        }

        return redirect()->to('/gallery');
    }
    
    
}
