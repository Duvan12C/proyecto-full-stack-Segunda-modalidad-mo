<?php

namespace App\Controllers;

use App\Models\InventarioModel;
use App\Models\ProductosModel;
use CodeIgniter\Controller;

class Inventario extends Controller
{
    public function index()
    {
        $model = new InventarioModel();
        $data['inventario'] = $model->findAll();
   
        return view('inventario/index', $data);
    }

    public function create()
{
    $productosModel = new ProductosModel();
    $data['productos'] = $productosModel->findAll();

    return view('inventario/crear', $data);
}


public function store()
{
    $model = new InventarioModel();
    $productoModel = new ProductosModel();
    $data['productos'] = $productoModel->findAll(); 
    $producto_id = $this->request->getPost('producto_id');
    $existingInventory = $model->where('producto_id', $producto_id)->first();
    
    if ($existingInventory) {
        $productoModel = new ProductosModel();
        $producto = $productoModel->find($producto_id);
        
        $data['error'] = 'Ya existe un inventario para el producto: ' . $producto['nombre'];
        
        return view('inventario/Crear', $data);
    }

    $insertData = [
        'producto_id' => $producto_id,
        'cantidad_disponible' => $this->request->getPost('cantidad_disponible'),
        'cantidad_minima' => $this->request->getPost('cantidad_minima')
    ];
    
    $model->insert($insertData);

    return redirect()->to('/inventario')->with('success', 'Inventario creado exitosamente');
}




    

public function edit($id = null)
{
    $model = new InventarioModel();
    $data['inventario'] = $model->find($id);

    return view('inventario/edit', $data);
}

public function update()
{
    $model = new InventarioModel();

    $id = $this->request->getPost('id');
    $data = [
        'cantidad_disponible' => $this->request->getPost('cantidad_disponible'),
        'cantidad_minima' => $this->request->getPost('cantidad_minima')
    ];

    $model->update($id, $data);

    return redirect()->to('/inventario')->with('success', 'Inventario actualizado exitosamente');
}

    public function delete($id = null)
    {
        $model = new InventarioModel();
        $model->delete($id);
    
        return redirect()->to('/inventario')->with('success', 'Inventario eliminado exitosamente');
    }
}
