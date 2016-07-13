<!DOCTYPE html>
<html>
	<head>
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		  <style>
		      #place {
             position: absolute;
             top: 80px;
             left: 430px;
			 height: 500px;
             width: 600px;
			 background: #F8F8FF;
			 
			 }
			 ::-webkit-input-placeholder {
				color: 	#696969;
			 }
			 :-ms-input-placeholder {  
			   color: 	#696969;  
			 }

			#id1{ 
			  padding: 5px;
			  background: #F8F8FF;
			  display: inline-block;
			  font-size: 30px;
			  font-family: arial;
			  color :	#696969;
			}

			form input {
			  border: none;
			  background: transparent;
			  outline: none;
			}

			form button {
			  background: transparent;
			  border: 0;
			  color: 	#696969;
			}
		  </style>
		  
	
	</head>
	<body style="background-color:#1E90FF;">
	    <div class="container">
		   <div >
		     <center><h1><font color="white">Todo</font></h1></center>
		    </div>
		    <div class="jumbotron" id="place">
			
				<div >
				    <script>
					
					</script>
					<form  name="myForm" method="post" action="todo.php" enctype="multipart/form-data" id="id1">
						 <input type="text" name="activityname" placeholder="Create Some Tasks ... " >
						 <button type="submit" name="submit" onClick="validateForm"><img src="plus.png" style="border-radius:40px;width:40px;" alt="adding"></button><br/><br/>
					</form>
				</div>
				  <?php
                    echo '<button type="button" class="btn btn-primary">all tasks :&nbsp&nbsp' ;
					include 'count.php';	
					echo counting();
					echo '<button type="button" class="btn btn-danger"> incomplete :&nbsp&nbsp';
					echo SelectedCounting('unfinished');
						//header('Location: http://localhost/TODO/home.php');
					  
					
					echo '</button>&nbsp&nbsp';
					
					echo '<button type="button" class="btn btn-success"> complete :&nbsp&nbsp';
							echo SelectedCounting('finished');
							//header('Location: http://localhost/TODO/home.php');
							echo '</button>';
					?>
					
				
				<br/><br/>
				<!-- displaying activities  -->
				 <script>
					 function redirect(url)
					 {
						window.location.href = url;
					 }
				</script>
				<form  action="update.php" method=\"get\">
				<?php
				    
					include 'PendingActivities.php';
                    echo selecting();
				?>
				
				<?Php
					include 'finishedActivities.php';
                    echo selecting1();
				?>
				<br/>
				<a href="clear.php"><h3 id="id1">Clear Completed Tasks</h3></a>
            </div>
		</div>
        
	</body>
</html>

