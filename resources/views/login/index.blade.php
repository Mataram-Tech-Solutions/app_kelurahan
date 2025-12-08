<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Floating Label Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
      body {
        font-family: 'Poppins', sans-serif;
      }
      .login-container {
        max-width: 420px;
      }
      /* Penyesuaian kecil untuk floating label agar lebih pas */
      .form-floating .form-control {
        height: calc(3.5rem + 2px); /* Menyesuaikan tinggi input */
        padding: 1rem 0.75rem;
      }
      .form-floating label {
        padding: 1rem 0.75rem;
      }
    </style>
  </head>
  
  <body class="d-flex align-items-center justify-content-center min-vh-100 bg-light">

    <div class="login-container bg-white p-4 p-md-5 rounded-4 shadow-sm w-100">
      
      <div class="text-center mb-5">
        <i class="bi bi-lock-fill display-3 text-secondary bg-body-secondary rounded-circle py-3 px-4"></i>
      </div>

      <form>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="nama@contoh.com">
          <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating mb-4">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="rememberMe">
            <label class="form-check-label small" for="rememberMe">
              Remember me
            </label>
          </div>
          <a href="#" class="text-decoration-none fw-medium small">Forgot your password?</a>
        </div>
        
        <button type="submit" class="btn btn-dark w-100 py-2 fw-semibold">LOGIN</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>