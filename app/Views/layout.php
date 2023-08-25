<!-- layout.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <nav class="bg-gray-800 text-white p-4">
        <div class="flex justify-between items-center">
            <div class="flex">
                <a href="<?= base_url('/') ?>" class="text-xl font-semibold mr-3">Home </a> <svg class="w-6 h-6 text-gray-50 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9" />
                </svg>
            </div>


            <div class="space-x-4">
                <a href="<?= base_url('inventario/') ?>" class="hover:bg-gray-600 px-4 py-2 rounded">Inventario</a>
                <a href="<?= base_url('productos/') ?>" class="hover:bg-gray-600 px-4 py-2 rounded">Producto</a>
                <a href="<?= base_url('movimientos/') ?>" class="hover:bg-gray-600 px-4 py-2 rounded">Movimiento</a>
            </div>

        </div>
    </nav>

    <div class="container mx-auto py-8 px-4">
        <?= $this->renderSection('content') ?>
    </div>

</body>

</html>