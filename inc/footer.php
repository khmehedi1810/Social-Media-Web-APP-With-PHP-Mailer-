 <!-- Optional JavaScript -->
 	<script type="text/javascript">        
 		$(document).ready(function() {
					
        	$("#search").change(function(e) {
       			hideAll();
						$(e.target.options).removeClass();
						var $selectedOption = $(e.target.options[e.target.options.selectedIndex]);
						$selectedOption.addClass('selected');
       			$('#' + $selectedOption.val()).show();
        	});
        });

        function hideAll() {
        	$("#Gazipur1").hide();
        	$("#Manikganj1").hide();
        	$("#Narayanganj1").hide();
        	$("#Tangail1").hide();
        	$("#Comilla1").hide();
        	$("#Chandpur1").hide();
        	$("#Rangamati1").hide();
        	$("#Natore1").hide();
        	$("#Pabna1").hide();
        	$("#Sirajganj1").hide();
					
        }
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>