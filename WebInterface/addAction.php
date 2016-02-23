<?php
 include_once("class.DatabaseManager.php"); 
 $DatabaseManager = new DatabaseManager();
 $connectors = $DatabaseManager->getConnectors();
 ?>
      
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
                          <h4 class="mb"><i class="fa fa-angle-right"></i> Aggiungi azione</h4>

						  <form class="form-horizontal style-form" method="post" action="addActionElaborate.php">
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nome azione</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="actionName">
										<span class="help-block">Inserisci un nome da dare alla azione che aggiungi.</span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">URI della risorsa</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="resourceURI">
										<span class="help-block">Inserisci l'URI della risorsa a cui associare l'azione.</span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Connector</label>
									<div class="col-sm-10">
										<select class="form-control" name="connector">
										<?php foreach($connectors as $value): ?>
										  <option value="<?php echo $value["ConnectionID"]; ?>"><?php echo $value["ConnectionName"]; ?></option>
										  <?php endforeach; ?>
										</select>
										<span class="help-block">Selezione un connector.</span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Tipo evento</label>
									<div class="col-sm-10">
										<select class="form-control" name="eventType" onChange="document.getElementById('period').disabled = !(document.getElementById('period').disabled);">
										  <option value="0">Observe</option>
										  <option value="1">Periodic</option>
										</select>
										<span class="help-block">Selezione un tipo di evento.</span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Periodo</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="period" id="period" value="10" disabled>
										<span class="help-block">Inserisci il periodo di osservazione della risorsa (in minuti).</span>
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
