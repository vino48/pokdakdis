<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PUSMENDIK – Pusat Informasi Asesmen</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family:'Inter',sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gray-50">

    <?= $this->include('tata_letak/header') ?>
    
    <main class="pt-24">
        <?= $konten ?? '' ?>
    </main>

    <?= $this->include('tata_letak/footer') ?>

</body>
</html>
