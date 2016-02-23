<?php 
include_once("header.php");
include_once("sidebar.php"); 
$actions = $DatabaseManager->getActions();
?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9">
                  
                  	<div class="row mtbox">

                  	<div class="content-panel">
					
					<?php 
					if(@$_GET['dropStatus'] && @$_GET['dropStatus'] == "success"):
					?>
					<div class="alert alert-success"><b>OK!</b> L'azione è stata eliminata con successo.</div>
					<?php elseif(@$_GET['dropStatus'] && @$_GET['dropStatus'] == "error"): ?>
					<div class="alert alert-danger"><b>ERRORE!</b> L'azione non è stata eliminata a causa di un errore.</div>
					<?php endif; ?>
					
					<?php 
					if(@$_GET['addStatus'] && @$_GET['addStatus'] == "success"):
					?>
					<div class="alert alert-success"><b>OK!</b> L'azione è stata aggiunta con successo.</div>
					<?php elseif(@$_GET['addStatus'] && @$_GET['addStatus'] == "error"): ?>
					<div class="alert alert-danger"><b>ERRORE!</b> L'azione non è stata aggiunta a causa di un errore.</div>
					<?php endif; ?>
					
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Azioni registrate <a href="addAction.php" class="btn btn-round btn-primary" style="float: right; margin-right: 25px;"><i class="fa fa-plus"></i> Aggiungi azione</a></h4> 
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Nome</th>
                                  <th class="hidden-phone"><i class="fa fa-code"></i> URI</th>
                                  <th><i class="fa fa-dot-circle-o"></i> Tipo</th>
								  <th><i class=" fa fa-share-alt"></i> Connector</th>
                                  <th><i class=" fa fa-edit"></i> Modifica azione</th>
                              </tr>
                              </thead>
                              <tbody>
							  <?php foreach($actions as $value): ?>
                              <tr>
                                  <td><?php echo $value["ActionName"]; ?></td>
                                  <td class="hidden-phone"><?php echo $value["ResourceURI"]; ?></td>
                                  <td><?php if($value["EventType"]) echo "Periodic"; else echo "Observe"; ?> </td>
								  <td><span class="badge bg-info fa fa-twitter"> Twitter</span></td>
                                  <td>
                                      <a class="btn btn-danger btn-xs" href="dropActionElaborate.php?id=<?php echo $value["ActionID"]; ?>"><i class="fa fa-trash-o "></i> Drop</a>
                                  </td>
                              </tr>
                              <?php endforeach; ?>
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->

					
					
                  	</div><!-- /row mt -->	
                  
                      
                      <div class="row mt">
                      

                    </div><!-- /row -->
                    
                    				
					<div class="row">
						
					</div><!-- /row -->
					
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>NOTIFICHE</h3>
                                        
						<?php
						  /**** Notification Sidebar code ****/
							require "twitteroauth/autoload.php";
							use Abraham\TwitterOAuth\TwitterOAuth;

							$connectors = $DatabaseManager->getConnectors();
							foreach($connectors as $value)
							{
								if($DatabaseManager->getConnectorTypeNameById($value["ConnectorID"]) == "Twitter")
								{
									$connection = new TwitterOAuth($value["ConsumerKey"], $value["ConsumerSecret"], $value["AccessToken"], $value["AccessTokenSecret"]);
									$user = $connection->get("account/verify_credentials");
									
									$statuses = $connection->get("statuses/user_timeline", ["count" => 8, "exclude_replies" => true]);
									//print_r($statuses);
									foreach($statuses as $value):
										$created = new DateTime($value->created_at);
										$created->add(new DateInterval('PT1H'));
						?>
                      
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-twitter"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted><?php echo $created->format("d-m-Y H:i"); ?></muted> - <strong><?php echo $value->user->screen_name; ?></strong><br/>
                      		   <?php echo $value->text; ?><br/>
                      		</p>
                      	</div>
                      </div>
                       
                      <?php
								endforeach;
								}
							}
					  ?>
					  
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 - Francesco Salvatore
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	

	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
