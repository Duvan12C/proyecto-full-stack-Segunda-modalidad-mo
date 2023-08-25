<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Movimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<?= $this->extend('layout') ?>
<?php $this->section('content') ?>
<div class="bg-white p-4 shadow">
    <h1 class="text-2xl font-semibold">Editar Movimiento</h1>
</div>

<div class="container mx-auto mt-8 px-4">
    <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-200 text-green-800 p-3 mb-4"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-200 text-red-800 p-3 mb-4"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form action="<?= site_url('movimientos/update/' . $movimiento['id']) ?>" method="post" class="bg-white p-4 shadow rounded">
        <label for="descripcion" class="block mb-2">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion" value="<?= $movimiento['descripcion'] ?>" required class="w-full p-2 border rounded">
        <br>
        <label for="fecha" class="block mb-2">Fecha:</label>
        <input type="date" name="fecha" id="fecha" value="<?= $movimiento['fecha'] ?>" required class="w-full p-2 border rounded">
        <br>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mt-4">Guardar Cambios</button>
    </form>

    <a href="<?= site_url('movimientos') ?>" class="block mt-4 text-blue-500 hover:underline">Volver</a>
</div>
<?php $this->endSection() ?>
</body>
</html>
