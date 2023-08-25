<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>

<body class="bg-gray-100">


  <?= $this->extend('layout') ?>
  <?php $this->section('content') ?>
  <div class="container mx-auto py-8 px-4">
    <div class="flex">
      <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>
      <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 18">
        <path d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
      </svg>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="bg-white p-4 shadow-md hover:bg-gray-100">
        <div class="flex">
          <h3 class="text-xl font-semibold mr-3 mb-2">Resumen </h3>
          <svg class="w-6 h-6  text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 12v5m5-9v9m5-5v5m5-9v9M1 7l5-6 5 6 5-6" />
          </svg>
        </div>

        <p class="text-lg">Cantidad de productos: <?= $cantidadProductos ?></p>
      </div>

      <div class="bg-white p-4 shadow-md  hover:bg-gray-100">
        <h3 class="text-xl font-semibold mb-2">Movimientos Recientes</h3>
        <ul>
          <?php foreach ($movimientosRecientes as $movimiento) : ?>
            <li class="text-md"><?= $movimiento['descripcion'] ?> - <?= $movimiento['fecha'] ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
  <?php $this->endSection() ?>
</body>

</html>