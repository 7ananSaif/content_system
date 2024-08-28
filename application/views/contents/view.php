<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View content</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">content System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('contents/index'); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('contents/create'); ?>">Create New content</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1><?= $content->title; ?></h1>
        <p><?= $content->content; ?></p>
        <small>Category: <?= $content->category; ?> | Date: <?= $content->date; ?></small>

        <h2 class="mt-4">Media</h2>
        <ul class="list-group">
            <?php if (!empty($media)): ?>
                <?php foreach ($media as $item): ?>
                    <li class="list-group-item">
                        <img src="<?= base_url($item->media_path); ?>" alt="Media" class="img-thumbnail" style="max-width: 200px;">
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item">No media available for this content.</li>
            <?php endif; ?>
        </ul>
        
        <div class="mt-4">
            <a href="<?= site_url('contents/index'); ?>" class="btn btn-secondary">Back to contents</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>