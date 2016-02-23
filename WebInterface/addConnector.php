<?php
 include_once("class.DatabaseManager.php"); 
 $DatabaseManager = new DatabaseManager();
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - FREE Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      
	  <?php include_once("header.php"); ?>
      
      <?php include_once("sidebar.php"); ?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9">
                  

                  	<div class="content-panel">
						<div class="form-panel">
                          <h4 class="mb"><i class="fa fa-angle-right"></i> Aggiungi connettore</h4>

						  <form class="form-horizontal style-form" method="post" action="addConnectorElaborate.php">
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nome connettore</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="connectorName">
										<span class="help-block">Inserisci un nome da dare al connettore.</span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Tipo</label>
									<div class="col-sm-10">
										<select class="form-control" name="connectorType">
										<?php 
											$connectorTypes = $DatabaseManager->getConnectorTypes();
											foreach($connectorTypes as $value):
										?>
										  <option value="<?php echo $value['ConnectorID']; ?>"><?php echo $value['ConnectorName']; ?></option>
										  <?php endforeach; ?>
										</select>
										<span class="help-block">Selezione il tipo di connettore da aggiungere.</span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Consumer Key</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="consumerKey">
										<span class="help-block">Inserisci la Consumer Key.</span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Consumer Secret</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="consumerSecret">
										<span class="help-block">Inserisci la Consumer Secret key.</span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Access Token</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="accessToken">
										<span class="help-block">Inserisci il tuo Access Token.</span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Access Token Secret</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="accessTokenSecret">
										<span class="help-block">Inserisci il tuo Access Token Secret.</span>
									</div>
								</div>
								
								<button type="submit" class="btn btn-round btn-info btn-lg"><i class=" fa fa-plus"></i> Aggiungi</button>


						  </form>
						</div><!--/form-panel -->
                      </div><!-- /content-panel -->

					
                  
                      
                      <div class="row mt">
                      

                    </div><!-- /row -->
                    
                    				
					<div class="row">
						
					</div><!-- /row -->
					
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  

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
