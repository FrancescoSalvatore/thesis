<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="index.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">
				  <?php 
						$email = $DatabaseManager->getEmailFromUserId($LoginManager->getUserId());
						$parts = explode("@", $email);
						echo $parts[0];
					?></h5>
              	  	
                  <li class="mt">
                      <a <?php if(strpos($_SERVER['REQUEST_URI'], "index.php") !== FALSE): ?>class="active"<?php endif; ?> href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  
				  <li class="">
                      <a href="connectors.php" <?php if(strpos($_SERVER['REQUEST_URI'], "connectors.php") !== FALSE): ?>class="active"<?php endif; ?>>
                          <i class="fa fa-share-alt"></i>
                          <span>Connectors</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->