<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Content</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
    function validateForm() {
        const title = document.getElementById('title');
        if (title.value.length < 3) {
            alert('Title must be at least 3 characters long.');
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Content System</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Content/index'); ?>">Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Create New Content</h1>

        <?php if (validation_errors()): ?>
        <div class="alert alert-danger"><?= validation_errors(); ?></div>
        <?php endif; ?>

        <form method="POST" action="" enctype="multipart/form-data" onsubmit="return validateForm();">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required minlength="3"
                    value="<?= set_value('title'); ?>">
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content"
                    rows="5"><?= set_value('content'); ?></textarea>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="">Select a category</option>
                    <?php foreach ($categories as $id => $name): ?>
                    <option value="<?= $id; ?>" <?= set_select('category', $id); ?>><?= $name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="media">Upload Media:</label>
                <input type="file" class="form-control-file" id="media" name="media[]" multiple>
                <small class="form-text text-muted">Allowed formats: jpg, png, gif (max size: 2MB per file)</small>
            </div>
            <button type="submit" class="btn btn-primary">Create Content</button>
            <a href="<?= site_url('Content/index'); ?>" class="btn btn-secondary">Back to Contents</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>