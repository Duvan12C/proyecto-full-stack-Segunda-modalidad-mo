<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inventario</title>

</head>
<body class="bg-gray-100">
<?= $this->extend('layout') ?>
<?php $this->section('content') ?>
<div class="bg-white p-4 shadow">
    <h1 class="text-2xl font-semibold">Editar Inventario</h1>
</div>

<div class="container mx-auto mt-8 px-4">
    <form action="<?= base_url('inventario/update') ?>" method="post" class="bg-white rounded shadow p-4">
        <input type="hidden" name="id" value="<?= $inventario['id'] ?>">
        
        <label for="cantidad_disponible" class="block mb-2">Cantidad Disponible:</label>
        <input type="number" name="cantidad_disponible" value="<?= $inventario['cantidad_disponible'] ?>" required class="w-full p-2 border rounded mb-4">

        <label for="cantidad_minima" class="block mb-2">Cantidad Mínima:</label>
        <input type="number" name="cantidad_minima" value="<?= $inventario['cantidad_minima'] ?>" required class="w-full p-2 border rounded mb-4">
        
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Actualizar</button>
    </form>
</div>
<?php $this->endSection() ?>
</body>
</html>
