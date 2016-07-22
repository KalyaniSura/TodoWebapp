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

			#button-add {

   

background: url(plus.png) no-repeat;

            cursor:pointer;

            border: none;	

	border-radius: 40px;

	background-size: 50px 50px;

    height: 50px;

	width:50px;

}

		  </style>

		 

		  <script language="javascript" type="text/javascript">

<!-- 

//Browser Support Code

function ajaxFunction(){

   var ajaxRequest;  // The variable that makes Ajax possible!

   try{

   

      // Opera 8.0+, Firefox, Safari

      ajaxRequest = new XMLHttpRequest();

   }catch (e){

      

      // Internet Explorer Browsers

      try{

         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");

      }catch (e) {

         

         try{

            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");

         }catch (e){

         

            // Something went wrong

            alert("Your browser broke!");

            return false;

         }

      }

   }

   

   // Create a function that will receive data

   // sent from the server and will update

   // div section in the same page.

   ajaxRequest.onreadystatechange = function(){

   

      if(ajaxRequest.readyState == 4){

         var ajaxDisplay = document.getElementById('ajaxDiv');

         ajaxDisplay.innerHTML = ajaxRequest.responseText;

      }

   }

   

   // Now get the value from user and pass it to

   // server script.

   var activityname = document.getElementById('activityname').value;

   

   var binding = "?activityname=" + activityname ;

   

   ajaxRequest.open("GET", "getActivitiesData.php" + binding, true);

   ajaxRequest.send(null); 

}



// clearing finished activities



function ClearingData(){

   var ajaxRequest;  // The variable that makes Ajax possible!

   try{

   

      // Opera 8.0+, Firefox, Safari

      ajaxRequest = new XMLHttpRequest();

   }catch (e){

      

      // Internet Explorer Browsers

      try{

         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");

      }catch (e) {

         

         try{

            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");

         }catch (e){

         

            // Something went wrong

            alert("Your browser broke!");

            return false;

         }

      }

   }

   

   // Create a function that will receive data

   // sent from the server and will update

   // div section in the same page.

   ajaxRequest.onreadystatechange = function(){

   

      if(ajaxRequest.readyState == 4){

         var ajaxDisplay = document.getElementById('ajaxDiv');

         ajaxDisplay.innerHTML = ajaxRequest.responseText;

      }

   }

   

   // Now get the value from user and pass it to

   // server script.

   //var activityname = document.getElementById('activityname').value;

   

   //var binding = "?activityname=" + activityname ;

   

   ajaxRequest.open("GET", "clear.php" , true);

   ajaxRequest.send(null); 

}





		  </script>

	

	</head>

	<body style="background-color:#1E90FF;">

	    <div class="container">

		   <div >

		     <center><h1><font color="white">Todo</font></h1></center>

		    </div>

		    <div class="jumbotron" id="place">

			

					<form  name="myForm" id="id1">

						 <input type="text" name="activityname" id="activityname" placeholder="Create Some Tasks ... " />

						 <input type='button' id="button-add" onclick='ajaxFunction()'/>

					</form>


					<div id='ajaxDiv'>

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

				    

					include 'pendingActivities.php';

                    echo selecting();

				?>

				</form>

				</div>

				<?Php

					include 'finishedActivities.php';

                    echo selecting1();

				?>

			

				<br/>

				<a href="#" onclick="ClearingData()"><h3 id="id1">Clear Completed Tasks</h3></a>

            </div>

		</div>

        

	</body>

</html>


