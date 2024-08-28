<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contents</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">content System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=site_url('contents/index');?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('contents/create');?>">Create New content</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>contents</h1>
        <?php if (validation_errors()): ?>
        <div class="alert alert-danger"><?=validation_errors();?></div>
        <?php endif;?>
        <!-- Category Filter -->
        <div class="mb-3">
            <form method="get" action="<?=site_url('contents/index');?>">
                <select name="category" class="form-control" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    <?php foreach ($categories as $id => $name): ?>
                    <option value="<?=$id;?>" <?=($this->input->get('category') == $id) ? 'selected' : '';?>>
                        <?=$name;?>
                    </option>
                    <?php endforeach;?>
                </select>
            </form>
        </div>

        <div class="list-group">
            <?php if (!empty($contents)): ?>
            <?php foreach ($contents as $content): ?>

            <div class="list-group-item">
                <h2><?=$content->title;?></h2>
                <p><?=$content->content;?></p>
                <small>Category: <?=$categories[$content->category];?> | Date: <?=$content->date;?></small>
                <a href="<?=site_url('contents/edit/' . $content->id);?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?=site_url('contents/delete/' . $content->id);?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('Are you sure?');">Delete</a>
                <a href="<?=site_url('contents/view/' . $content->id);?>" class="btn btn-info btn-sm">View</a>
            </div>
            <?php endforeach;?>
            <?php else: ?>
            <div class="list-group-item">No contents available.</div>
            <?php endif;?>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mt-4">
                <?=$pagination_links;?>
            </ul>
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>