<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CV | Manager</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
		
		<!-- Top menu -->
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Create Your Awsome Resume/CV here</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<span class="li-text">
								Follow us: 
							</span> 
							<span class="li-social">
								<a href="#" target="_blank"><i class="fa fa-facebook"></i></a> 
								<a href="#" target="_blank"><i class="fa fa-twitter"></i></a> 
								<a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</nav>
        
        <!-- Description -->
		<div class="description-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 description-title">
	                    <h2>Resume Generater Multi Step Form</h2>
	                </div>
	            </div>
			</div>
		</div>
		
		<!-- Multi Step Form -->
		<div class="msf-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 msf-title">
	                    <h3>Provide us all your details</h3>
	                    <p>Please complete the form below to get instant access to generate Resume/CV and all its features:</p>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 msf-form">
	                    
	                    <form role="form" action="add_resume.php" method="POST" class="form-inline" enctype="multipart/form-data">
	                    	
	                    	<fieldset>
	            				<h4>Introduction <span class="step">(Step 1 / 13)</span></h4>
	            				<div class="form-group">
				                    <label for="name">Full Name:</label><br>
				                    <input type="text" name="name" class="name form-control" id="name">
				                </div>
				                <div class="form-group">
				                    <label for="father_name">Father Name:</label><br>
				                    <input type="text" name="father_name" class="father_name form-control" id="father_name">
				                </div>
                                <div class="form-group">
				                    <label for="mobile">Mobile Number:</label><br>
				                    <input type="text" name="mobile" class="mobile form-control" id="mobile">
				                </div>
                                <div class="form-group">
				                    <label for="email">Email Id:</label><br>
				                    <input type="text" name="email" class="email form-control" id="email">
				                </div>
				                <div class="form-group">
				                    <label for="address">Address:</label><br>
				                    <input type="text" name="address" class="address form-control" id="address">
				                </div>
				                <div class="form-group">
				                    <label for="city">City:</label><br>
				                    <input type="text" name="city" class="city form-control" id="city">
				                </div>
                                 <div class="form-group">
				                    <label for="district">District:</label><br>
				                    <input type="text" name="district" class="district form-control" id="district">
				                </div>
                                <div class="form-group">
				                    <label for="pincode">Pin Code:</label><br>
				                    <input type="text" name="pincode" class="pincode form-control" id="pincode">
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
                            
                            <fieldset>
	            				<h4>Carrer Objective <span class="step">(Step 2 / 13)</span></h4>
	            				<div class="form-group">
									<label for="carrer_objective">Tell us a bit about your carrer objective:</label><br>
				                    <textarea name="carrer_objective" class="carrer_objective form-control" id="carrer_objective"></textarea>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset>
	            				<h4>Education details(Degree) <span class="step">(Step 3(I) / 13)</span></h4>
	            				<div class="form-group">
				                    <label for="deg_course">Course:</label><br>
				                    <input type="text" name="deg_course" class="deg_course form-control" id="deg_course">
				                </div>
				                <div class="form-group">
				                    <label for="deg_institution">Institution:</label><br>
				                    <input type="text" name="deg_institution" class="deg_institution form-control" id="deg_institution">
				                </div>
				                <div class="form-group">
				                    <label for="place">Place:</label><br>
				                    <input type="text" name="deg_place" class="deg_place form-control" id="deg_place">
				                </div>
				                <div class="form-group">
				                    <label for="deg_yop">Year Of Passing:</label><br>
				                    <input type="text" name="deg_yop" class="deg_yop form-control" id="deg_yop">
				                </div>
                                <div class="form-group">
				                    <label for="deg_parcentage">Parcentage:</label><br>
				                    <input type="text" name="deg_parcentage" class="deg_parcentage form-control" id="deg_parcentage">
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
                            
                            <fieldset>
	            				<h4>Education details(HSC) <span class="step">(Step 3(II) / 13)</span></h4>
	            				<div class="form-group">
				                    <label for="hsc_course">Course:</label><br>
				                    <input type="text" name="hsc_course" class="hsc_course form-control" id="hsc_course">
				                </div>
				                <div class="form-group">
				                    <label for="institution">Institution:</label><br>
				                    <input type="text" name="hsc_institution" class="hsc_institution form-control" id="hsc_institution">
				                </div>
				                <div class="form-group">
				                    <label for="hsc_place">Place:</label><br>
				                    <input type="text" name="hsc_place" class="hsc_place form-control" id="hsc_place">
				                </div>
				                <div class="form-group">
				                    <label for="hsc_yop">Year Of Passing:</label><br>
				                    <input type="text" name="hsc_yop" class="hsc_yop form-control" id="hsc_yop">
				                </div>
                                <div class="form-group">
				                    <label for="hsc_parcentage">Parcentage:</label><br>
				                    <input type="text" name="hsc_parcentage" class="hsc_parcentage form-control" id="hsc_parcentage">
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
                            
                            <fieldset>
	            				<h4>Education details(SSLC) <span class="step">(Step 3(III) / 13)</span></h4>
	            				<div class="form-group">
				                    <label for="sslc_course">Course:</label><br>
				                    <input type="text" name="sslc_course" class="sslc_course form-control" id="sslc_course">
				                </div>
				                <div class="form-group">
				                    <label for="sslc_institution">Institution:</label><br>
				                    <input type="text" name="sslc_institution" class="sslc_institution form-control" id="sslc_institution">
				                </div>
				                <div class="form-group">
				                    <label for="sslc_place">Place:</label><br>
				                    <input type="text" name="sslc_place" class="sslc_place form-control" id="sslc_place">
				                </div>
				                <div class="form-group">
				                    <label for="yop">Year Of Passing:</label><br>
				                    <input type="text" name="sslc_yop" class="sslc_yop form-control" id="sslc_yop">
				                </div>
                                <div class="form-group">
				                    <label for="sslc_parcentage">Parcentage:</label><br>
				                    <input type="text" name="sslc_parcentage" class="sslc_parcentage form-control" id="sslc_parcentage">
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset>
	            				<h4>Technical Skills Information <span class="step">(Step 4 / 13)</span></h4>

				                <div class="form-group">
				                    <label for="tech_skill">Tell us all your Technical Skills:</label><br>
				                    <textarea name="tech_skill" class="tech_skill form-control" id="tech_skill"></textarea>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	                    	
	                    	<fieldset>
	            				<h4>Academic Project <span class="step">(Step 5 / 13)</span></h4>
	            				<div class="form-group">
				                    <label for="project_title">Project Title:</label><br>
				                    <input type="text" name="project_title" class="project_title form-control" id="project_title">
				                </div>
				                <div class="form-group">
				                    <label for="project_disc">Project Discription:</label><br>
				                    <textarea  name="project_disc" class="project_disc form-control" id="project_disc"></textarea>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
                            
                            <fieldset>
	            				<h4>Inplant Training <span class="step">(Step 6 / 13)</span></h4>
				                <div class="form-group">
				                    <label for="inplant_train">Discription about Inplant Training:</label><br>
				                    <textarea  name="inplant_train" class="inplant_train form-control" id="inplant_train"></textarea>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
                            
                            <fieldset>
	            				<h4>Conference <span class="step">(Step 7 / 13)</span></h4>
	            				<div class="form-group">
				                    <label for="conference_title">Title:</label><br>
				                    <input type="text" name="conference_title" class="conference_title form-control" id="conference_title">
				                </div>
				                <div class="form-group">
				                    <label for="conference_disc">Discription:</label><br>
				                    <textarea  name="conference_disc" class="conference_disc form-control" id="conference_disc"></textarea>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
                            
                            <fieldset>
	            				<h4>Achievements <span class="step">(Step 8 / 13)</span></h4>
				                <div class="form-group">
				                    <label for="achievements">Tell us all your Achievements:</label><br>
				                    <textarea  name="achievements" class="achievements form-control" id="achievements"></textarea>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
                            
                             <fieldset>
	            				<h4>Area Of Interest <span class="step">(Step 9 / 13)</span></h4>
				                <div class="form-group">
				                    <label for="aoi">Tell us all your Area Of Interest:</label><br>
				                    <textarea  name="aoi" class="aoi form-control" id="aoi"></textarea>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
                            
                             <fieldset>
	            				<h4>Languages Known <span class="step">(Step 9 / 13)</span></h4>
				                <div class="form-group">
				                    <label for="language">Tell us all your Languages Known:</label><br>
				                    <textarea  name="language" class="language form-control" id="language"></textarea>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
                            
                            <fieldset>
	            				<h4>Personal details <span class="step">(Step 10 / 13)</span></h4>
	            				<div class="form-group">
				                    <label for="dob">Date Of Birth:</label><br>
				                    <input type="text" name="dob" class="dob form-control" id="dob" placeholder="mm/dd/yyyy">
				                </div>
				                <div class="form-group">
				                    <label for="gender">Gender:</label><br>
				                    <input type="text" name="gender" class="gender form-control" id="gender">
				                </div>
				                <div class="form-group">
				                    <label for="nationality">Nationality:</label><br>
				                    <input type="text" name="nationality" class="nationality form-control" id="nationality">
				                </div>
                                <div class="form-group">
				                    <label for="material_status">Material Status:</label><br>
				                    <input type="text" name="material_status" class="material_status form-control" id="material_status">
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
                            
                             <fieldset>
	            				<h4>Profile Photo<span class="step">(Step 11 / 13)</span></h4>
				                <div class="form-group">
				                    <label for="photo">Add your professional photo:</label><br>
				                    <input type="file"  name="photo" class="photo form-control" id="photo">
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset>
	            				<h4> Declaration <span class="step">(Step 12 / 13)</span></h4>
	            				<div class="form-group">
									<label for="declaration">Give your Declaration Statement :</label><br>
				                    <textarea name="declaration" class="declaration form-control" id="declaration"></textarea>
				                </div>
	            				<br>
                                <button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
 	            			<fieldset>
	            				<h4> Signature <span class="step">(Step 13 / 13)</span></h4>
	            				<div class="form-group">
									<label for="sign">Signature or Name :</label><br>
				                    <textarea name="sign" class="sign form-control" id="sign"></textarea>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="submit" class="btn btn-success" name="submit" value="">Submit To Email</button>
                                <button type="submit" class="btn btn-danger" name="save_pdf" value="">Generate in PDF</button>
                                <button type="submit" class="btn btn-primary" name="save_word" value="">Generate in Word</button>
	            			</fieldset>
	                    	
	                    </form>
	                    
	                </div>
	            </div>
			</div>
		</div>
		
		

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
        

    </body>

</html>
