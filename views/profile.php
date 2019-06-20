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
            <button type="submit" class="login100-form-btn btn-success">
                Agregar a amigos
              </button>
              <?php
                break;
                
                case 1:
              ?>
              <button disabled class="login100-form-btn btn-success" style="background-color:gray">
                Ya son amigos
              </button>


            <?php
                break;
                
                case 2:

            ?>

            <button disabled class="login100-form-btn btn-success" style="background-color:gray">
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
