<div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div>
      
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown" style="display:flex; flex-direction:row; gap:2px; align-items:center; justify-content:center; margin: 0 auto;">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down" style="font-family:Poppins, 'sans-serif'; font-size:15px; color:black;">Hola, <span style="font-weight:600;"><?php echo $_SESSION["admin_name"];?></span></span>
            </a>
            <input type="hidden" id="usu_idx" value="<?php echo $SESSION["admin_id"]?>"> <!-- ADMIN_ID DEL USUARIO -->

          </div>
        </nav>
      </div>
</div>