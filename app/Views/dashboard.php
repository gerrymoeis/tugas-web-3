<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1>Welcome, <?= session()->get('loggedUserFullName') ?></h1>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>