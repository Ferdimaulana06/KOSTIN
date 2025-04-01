<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/register.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <img src="kostin.svg" alt="Logo" class="logo" />
      <h2 id="judultxt">Register</h2>
      <p id="txt1">Isi form untuk mendaftar</p>
      <form id="registerForm" action="proses.php" method="POST">
        <div class="input-group">
          <input name="namalengkap" type="namalengkap" placeholder="Nama Lengkap" required />
        </div>
        <div class="input-group">
          <input name="email" type="email" placeholder="Email" required />
        </div>
        <div class="input-group">
          <input
            id="password"
            name="password"
            type="password"
            class=""
            placeholder="Password (minimal 8 karakter)"
            required
          />
        </div>
        <div class="input-group">
          <input
            id="passwordvalidasi"
            type="passwordvalidasi"
            class=""
            placeholder="Ulangi Password"
            required
          />
        </div>
        <button type="submit" class="daftar-btn">Daftar</button>
      </form>
      <p class="haveacc-text">
        <a href="#">Sudah punya akun</a>
      </p>
    </div>
    <script src="script.js"></script>
  </body>
</html>
