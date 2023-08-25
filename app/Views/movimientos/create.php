<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Movimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?= $this->extend('layout') ?>
    <?php $this->section('content') ?>
    <div class="bg-white p-4 shadow">
        <h1 class="text-2xl font-semibold">Crear Movimiento</h1>
    </div>

    <div class="container mx-auto mt-8 px-4">
    
    <?php if (isset($_SESSION['success'])) : ?>
            <div class="bg-green-200 text-green-800 p-3 mb-4"><?= $_SESSION['success'] ?></div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])) : ?>
            <div class="bg-red-200 text-red-800 p-3 mb-4"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <button class="bg-blue-500 mb-3 flex hover:bg-blue-600 text-white py-2 px-4 rounded mt-4 ">

            <svg class="w-6 h-6 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
            </svg>
            <a href="<?= base_url('movimientos/') ?>">
                Regresar

            </a>
        </button>

        <form action="<?= site_url('movimientos/store') ?>" method="post" class="bg-white p-4 shadow rounded">
            <label for="producto_id" class="block mb-2">Producto:</label>
            <select name="producto_id" id="producto_id" required class="w-full p-2 border rounded">
                <?php foreach ($productos as $producto) : ?>
                    <option value="<?= $producto['id'] ?>"><?= $producto['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="cantidad" class="block mb-2">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" required class="w-full p-2 border rounded">
            <br>
            <label for="descripcion" class="block mb-2">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" required class="w-full p-2 border rounded">
            <br>
            <label for="fecha" class="block mb-2">Fecha:</label>
            <input type="date" name="fecha" id="fecha" required class="w-full p-2 border rounded">
            <br>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mt-4">Guardar</button>
        </form>

        <a href="<?= site_url('movimientos') ?>" class="block mt-4 text-blue-500 hover:underline">Volver</a>
    </div>
    <?php $this->endSection() ?>
</body>

</html>