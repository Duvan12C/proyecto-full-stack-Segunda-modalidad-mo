<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Inventario</title>
   
</head>

<body class="bg-gray-100">
    <?= $this->extend('layout') ?>
    <?php $this->section('content') ?>
    <div class="bg-white p-4 shadow">
        <h1 class="text-2xl font-semibold">Agregar Inventario</h1>
    </div>

    <div class="container mx-auto mt-8 px-4">
        <?php if (isset($error)) : ?>
            <div class="bg-red-200 text-red-800 p-3 mb-4"><?= $error ?></div>
        <?php endif; ?>

        <button class="bg-blue-500 mb-3 flex hover:bg-blue-600 text-white py-2 px-4 rounded mt-4 ">

            <svg class="w-6 h-6 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
            </svg>
            <a href="<?= base_url('inventario/') ?>">
                Regresar

            </a>
        </button>

        <form action="<?= base_url('inventario/store') ?>" method="post" class="bg-white rounded shadow p-4">
            <label for="producto_id" class="block mb-2">Producto:</label>
            <select name="producto_id" required class="w-full p-2 border rounded mb-4">
                <?php foreach ($productos as $producto) : ?>
                    <option value="<?= $producto['id'] ?>"><?= $producto['nombre'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="cantidad_disponible" class="block mb-2">Cantidad Disponible:</label>
            <input type="number" name="cantidad_disponible" required class="w-full p-2 border rounded mb-4">

            <label for="cantidad_minima" class="block mb-2">Cantidad Mínima:</label>
            <input type="number" name="cantidad_minima" required class="w-full p-2 border rounded mb-4">

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Guardar</button>
        </form>
    </div>
    <?php $this->endSection() ?>
</body>

</html>