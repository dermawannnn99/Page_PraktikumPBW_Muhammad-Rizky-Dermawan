<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Toko Buku</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            /* Background gradasi linier khas Bootstrap */
            background: linear-gradient(180deg, #0d6efd 0%, #0a58ca 100%);
            min-height: 100vh;
        }
        .card {
            border: none;
            border-radius: 1rem;
        }
        .btn-login {
            padding: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
    </style>
</head>

<body class="d-flex align-items-center">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            
            <div class="text-center mb-4 text-white">
                <i class="bi bi-book-half display-1"></i>
            </div>

            <div class="card shadow-lg">
                <div class="card-body p-4 p-sm-5">
                    
                    <h4 class="text-center mb-4 fw-bold text-dark">Login Admin</h4>

                    <?php if (isset($_GET['message'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <?= htmlspecialchars($_GET['message']) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="proses_login.php">
                        
                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control" id="userInput" placeholder="Username" required>
                            <label for="userInput text-muted">
                                <i class="bi bi-person me-1"></i> Username
                            </label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="passInput" placeholder="Password" required>
                            <label for="passInput text-muted">
                                <i class="bi bi-lock me-1"></i> Password
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 btn-login shadow-sm mb-3">
                            MASUK <i class="bi bi-arrow-right-short ms-1"></i>
                        </button>
                        
                        <div class="text-center">
                            <a href="#" class="text-decoration-none small text-muted">Lupa Password?</a>
                        </div>

                    </form>
                </div>
            </div>
            
            <p class="text-center text-white-50 mt-4 small">
                &copy; <?= date('Y') ?> Admin Panel - Terlindungi SSL
            </p>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>