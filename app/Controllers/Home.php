<?php

namespace App\Controllers;

use App\Models\ProductosModel;
use App\Models\MovimientosInventarioModel;

class Home extends BaseController
{
    public function index()
    {
        // Obtener la cantidad de productos
        $productosModel = new ProductosModel();
        $cantidadProductos = $productosModel->countAll();

        // Obtener los últimos movimientos recientes
        $movimientosModel = new MovimientosInventarioModel();
        $movimientosRecientes = $movimientosModel->orderBy('fecha', 'DESC')->findAll(5); // Cambia 5 por la cantidad deseada de movimientos
        
        // Cargar la vista del dashboard y pasar las variables
        $data = [
            'cantidadProductos' => $cantidadProductos,
            'movimientosRecientes' => $movimientosRecientes
        ];
        
        return view('welcome_message', $data);
    }
}
