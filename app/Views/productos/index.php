<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
</head>

<body class="bg-gray-100">
    <?= $this->extend('layout') ?>
    <?php $this->section('content') ?>
    <div class="bg-white p-4 shadow">
        <h1 class="text-2xl font-semibold">Listado de Productos</h1>
    </div>
    <div class="container mx-auto mt-8 px-4">
        <?php if (isset($error)) : ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mt-4 rounded">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <?php if (session()->has('success')) : ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 mt-4 rounded">
                <?= session('success') ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="container mx-auto mt-8 px-4">

        <button class="bg-green-500 mb-3 flex hover:bg-green-600 text-white py-2 px-4 rounded mt-4 ">
            <a href="<?= base_url('productos/create') ?>">
                Agregar Producto

            </a>
            <svg class="w-6 h-6 ml-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z" />
            </svg>
        </button>

        <table class="w-full bg-white rounded shadow">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-3">ID</th>
                    <th class="p-3">Nombre</th>
                    <th class="p-3">Descripción</th>
                    <th class="p-3">Precio</th>
                    <th class="p-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) : ?>
                    <tr class="dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class=" p-3"><?= $producto['id'] ?></td>
                        <td class=" p-3"><?= $producto['nombre'] ?></td>
                        <td class=" p-3"><?= $producto['descripcion'] ?></td>
                        <td class=" p-3"><?= '$' . $producto['precio'] ?></td>
                        <td class="flex p-3">
                            <a href="<?= base_url('productos/edit/' . $producto['id']) ?>" class="text-blue-500 hover:underline">
                                <svg class="w-6 h-6 text-blue-800 hover:text-blue-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                    <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                </svg>
                            </a>
                            <a href="<?= base_url('productos/delete/' . $producto['id']) ?>" class="text-red-500 hover:underline ml-2">
                            <svg class="w-6 h-6 text-red-600 hover:text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
    <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
  </svg>
                        </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php $this->endSection() ?>
</body>

</html>