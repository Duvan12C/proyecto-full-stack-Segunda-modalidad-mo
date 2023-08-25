<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InventarioModel;
use App\Models\MovimientosInventarioModel;
use App\Models\ProductosModel;

class MovimientosInventario extends BaseController
{
    public function index()
    {
        $model = new MovimientosInventarioModel();
        $data['movimientos'] = $model->findAll();

        return view('movimientos/index', $data);
    }
    public function create()
    {
        $productosModel = new ProductosModel(); // Modelo de productos
    
        // Obtén la lista de productos para mostrar en el formulario
        $data['productos'] = $productosModel->findAll();
    
        return view('movimientos/create', $data);
    }
    public function store()
    {
        $model = new MovimientosInventarioModel();
        $productosModel = new ProductosModel();
        $inventarioModel = new InventarioModel(); // Modelo de inventario
    
        $descripcion = $this->request->getPost('descripcion');
        $fecha = $this->request->getPost('fecha');
        $productoId = $this->request->getPost('producto_id');
    
        // Obtén la cantidad disponible actual del producto desde la tabla 'inventario'
        $inventario = $inventarioModel->where('producto_id', $productoId)->first();
    
        if (!$inventario) {
            // Maneja el caso en que no se encuentra el producto en la tabla 'inventario'
            return redirect()->to('/movimientos')->with('error', 'El producto no tiene cantidad disponible en inventario.');
        }
    
        $cantidadSolicitada = $this->request->getPost('cantidad');
    
        if ($cantidadSolicitada > $inventario['cantidad_disponible']) {
            // Maneja el caso en que la cantidad solicitada es mayor que la cantidad disponible en inventario
            return redirect()->to('/movimientos')->with('error', 'La cantidad solicitada es mayor que la cantidad disponible en inventario.');
        }
    
        // Calcula la nueva cantidad disponible en el inventario
        $nuevaCantidadDisponible = $inventario['cantidad_disponible'] - $cantidadSolicitada;
    
        // Actualiza la cantidad disponible en inventario
        $inventarioModel->update($inventario['id'], ['cantidad_disponible' => $nuevaCantidadDisponible]);
    
        // Guarda el movimiento en la base de datos
        $model->save([
            'producto_id' => $productoId,
            'tipo' => 'salida', // Esto podría ser 'salida' ya que estás reduciendo el inventario
            'cantidad' => $cantidadSolicitada,
            'descripcion' => $descripcion,
            'fecha' => $fecha
        ]);
    
        return redirect()->to('/movimientos')->with('success', 'Movimiento creado exitosamente.');
    }
    

    public function edit($id = null)
    {
        $model = new MovimientosInventarioModel();
        $data['movimiento'] = $model->find($id);
    
        return view('movimientos/edit', $data);
    }

    public function update($id)
    {
        $model = new MovimientosInventarioModel();
        
        $descripcion = $this->request->getPost('descripcion');
        $fecha = $this->request->getPost('fecha');
    
        $model->update($id, [
            'descripcion' => $descripcion,
            'fecha' => $fecha
        ]);
    
        return redirect()->to('/movimientos')->with('success', 'Movimiento actualizado exitosamente.');
    }
    

    public function delete($id)
    {
        $model = new MovimientosInventarioModel();
        $model->delete($id);
        return redirect()->to('/movimientos')->with('success', 'Movimiento eliminado exitosamente.');
    }
}
