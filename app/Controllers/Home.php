<?php

namespace App\Controllers;

use App\Models\Tasks;

class Home extends BaseController
{
    protected $tasks;

    public function __construct()
    {
        $this->tasks = model(Tasks::class);
        helper('form');

    }
    public function index(): string
    {
        return view('welcome_message', [
            'tasks' => $this->tasks->findAll(),
        ]);
    }
    public function guardar()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'tarea' => [
                'label' => 'tarea',
                'rules' => 'required',
                'errors' => [
                    'required' => 'La {field} debe ser llenada',
                ],
            ],
            'descripcion' => [
                'label' => 'descripcion',
                'rules' => 'required',
                'errors' => [
                    'required' => 'La {field} debe ser llenada',
                ],
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $validation->listErrors())->withInput();
        }
        $data = [
            'nombre' => $this->request->getPost('tarea'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];
        $this->tasks->insert($data);
        return redirect()->back()->with('success', 'Tarea guardada con exito');
    }
    public function editar(int $id)
    {
        return view('editarTarea', [
            'datos' => $this->tasks->where('id', $id)->find(),
        ]);
    }
    public function update(int $id)
    {
        $validation = \Config\Services::validation();
        $rules = [
            'tarea' => [
                'label' => 'tarea',
                'rules' => 'required',
                'errors' => [
                    'required' => 'La {field} debe ser llenada',
                ],
            ],
            'descripcion' => [
                'label' => 'descripcion',
                'rules' => 'required',
                'errors' => [
                    'required' => 'La {field} debe ser llenada',
                ],
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $validation->listErrors())->withInput();
        }
        $data = [
            'nombre' => $this->request->getPost('tarea'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];
        $this->tasks->where('id', $id)->set($data)->update();
        return redirect()->to('/');
    }
    public function delete(int $id)
    {
        $this->tasks->where('id', $id)->delete();
        return redirect()->back();
    }
}
