<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Spotify Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Main Content -->
    <main>
        <div class="container mt-5">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center text-muted py-4 mt-auto border-top">
        <div class="container">
            <p class="mb-0">🎵 Spotify Gallery CRUD | Kelompok C</p>
            <small>&copy; <?= date('Y') ?> Ujian Sismul</small>
        </div>
    </footer>

</body>
</html>
