<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    
</head>

<body class="bg-gray-100">
    <?= $this->extend('layout') ?>
    <?php $this->section('content') ?>
    <div class="bg-white p-4 shadow">
        <h1 class="text-2xl font-semibold">Editar Producto</h1>
    </div>

    <div class="container mx-auto mt-8 px-4">
        <button class="bg-blue-500 mb-3 flex hover:bg-blue-600 text-white py-2 px-4 rounded mt-4 ">

            <svg class="w-6 h-6 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
            </svg>
            <a href="<?= base_url('productos/') ?>">
                Regresar

            </a>
        </button>
        <form action="<?= base_url('productos/update/' . $producto['id']) ?>" method="post" class="bg-white p-6 shadow-md rounded">
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                <input type="text" name="nombre" value="<?= $producto['nombre'] ?>" class="mt-1 p-2 border rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
                <input type="text" name="descripcion" value="<?= $producto['descripcion'] ?>" class="mt-1 p-2 border rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="precio" class="block text-sm font-medium text-gray-700">Precio:</label>
                <input type="number" name="precio" value="<?= $producto['precio'] ?>" class="mt-1 p-2 border rounded w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Guardar</button>
        </form>
    </div>
    <?php $this->endSection() ?>
</body>

</html>