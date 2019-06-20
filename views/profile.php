<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Perfil</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/bootstrap/css/bootstrap.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="fonts/iconic/css/material-design-iconic-font.min.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/css-hamburgers/hamburgers.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/animsition/css/animsition.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/select2/select2.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/daterangepicker/daterangepicker.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css" />
    <link rel="stylesheet" type="text/css" href="css/main-login.css" />
    <!--===============================================================================================-->
  </head>
  <body>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100 p-t-85 p-b-20">
          <form class="login100-form validate-form" method="post" action="">
            <span class="login100-form-title p-b-70">
             <?php echo $datos['nombreUsuario']; ?>
            </span>
            <span class="login100-form-avatar">
              <img src="images/avatar-01.jpg" alt="AVATAR" />
            </span>
            <br/>
            <?php
            if($datos['idUsuario']!=$_SESSION['idUsuario']){
            ?>
            <div class="container-login100-form-btn">
                <?php
                switch($amistad){
                    case 0:
                
                ?>
            <button type="submit" class="login100-form-btn btn">
                Agregar a amigos
              </button>
              <?php
                break;
                
                case 1:
              ?>
              <button disabled class="login100-form-btn btn-secondary">
                Ya son amigos
              </button>


            <?php
                break;
                
                case 2:

            ?>

            <button disabled class="login100-form-btn btn-secondary">
                Solicitud enviada
              </button>
              <?php
                break;
              ?>
              </div>

              <?php
                }
            }
              ?>

            <div
              class="wrap-input100 validate-input m-t-85 m-b-35"
              data-validate="Ingresa tu correo electrónico"
            >
              <input disabled class="input100" type="email" name="email" value="<?php echo $datos['email']; ?>" />
            </div>
            <input type="hidden" name="idUsuario" value="<?php echo $datos['idUsuario']; ?>"/>
            <div
              class="wrap-input100 validate-input m-b-50"
              data-validate="Ingresa tu información"
            >
              <input disabled class="input100" type="text" name="bioUsuario" value="<?php echo $datos['bioUsuario']; ?>" />
              
            </div>

            <div
              class="wrap-input100 validate-input m-b-50"
              data-validate="Ingresa tu experiencia laboral"
            >
              <input disabled class="input100" type="text" name="expLaboral" value="<?php echo $datos['expLaboral']; ?>"/>
              
            </div>

          

          </form>
        </div>
      </div>
    </div>

    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main-login.js"></script>
  </body>
</html>
