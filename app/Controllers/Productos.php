<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InventarioModel;
use App\Models\ProductosModel; // Asegúrate de importar el modelo adecuado

class Productos extends BaseController
{
    public function index()
    {
        $model = new ProductosModel();
        $data['productos'] = $model->findAll();

        return view('productos/index', $data);
    }

    public function create()
    {
        return view('productos/create');
    }

    public function store()
    {
        $model = new ProductosModel();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio')
        ];

        $model->insert($data);

        return redirect()->to('/productos')->with('success', 'Producto creado exitosamente');
    }

    public function edit($id = null)
    {
        $model = new ProductosModel();
        $data['producto'] = $model->find($id);

        return view('productos/edit', $data);
    }

    public function update($id = null)
    {
        $model = new ProductosModel();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio')
        ];

        $model->update($id, $data);

        return redirect()->to('/productos')->with('success', 'Producto actualizado exitosamente');
    }

    public function delete($id = null)
    {
        $productoModel = new ProductosModel();
        $inventarioModel = new InventarioModel();

        // Verificar si existe inventario asociado al producto
        $existingInventory = $inventarioModel->where('producto_id', $id)->first();


        if ($existingInventory) {
            $data['error'] = 'No se puede eliminar el producto, existe inventario asociado.';
            $data['productos'] = $productoModel->findAll();

            return view('productos/index', $data);
        }

        $productoModel->delete($id);

        return redirect()->to('/productos')->with('success', 'Producto eliminado exitosamente');
    }
}
