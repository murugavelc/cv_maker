<?php

/**
 * @author lolkittens
 * @copyright 2017
 */
// Include confi.php
include_once('config.php');

/* connect to the local Mail server */
require 'include/PHPMailer/PHPMailerAutoload.php';
/* include autoloader */
require_once 'include/dompdf/autoload.inc.php';

/* reference the Dompdf namespace */

use Dompdf\Dompdf;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $json = '';
    if(isset($_POST['submit']))
    { 
        $email =$_POST['email'];
        $sql = "SELECT * FROM `resumes` WHERE `email` = '$email'";
        $check = mysqli_query($link,$sql);
        $result = mysqli_fetch_assoc($check);    
       
        if (!empty($result)){
            	 // Get data
            	 $name = isset($_POST['name']) ? mysql_real_escape_string($_POST['name']) : "";
            	 $father_name = isset($_POST['father_name']) ? mysql_real_escape_string($_POST['father_name']) : "";
            	 $mobile = isset($_POST['mobile']) ? mysql_real_escape_string($_POST['mobile']) : "";
            	 $email = isset($_POST['email']) ? mysql_real_escape_string($_POST['email']) : "";
            	 $address = isset($_POST['address']) ? mysql_real_escape_string($_POST['address']) : "";
            	 $city = isset($_POST['city']) ? mysql_real_escape_string($_POST['city']) : "";
            	 $district = isset($_POST['district']) ? mysql_real_escape_string($_POST['district']) : "";
            	 $pincode = isset($_POST['pincode']) ? mysql_real_escape_string($_POST['pincode']) : "";
            	 $carrer_objective = isset($_POST['carrer_objective']) ? mysql_real_escape_string($_POST['carrer_objective']) : "";
            	 
                 $deg_course = isset($_POST['deg_course']) ? mysql_real_escape_string($_POST['deg_course']) : "";
            	 $deg_institution = isset($_POST['deg_institution']) ? mysql_real_escape_string($_POST['deg_institution']) : "";
            	 $deg_place = isset($_POST['deg_place']) ? mysql_real_escape_string($_POST['deg_place']) : "";
            	 $deg_yop = isset($_POST['deg_yop']) ? mysql_real_escape_string($_POST['deg_yop']) : "";
            	 $deg_parcentage = isset($_POST['deg_parcentage']) ? mysql_real_escape_string($_POST['deg_parcentage']) : "";
                 
                 $hsc_course = isset($_POST['hsc_course']) ? mysql_real_escape_string($_POST['hsc_course']) : "";
            	 $hsc_institution = isset($_POST['hsc_institution']) ? mysql_real_escape_string($_POST['hsc_institution']) : "";
            	 $hsc_place = isset($_POST['hsc_place']) ? mysql_real_escape_string($_POST['hsc_place']) : "";
            	 $hsc_yop = isset($_POST['hsc_yop']) ? mysql_real_escape_string($_POST['hsc_yop']) : "";
            	 $hsc_parcentage = isset($_POST['hsc_parcentage']) ? mysql_real_escape_string($_POST['hsc_parcentage']) : "";
                 
                 $sslc_course = isset($_POST['sslc_course']) ? mysql_real_escape_string($_POST['sslc_course']) : "";
            	 $sslc_institution = isset($_POST['sslc_institution']) ? mysql_real_escape_string($_POST['sslc_institution']) : "";
            	 $sslc_place = isset($_POST['sslc_place']) ? mysql_real_escape_string($_POST['sslc_place']) : "";
            	 $sslc_yop = isset($_POST['sslc_yop']) ? mysql_real_escape_string($_POST['sslc_yop']) : "";
            	 $sslc_parcentage = isset($_POST['sslc_parcentage']) ? mysql_real_escape_string($_POST['sslc_parcentage']) : "";
                 
            	 $tech_skill = isset($_POST['tech_skill']) ? mysql_real_escape_string($_POST['tech_skill']) : "";
            	 $project_title = isset($_POST['project_title']) ? mysql_real_escape_string($_POST['project_title']) : "";
            	 $project_disc = isset($_POST['project_disc']) ? mysql_real_escape_string($_POST['project_disc']) : "";
            	 $inplant_train = isset($_POST['inplant_train']) ? mysql_real_escape_string($_POST['inplant_train']) : "";
            	 $conference_title = isset($_POST['conference_title']) ? mysql_real_escape_string($_POST['conference_title']) : "";
            	 $conference_disc = isset($_POST['conference_disc']) ? mysql_real_escape_string($_POST['conference_disc']) : "";
            	 $achievements = isset($_POST['achievements']) ? mysql_real_escape_string($_POST['achievements']) : "";
            	 $aoi = isset($_POST['aoi']) ? mysql_real_escape_string($_POST['aoi']) : "";
            	 $language = isset($_POST['language']) ? mysql_real_escape_string($_POST['language']) : "";
            	 $dob = isset($_POST['dob']) ? mysql_real_escape_string($_POST['dob']) : "";
            	 $gender = isset($_POST['gender']) ? mysql_real_escape_string($_POST['gender']) : "";
                 $material_status = isset($_POST['material_status']) ? mysql_real_escape_string($_POST['gender']) : "";
            	 $nationality = isset($_POST['nationality']) ? mysql_real_escape_string($_POST['material_status']) : "";
            	 $photo = isset($_FILES['photo']['name']) ? mysql_real_escape_string($_FILES['photo']['name']) : "";
            	 $declaration = isset($_POST['declaration']) ? mysql_real_escape_string($_POST['declaration']) : "";
                 $sign = isset($_POST['sign']) ? mysql_real_escape_string($_POST['sign']) : "";
                 
                    if(isset($_FILES['photo']['name'])){
                       // $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'\lara\api\cv_maker\uploads\profile';
                        $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/dev_cvmaker/uploads/profile';
                        $tmp_name = $_FILES["photo"]["tmp_name"];
                        $photoname = basename($_FILES["photo"]["name"]);
                        move_uploaded_file($tmp_name, "$uploads_dir/$photoname");
               }
             
             // Insert data into data base
             $sql = "INSERT INTO `cv_manager`.`resumes` (`name`, `father_name`, `mobile`, `email`, `address`, `city`, `district`, `pincode`, 
              `carrer_objective`, `deg_course`, `deg_institution`, `deg_place`, `deg_yop`, `deg_parcentage`, `hsc_course`, `hsc_institution`,
              `hsc_place`, `hsc_yop`, `hsc_parcentage`, `sslc_course`, `sslc_institution`, `sslc_place`, `sslc_yop`, `sslc_parcentage`, `tech_skill`,
              `project_title`, `project_disc`, `inplant_train`, `conference_title`, `conference_disc`, `achievements`, `aoi`, `language`, `dob`,
              `gender`, `material_status`, `nationality`, `photo`, `declaration`, `sign`)
             VALUES ('$name', '$father_name', '$mobile', '$email', '$address', '$city', '$district', '$pincode', '$carrer_objective', '$deg_course',
              '$deg_institution', '$deg_place', '$deg_yop', '$deg_parcentage', '$hsc_course', '$hsc_institution', '$hsc_place', '$hsc_yop',
              '$hsc_parcentage', '$sslc_course', '$sslc_institution', '$sslc_place', '$sslc_yop', '$sslc_parcentage', '$tech_skill', '$project_title',
              '$project_disc', '$inplant_train', '$conference_title', '$conference_disc', '$achievements', '$aoi', '$language', '$dob', '$gender',
              '$material_status', '$nationality', '$photoname', '$declaration', '$sign');";
             $save = mysqli_query($link,$sql);
             $last_id = mysqli_insert_id();
        	 if($save)
             {
                /* instantiate and use the dompdf class */
                $title = str_replace(' ', '+',$conference_title);
                $url = "http://dev192.com/smsjournals/wp-api/web_check_paper.php?email=$email&title=$title";

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($ch, CURLOPT_URL,$url);
                $result=curl_exec($ch);
                curl_close($ch);
              
                $check_paper = json_decode($result, true);
                $check_paper_status = $check_paper['result'];
                $con_title_url = '';
                if($check_paper_status == 'available'){
                    $con_title = str_replace(' ', '-', strtolower($conference_title));
                    $con_title_url = "http://dev192.com/smsjournals/".$con_title;
                }
                
                $dompdf = new Dompdf();
                $curDate = date("d-m-Y");
                                if($format == 1){
                    $html = '<!DOCTYPE html>
                            <html>
                            
                            <head>
                                <title>Resume</title>
                            
                                <style>
                                    .container {
                                        width: 95%;
                                        margin: 0 auto;
                                        font-family: "Times New Roman", Times, serif;
                                    }
                            
                                    .main .title {
                                        font-size: 2.0em;
                                        text-transform: uppercase;
                                        margin-bottom: 10px;
                                    }
                            
                                    #contact {
                                        list-style-type: none;
                                        padding: 0;
                                        margin: 0;
                                    }
                            
                                    #contact > li {
                                        display: inline-block;
                                        margin-right: 10px;
                                    }
                            
                                    #contact > li > img {
                                        width: 20px;
                                        height: 20px;
                                        margin-right: 2px;
                                    }
                            
                                    .profile {
                                        width: 120px;
                                        height: 120px;
                                        margin-left: 30px;
                                    }
                            
                                    img {
                                       width: 120px;
                                        height: 120px;
                                        margin-left: 30px;
                                    }
                            
                                    #contact > li > img,
                                    #contact > li > span {
                                        display: inline-block;
                                        vertical-align: middle;
                                    }
                            
                                    a,
                                    a:visited {
                                        color: #3333CC;
                                        text-decoration: none;
                                    }
                            
                                    .section .title {
                                        text-transform: uppercase;
                                        background-color: #CCCCFF;
                                    }
                            
                                    .inline {
                                        display: inline-block;
                                        vertical-align: top;
                                    }
                            
                                    .width-70 {
                                        width: 68%;
                                    }
                            
                                    .width-60 {
                                        width: 58%;
                                    }
                            
                                    .width-50 {
                                        width: 48%;
                                    }
                            
                                    .width-40 {
                                        width: 38%;
                                    }
                            
                                    .width-30 {
                                        width: 28%;
                                    }
                            
                                    .width-20 {
                                        width: 18%;
                                    }
                            
                                    .width-10 {
                                        width: 8%;
                                    }
                            
                                    .section {
                                        font-size: 13px;
                                    }
                            
                                    .title {
                                        margin-bottom: 5px;
                                        font-size: 15px;
                                    }
                            
                                    .content {
                                        margin-top: 5px;
                                    }
                            
                                    .content p {
                                        margin: 0;
                                    }
                            
                                    .content h1,
                                    .content h2,
                                    .content h3,
                                    .content h4,
                                    .content h5,
                                    .content h6 {
                                        margin: 0;
                                    }
                            
                                    .project,
                                    .work {
                                        margin: 7px 0px;
                                    }
                            
                                     table.sign, table.sign td, table.sign th{    
                                        border: none;
                                    }
                                     table.education, td, th {    
                                        border: 1px solid #ddd;
                                        border-collapse: collapse;
                                        text-align: left;
                                    }
                                    
                                    table {
                                        width: 100%;
                                        font-size: 13px;
                                    }
                                    
                                    th, td {
                                        padding: 5px;
                                    }
                                </style>
                            </head>
                            
                            <body>
                            <div class="container">
                                <div class="main">
                                    <div class="content">
                                        <table class = "sign">
                                            <tr>
                                                <td>
                                                    <h1 class="title">'.$_POST['name'].'</h1>
                                                     <strong>Email: </strong><span> '.$_POST['email'].'</span> <br />
                                                     <strong>Phone: </strong><span>'.$_POST['mobile'].'</span> <br />
                                                     <strong>Address: </strong> <span> '.$_POST['address'].', &nbsp;'.$_POST['city'].',&nbsp;'.$_POST['district'].'-'. $_POST['pincode'].'</span>
                                                </td>
                                                <td></td>
                                                <td style = "text-align: right;">
                                                    <img class="profile" src="'.$uploads_dir.'/'.$photoname.'" alt="" style= "width: 120px;height: 120px;" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <hr />
                            
                                <div class="section">
                                    <h2 class="title">Career Objective</h2>
                                    <div class="content">
                                        <p>'.$_POST['carrer_objective'].'</p>
                                    </div>
                                </div>
                                <div class="section">
                                    <h2 class="title">Education</h2>
                                      <table class ="education">
                                        <thead>
                                          <tr>
                                            <th>Course</th>
                                            <th>Institution</th>
                                            <th>Place</th>
                                            <th>Year</th>
                                            <th>Parcentage</th>
                                          </tr>
                                        </thead>
                                        <tr>
                                            <td>
                                            <p>'.$_POST['deg_course'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['deg_institution'].'</p>
                                             </td>
                                            <td>
                                                <p>'.$_POST['deg_place'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['deg_yop'].'</p>
                                           </td>
                                            <td>
                                                <p>'.$_POST['deg_parcentage'].'</p>
                                           </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <p>'.$_POST['hsc_course'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['hsc_institution'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['hsc_place'].'</p>
                                           </td>
                                            <td>
                                                <p>'.$_POST['hsc_yop'].'</p>
                                           </td>
                                            <td>
                                                <p>'.$_POST['hsc_parcentage'].'</p>
                                           </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <p>'.$_POST['sslc_course'].'</p>
                                           </td>
                                            <td>
                                                <p>'.$_POST['sslc_institution'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['sslc_place'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['sslc_yop'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['sslc_parcentage'].'</p>
                                            </td>
                                          </tr>
                                    </tbody>
                                  </table>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Technical Skills</h2>
                                    <div class="content">
                                        <ul>
                                          <li>'.$_POST['tech_skill'].'</li>
                                          <li>'.$_POST['tech_skill2'].'</li>
                                          <li>'.$_POST['tech_skill3'].'</li>
                                        </ul>
                                        <!--<p><strong>Frameworks/Tools:</strong> Punch Cards</p> -->
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Inplant Training</h2>
                                    <div class="content">
                                        <p>'.$_POST['inplant_train'].'</p>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Conference/Journals</h2>
                                    <div class="content">
                                        <h4><b>'.$_POST['conference_title'].'</b></h4>
                                        <p>'.$_POST['conference_disc'].'</p>
                                        <p><a href="#">'.$con_title_url.'</a></p>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Acadamic Projects</h2>
                                    <div class="content">
                                        <div class="project">
                                            <h4><b>'.$_POST['project_title'].'</b></h4>
                                            <p>'.$_POST['project_disc'].'</p>
                                            <!--<p><a href="#">protects.com/projects/projectname</a></p>-->
                                        </div>
                                        <!-- <div class="project">
                                        <h4></h4>
                                        <p></p>
                                        <p><a href=""></a></p>
                                    </div> -->
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Achievements</h2>
                                    <div class="content">
                                        <ul>
                                          <li>'.$_POST['achievements'].'</li>
                                          <li>'.$_POST['achievements2'].'</li>
                                        </ul>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Areas of Interest</h2>
                                    <div class="content">
                                        <ul>
                                          <li>'.$_POST['aoi'].'</li>
                                          <li>'.$_POST['aoi2'].'</li>
                                          <li>'.$_POST['aoi3'].'</li>
                                        </ul>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Languages Known</h2>
                                    <div class="content">
                                        <ul>
                                          <li>'.$_POST['language'].'</li>
                                          <li>'.$_POST['language2'].'</li>
                                          <li>'.$_POST['language3'].'</li>
                                        </ul>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Personal Details</h2>
                                    <div class="content">
                            
                                        <strong>Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['dob'].'</span>
                                        <br />
                            
                                        <strong>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['gender'].'</span>
                                        <br />
                            
                                        <strong>Material Status&nbsp;&nbsp;&nbsp;: </strong><span> '.$_POST['material_status'].' </span>
                                        <br />
                            
                                        <strong>Nationality&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <span>'.$_POST['nationality'].'</span>
                            
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Declaration</h2>
                                    <div class="content">
                                        <p>'.$_POST['declaration'].'</p>
                                    </div>
                                </div>
                                <br />
                                <br />
                            
                                <div class="section">
                                    <div class="content">
                                        <table class = "sign">
                                            <tr>
                                                <td>
                                                <br />
                                                    <strong>Date: </strong><span>'.$curDate.'</span>
                                                    <br />
                                                    <strong>Place: </strong><span>'.$_POST['district'].'</span>
                                                    <br />
                                                </td>
                                                <td></td>
                                                <td style = "text-align: center;">
                                                    <p>Yours Faithfully,</p>
                                                    <br />
                                                    <p>'.$_POST['sign'].'</p>
                                                    <br />
                                                    <strong>('.$_POST['name'].')</strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            
                                <!--	<div class="section">
                                <h2 class="title">Work Experience</h2>
                                <div class="content">
                                    <div class="work">
                                        <h4>Stark Industries</h4>
                                        <p>Major upgrades Iron Man armors flight system.</p>
                                    </div>
                                    <div class="work">
                                        <h4>S.H.I.E.L.D.</h4>
                                        <p>Worked on a containment module for The Hulk.</p>
                                    </div>
                                     <div class="work">
                                        <h4></h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="section">
                                <h2 class="title"></h2>
                                <div class="hr"></div>
                                <div class="content">
                                    <p></p>
                                </div>
                            </div> -->
                            </div>
                            </body>
                            
                            </html>';
                }elseif($format == 2){
                    $html = '<!DOCTYPE html>
                            <html>
                            
                            <head>
                                <title>Resume</title>
                            
                                <style>
                                    .container {
                                        width: 95%;
                                        margin: 0 auto;
                                        font-family: Arial, Helvetica, sans-serif;
                                    }
                            
                                    .main .title {
                                        font-size: 2.0em;
                                        text-transform: uppercase;
                                        margin-bottom: 10px;
                                        text-align: center;
                                    }
                                                        
                                    #contact {
                                        list-style-type: none;
                                        padding: 0;
                                        margin: 0;
                                    }
                            
                                    #contact > li {
                                        display: inline-block;
                                        margin-right: 10px;
                                    }
                            
                                    #contact > li > img {
                                        width: 20px;
                                        height: 20px;
                                        margin-right: 2px;
                                    }
                            
                                    .profile {
                                        width: 120px;
                                        height: 120px;
                                        margin-left: 30px;
                                    }
                            
                                    img {
                                       width: 120px;
                                        height: 120px;
                                        margin-left: 30px;
                                    }
                            
                                    #contact > li > img,
                                    #contact > li > span {
                                        display: inline-block;
                                        vertical-align: middle;
                                    }
                            
                                    a,
                                    a:visited {
                                        color: #3333CC;
                                        text-decoration: none;
                                    }
                            
                                    .section .title {
                                        text-transform: uppercase;
                                        background-color: #000000;
                                        text-align: center;
                                        color: #FFFFFF;
                                    }
                            
                                    .inline {
                                        display: inline-block;
                                        vertical-align: top;
                                    }
                            
                                    .width-70 {
                                        width: 68%;
                                    }
                            
                                    .width-60 {
                                        width: 58%;
                                    }
                            
                                    .width-50 {
                                        width: 48%;
                                    }
                            
                                    .width-40 {
                                        width: 38%;
                                    }
                            
                                    .width-30 {
                                        width: 28%;
                                    }
                            
                                    .width-20 {
                                        width: 18%;
                                    }
                            
                                    .width-10 {
                                        width: 8%;
                                    }
                                    .section {
                                        font-size: 13px;
                                        margin-left: 15px;
                                    
                                    }
                            
                                    .title {
                                        margin-bottom: 5px;
                                        font-size: 15px;
                                    }
                            
                                    .content {
                                        margin-top: 5px;
                                        margin-left: 15px;
                                    }
                            
                                    .content p {
                                        margin-top: 5px;
                                        margin-left: 5px;
                                    
                                    }
                            
                                    .content h1,
                                    .content h2,
                                    .content h3,
                                    .content h4,
                                    .content h5,
                                    .content h6 {
                                        margin: 0;
                                    }
                            
                                    .project,
                                    .work {
                                        margin: 7px 0px;
                                    }
                            
                                     table.sign, table.sign td, table.sign th{    
                                        border: none;
                                    }
                                     table.education, td, th {    
                                        border: 3px solid #000;
                                        border-collapse: collapse;
                                        text-align: left;
                                    }
                                    
                                    table {
                                        width: 100%;
                                        font-size: 13px;
                                        margin-left: 15px;
                                    }
                                    
                                    th, td {
                                        padding: 5px;
                                    }
                                </style>
                            </head>
                            
                            <body>
                            <div class="container">
                                <div class="main">
                                    <div class="content">
                                        <table class = "sign">
                                            <tr>
                                                <td>
                                                    <h1 class="title">'.$_POST['name'].'</h1>
                                                     <strong>Email: </strong><span> '.$_POST['email'].'</span> <br />
                                                     <strong>Phone: </strong><span>'.$_POST['mobile'].'</span> <br />
                                                     <strong>Address: </strong> <span> '.$_POST['address'].', &nbsp;'.$_POST['city'].',&nbsp;'.$_POST['district'].'-'. $_POST['pincode'].'</span>
                                                </td>
                                                <td></td>
                                                <td style = "text-align: right;">
                                                    <img class="profile" src="'.$uploads_dir.'/'.$photoname.'" alt="" style= "width: 120px;height: 120px;  border-radius: 10px;" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <hr />
                            
                                <div class="section">
                                    <h2 class="title">Career Objective</h2>
                                    <div class="content">
                                        <p>'.$_POST['carrer_objective'].'</p>
                                    </div>
                                </div>
                                <div class="section">
                                    <h2 class="title">Education</h2>
                                      <table class ="education">
                                        <thead>
                                          <tr>
                                            <th>Course</th>
                                            <th>Institution</th>
                                            <th>Place</th>
                                            <th>Year</th>
                                            <th>Parcentage</th>
                                          </tr>
                                        </thead>
                                        <tr>
                                            <td>
                                            <p>'.$_POST['deg_course'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['deg_institution'].'</p>
                                             </td>
                                            <td>
                                                <p>'.$_POST['deg_place'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['deg_yop'].'</p>
                                           </td>
                                            <td>
                                                <p>'.$_POST['deg_parcentage'].'</p>
                                           </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <p>'.$_POST['hsc_course'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['hsc_institution'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['hsc_place'].'</p>
                                           </td>
                                            <td>
                                                <p>'.$_POST['hsc_yop'].'</p>
                                           </td>
                                            <td>
                                                <p>'.$_POST['hsc_parcentage'].'</p>
                                           </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <p>'.$_POST['sslc_course'].'</p>
                                           </td>
                                            <td>
                                                <p>'.$_POST['sslc_institution'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['sslc_place'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['sslc_yop'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['sslc_parcentage'].'</p>
                                            </td>
                                          </tr>
                                    </tbody>
                                  </table>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Technical Skills</h2>
                                    <div class="content">
                                        <ul>
                                          <li>'.$_POST['tech_skill'].'</li>
                                          <li>'.$_POST['tech_skill2'].'</li>
                                          <li>'.$_POST['tech_skill3'].'</li>
                                        </ul>
                                        <!--<p><strong>Frameworks/Tools:</strong> Punch Cards</p> -->
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Inplant Training</h2>
                                    <div class="content">
                                        <p>'.$_POST['inplant_train'].'</p>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Conference/Journals</h2>
                                    <div class="content">
                                        <h4><b>'.$_POST['conference_title'].'</b></h4>
                                        <p>'.$_POST['conference_disc'].'</p>
                                        <p><a href="#">'.$con_title_url.'</a></p>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Acadamic Projects</h2>
                                    <div class="content">
                                        <div class="project">
                                            <h4><b>'.$_POST['project_title'].'</b></h4>
                                            <p>'.$_POST['project_disc'].'</p>
                                            <!--<p><a href="#">protects.com/projects/projectname</a></p>-->
                                        </div>
                                        <!-- <div class="project">
                                        <h4></h4>
                                        <p></p>
                                        <p><a href=""></a></p>
                                    </div> -->
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Achievements</h2>
                                    <div class="content">
                                        <ul>
                                          <li>'.$_POST['achievements'].'</li>
                                          <li>'.$_POST['achievements2'].'</li>
                                        </ul>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Areas of Interest</h2>
                                    <div class="content">
                                        <ul>
                                          <li>'.$_POST['aoi'].'</li>
                                          <li>'.$_POST['aoi2'].'</li>
                                          <li>'.$_POST['aoi3'].'</li>
                                        </ul>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Languages Known</h2>
                                    <div class="content">
                                        <ul>
                                          <li>'.$_POST['language'].'</li>
                                          <li>'.$_POST['language2'].'</li>
                                          <li>'.$_POST['language3'].'</li>
                                        </ul>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Personal Details</h2>
                                    <div class="content">
                            
                                        <strong>Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['dob'].'</span>
                                        <br />
                            
                                        <strong>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['gender'].'</span>
                                        <br />
                            
                                        <strong>Material Status&nbsp;&nbsp;&nbsp;: </strong><span> '.$_POST['material_status'].' </span>
                                        <br />
                            
                                        <strong>Nationality&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <span>'.$_POST['nationality'].'</span>
                            
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Declaration</h2>
                                    <div class="content">
                                        <p>'.$_POST['declaration'].'</p>
                                    </div>
                                </div>
                                <br />
                                <br />
                            
                                <div class="section">
                                    <div class="content">
                                        <table class = "sign">
                                            <tr>
                                                <td>
                                                <br />
                                                    <strong>Date: </strong><span>'.$curDate.'</span>
                                                    <br />
                                                    <strong>Place: </strong><span>'.$_POST['district'].'</span>
                                                    <br />
                                                </td>
                                                <td></td>
                                                <td style = "text-align: center;">
                                                    <p>Yours Faithfully,</p>
                                                    <br />
                                                    <p>'.$_POST['sign'].'</p>
                                                    <br />
                                                    <strong>('.$_POST['name'].')</strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </body>
                            
                            </html>';
                }elseif($format == 3){
                    $html = '<!DOCTYPE html>
                            <html>
                            
                            <head>
                                <title>Resume</title>
                            
                                <style>
                                    .container {
                                        width: 95%;
                                        margin: 0 auto;
                                        font-family: "Courier New", Courier, monospace;
                                    }
                            
                                    .main .title {
                                        font-size: 2.0em;
                                        text-transform: uppercase;
                                        margin-bottom: 10px;
                                        color: #F08080;
                                    }
                            
                                    #contact {
                                        list-style-type: none;
                                        padding: 0;
                                        margin: 0;
                                    }
                            
                                    #contact > li {
                                        display: inline-block;
                                        margin-right: 10px;
                                    }
                            
                                    #contact > li > img {
                                        width: 20px;
                                        height: 20px;
                                        margin-right: 2px;
                                    }
                            
                                    .profile {
                                        width: 120px;
                                        height: 120px;
                                        margin-left: 30px;
                                    }
                            
                                    img {
                                       width: 120px;
                                        height: 120px;
                                        margin-left: 30px;
                                    }
                            
                                    #contact > li > img,
                                    #contact > li > span {
                                        display: inline-block;
                                        vertical-align: middle;
                                    }
                            
                                    a,
                                    a:visited {
                                        color: #3333CC;
                                        text-decoration: none;
                                    }
                            
                                    .section .title {
                                        color: #F08080;
                                        text-decoration: none;
                                        border-bottom: 1px solid blue;
                                    }
                            
                                    .inline {
                                        display: inline-block;
                                        vertical-align: top;
                                    }
                            
                                    .width-70 {
                                        width: 68%;
                                    }
                            
                                    .width-60 {
                                        width: 58%;
                                    }
                            
                                    .width-50 {
                                        width: 48%;
                                    }
                            
                                    .width-40 {
                                        width: 38%;
                                    }
                            
                                    .width-30 {
                                        width: 28%;
                                    }
                            
                                    .width-20 {
                                        width: 18%;
                                    }
                            
                                    .width-10 {
                                        width: 8%;
                                    }
                            
                                    .section {
                                        font-size: 13px;
                                        text-align: center;
                                    }
                            
                                    .title {
                                        margin-bottom: 5px;
                                        font-size: 15px;
                                    }
                            
                                    .content {
                                        margin-top: 5px;
                                        
                                    }
                            
                                    .content p {
                                        margin: 0;
                                    }
                            
                                    .content h1,
                                    .content h2,
                                    .content h3,
                                    .content h4,
                                    .content h5,
                                    .content h6 {
                                        margin: 0;
                                    }
                            
                                    .project,
                                    .work {
                                        margin: 7px 0px;
                                    }
                            
                                     table.sign, table.sign td, table.sign th{    
                                        border: none;
                                    }
                                     table.education, td, th {    
                                     
                                        text-align: center;
                                    }
                                    
                                    table {
                                        width: 100%;
                                        font-size: 13px;
                                    }
                                    
                                    th, td {
                                        padding: 5px;
                                    }
                                </style>
                            </head>
                            
                            <body>
                            <div class="container">
                                <div class="main">
                                    <div class="content">
                                        <table class = "sign">
                                            <tr>
                                                <td>
                                                    <h2 class="title">'.$_POST['name'].'</h2>
                                                    
                                                </td>
                                                <td></td>
                                                <td style = "text-align: right;">
                                                    <img class="profile" ssrc="'.$uploads_dir.'/'.$photoname.'" alt="" style= "width: 120px;height: 120px; border-radius: 50%;" />
                                                </td>
                                            </tr>
                                            <tr  style="background-color: #F08080;" >
                                                <td style="width: 30%;">
                                                <strong>Email: </strong><span> '.$_POST['email'].'</span>
                                                </td><td style="width: 20%;">
                                                <strong>Phone: </strong><span>'.$_POST['mobile'].'</span>
                                                </td><td style="width: 50%;">
                                                <strong>Address: </strong> <span> '.$_POST['address'].', &nbsp;'.$_POST['city'].',&nbsp;'.$_POST['district'].'-'. $_POST['pincode'].'</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            
                                <hr />
                            
                                <div class="section">
                                    <h2 class="title">Career Objective</h2>
                                    <div class="content">
                                        <p>'.$_POST['carrer_objective'].'</p>
                                    </div>
                                </div>
                                <div class="section">
                                    <h2 class="title">Education</h2>
                                      <table class ="education">
                                        <thead>
                                          <tr style="background-color: #F08080;">
                                            <th>Course</th>
                                            <th>Institution</th>
                                            <th>Place</th>
                                            <th>Year</th>
                                            <th>Parcentage</th>
                                          </tr>
                                        </thead>
                                        <tr>
                                            <td>
                                            <p>'.$_POST['deg_course'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['deg_institution'].'</p>
                                             </td>
                                            <td>
                                                <p>'.$_POST['deg_place'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['deg_yop'].'</p>
                                           </td>
                                            <td>
                                                <p>'.$_POST['deg_parcentage'].'</p>
                                           </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <p>'.$_POST['hsc_course'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['hsc_institution'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['hsc_place'].'</p>
                                           </td>
                                            <td>
                                                <p>'.$_POST['hsc_yop'].'</p>
                                           </td>
                                            <td>
                                                <p>'.$_POST['hsc_parcentage'].'</p>
                                           </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <p>'.$_POST['sslc_course'].'</p>
                                           </td>
                                            <td>
                                                <p>'.$_POST['sslc_institution'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['sslc_place'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['sslc_yop'].'</p>
                                            </td>
                                            <td>
                                                <p>'.$_POST['sslc_parcentage'].'</p>
                                            </td>
                                          </tr>
                                    </tbody>
                                  </table>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Technical Skills</h2>
                                    <div class="content">
                                        <ul>
                                          <li>'.$_POST['tech_skill'].'</li>
                                          <li>'.$_POST['tech_skill2'].'</li>
                                          <li>'.$_POST['tech_skill3'].'</li>
                                        </ul>
                                        <!--<p><strong>Frameworks/Tools:</strong> Punch Cards</p> -->
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Inplant Training</h2>
                                    <div class="content">
                                        <p>'.$_POST['inplant_train'].'</p>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Conference/Journals</h2>
                                    <div class="content">
                                        <h4><b>'.$_POST['conference_title'].'</b></h4>
                                        <p>'.$_POST['conference_disc'].'</p>
                                        <p><a href="#">'.$con_title_url.'</a></p>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Acadamic Projects</h2>
                                    <div class="content">
                                        <div class="project">
                                            <h4><b>'.$_POST['project_title'].'</b></h4>
                                            <p>'.$_POST['project_disc'].'</p>
                                            <!--<p><a href="#">protects.com/projects/projectname</a></p>-->
                                        </div>
                                        <!-- <div class="project">
                                        <h4></h4>
                                        <p></p>
                                        <p><a href=""></a></p>
                                    </div> -->
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Achievements</h2>
                                    <div class="content">
                                        <ul>
                                          <li>'.$_POST['achievements'].'</li>
                                          <li>'.$_POST['achievements2'].'</li>
                                        </ul>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Areas of Interest</h2>
                                    <div class="content">
                                        <ul>
                                          <li>'.$_POST['aoi'].'</li>
                                          <li>'.$_POST['aoi2'].'</li>
                                          <li>'.$_POST['aoi3'].'</li>
                                        </ul>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Languages Known</h2>
                                    <div class="content">
                                        <ul>
                                          <li>'.$_POST['language'].'</li>
                                          <li>'.$_POST['language2'].'</li>
                                          <li>'.$_POST['language3'].'</li>
                                        </ul>
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Personal Details</h2>
                                    <div class="content">
                            
                                        <strong>Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['dob'].'</span>
                                        <br />
                            
                                        <strong>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['gender'].'</span>
                                        <br />
                            
                                        <strong>Material Status&nbsp;&nbsp;&nbsp;: </strong><span> '.$_POST['material_status'].' </span>
                                        <br />
                            
                                        <strong>Nationality&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <span>'.$_POST['nationality'].'</span>
                            
                                    </div>
                                </div>
                            
                                <div class="section">
                                    <h2 class="title">Declaration</h2>
                                    <div class="content">
                                        <p>'.$_POST['declaration'].'</p>
                                    </div>
                                </div>
                                <br />
                                <br />
                            
                                <div class="section">
                                    <div class="content">
                                        <table class = "sign">
                                            <tr>
                                                <td style = "text-align: left;">
                                                <br />
                                                    <strong>Date: </strong><span>'.$curDate.'</span>
                                                    <br />
                                                    <strong>Place: </strong><span>'.$_POST['district'].'</span>
                                                    <br />
                                                </td>
                                                <td></td>
                                                <td style = "text-align: center;">
                                                    <p>Yours Faithfully,</p>
                                                    <br />
                                                    <p>'.$_POST['sign'].'</p>
                                                    <br />
                                                    <strong>('.$_POST['name'].')</strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            
                                <!--	<div class="section">
                                <h2 class="title">Work Experience</h2>
                                <div class="content">
                                    <div class="work">
                                        <h4>Stark Industries</h4>
                                        <p>Major upgrades Iron Man armors flight system.</p>
                                    </div>
                                    <div class="work">
                                        <h4>S.H.I.E.L.D.</h4>
                                        <p>Worked on a containment module for The Hulk.</p>
                                    </div>
                                     <div class="work">
                                        <h4></h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="section">
                                <h2 class="title"></h2>
                                <div class="hr"></div>
                                <div class="content">
                                    <p></p>
                                </div>
                            </div> -->
                            </div>
                            </body>
                            
                            </html>';
                }elseif($format == 4){
                    $html = '<!DOCTYPE html>
                            <html>
                            
                            <head>
                                <title>Resume</title>
                            
                                <style>
                                    .container {
                                        width: 95%;
                                        margin: 0 auto;
                                        font-family: "Times New Roman", Times, serif;
                                    }
                            
                                    .main .title {
                                        font-size: 2.0em;
                                        text-transform: uppercase;
                                        margin-bottom: 10px;
                                        color: #F08080;
                                    }
                            
                                    #contact {
                                        list-style-type: none;
                                        padding: 0;
                                        margin: 0;
                                    }
                            
                                    #contact > li {
                                        display: inline-block;
                                        margin-right: 10px;
                                    }
                            
                                    #contact > li > img {
                                        width: 20px;
                                        height: 20px;
                                        margin-right: 2px;
                                    }
                            
                                    .profile {
                                        width: 120px;
                                        height: 120px;
                                        margin-left: 30px;
                                    }
                            
                                    img {
                                       width: 120px;
                                        height: 120px;
                                        margin-left: 30px;
                                    }
                            
                                    #contact > li > img,
                                    #contact > li > span {
                                        display: inline-block;
                                        vertical-align: middle;
                                    }
                            
                                    a,
                                    a:visited {
                                        color: #3333CC;
                                        text-decoration: none;
                                    }
                            
                                    .section .title {
                                        color: #F08080;
                                        text-decoration: none;
                                        border-bottom: 1px solid blue;
                                    }
                            
                                    .inline {
                                        display: inline-block;
                                        vertical-align: top;
                                    }
                            
                                    .width-70 {
                                        width: 68%;
                                    }
                            
                                    .width-60 {
                                        width: 58%;
                                    }
                            
                                    .width-50 {
                                        width: 48%;
                                    }
                            
                                    .width-40 {
                                        width: 38%;
                                    }
                            
                                    .width-30 {
                                        width: 28%;
                                    }
                            
                                    .width-20 {
                                        width: 18%;
                                    }
                            
                                    .width-10 {
                                        width: 8%;
                                    }
                            
                                    .section {
                                        font-size: 13px;
                                        text-align: left;
                                    }
                            
                                    .title {
                                        margin-bottom: 5px;
                                        font-size: 15px;
                                    }
                            
                                    .content {
                                        margin-top: 5px;
                                        margin-left: 25px;
                                    }
                            
                                    .content p {
                                        margin-top: 5px;
                                        margin-left: 5px;
                                    
                                    }
                            
                                    .content h1,
                                    .content h2,
                                    .content h3,
                                    .content h4,
                                    .content h5,
                                    .content h6 {
                                        margin: 0;
                                    }
                            
                                    .project,
                                    .work {
                                        margin: 7px 0px;
                                    }
                            
                                     table.sign, table.sign td, table.sign th{    
                                        border: none;
                                    }
                                     table.education,table.left-side, td, th {    
                                     
                                        text-align: center;
                                    }
                                     table.left-side, table.left-side td, table.left-side th{    
                                        border: none;
                                     
                                    }
                                    
                                    table {
                                        width: 100%;
                                        border: 1px;
                                        font-size: 13px;
                                    }
                                    
                                    th, td {
                                        font-size: 13px;
                                        padding: 5px;
                                    }
                                </style>
                            </head>
                            
                            <body>
                            <div class="container">
                             <table border="1">
                              <tr>
                                <td style=" width: 25%; background-color: #87CEFA; vertical-align:top">
                                <table class ="left-side">
                                <tr><td>
                                    <img class="profile" src="'.$uploads_dir.'/'.$photoname.'" alt="" style= "width: 120px;height: 120px; border-radius: 50%;" />
                                    <h2>'.$_POST['name'].'</h2>
                                    <span> '.$_POST['email'].', &nbsp; '.$_POST['mobile'].'</span><br />
                                    <span> '.$_POST['address'].', &nbsp;'.$_POST['city'].',&nbsp;'.$_POST['district'].'-'. $_POST['pincode'].'</span>
                                </td></tr>
                                <tr><td>
                                    <div class="section">
                                        <h2 class="title">Areas of Interest</h2>
                                        <div class="content">
                                            <ul>
                                              <li>'.$_POST['aoi'].'</li>
                                              <li>'.$_POST['aoi2'].'</li>
                                              <li>'.$_POST['aoi3'].'</li>
                                            </ul>
                                        </div>
                                    </div>
                                </td></tr>
                                <tr><td>
                                    <div class="section">
                                        <h2 class="title">Languages Known</h2>
                                        <div class="content">
                                            <ul>
                                              <li>'.$_POST['language'].'</li>
                                              <li>'.$_POST['language2'].'</li>
                                              <li>'.$_POST['language3'].'</li>
                                            </ul>
                                        </div>
                                    </div>
                                </td></tr>
                                <tr><td>
                                    <div class="section">
                                        <h2 class="title">Personal Details</h2>
                                        <div class="content">
                                    
                                            <strong>Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['dob'].'</span>
                                            <br />
                                    
                                            <strong>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['gender'].'</span>
                                            <br />
                                    
                                            <strong>Material Status&nbsp;&nbsp;&nbsp;: </strong><span> '.$_POST['material_status'].' </span>
                                            <br />
                                    
                                            <strong>Nationality&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <span>'.$_POST['nationality'].'</span>
                                    
                                        </div>
                                    </div> 
                                </td></tr> 
                                </table>                                  
                                </td>
                                <td style=" width: 75%;">
                                <table>
                                <tr><td>
                                    <div class="section">
                                    <h2 class="title">Career Objective</h2>
                                        <div class="content">
                                            <p>'.$_POST['carrer_objective'].'</p>
                                        </div>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Education</h2>
                                          <table class ="education">
                                            <thead>
                                              <tr style="background-color: #87CEFA;">
                                                <th>Course</th>
                                                <th>Institution</th>
                                                <th>Place</th>
                                                <th>Year</th>
                                                <th>Parcentage</th>
                                              </tr>
                                            </thead>
                                            <tr>
                                                <td>
                                                <p>'.$_POST['deg_course'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['deg_institution'].'</p>
                                                 </td>
                                                <td>
                                                    <p>'.$_POST['deg_place'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['deg_yop'].'</p>
                                               </td>
                                                <td>
                                                    <p>'.$_POST['deg_parcentage'].'</p>
                                               </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                    <p>'.$_POST['hsc_course'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['hsc_institution'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['hsc_place'].'</p>
                                               </td>
                                                <td>
                                                    <p>'.$_POST['hsc_yop'].'</p>
                                               </td>
                                                <td>
                                                    <p>'.$_POST['hsc_parcentage'].'</p>
                                               </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                    <p>'.$_POST['sslc_course'].'</p>
                                               </td>
                                                <td>
                                                    <p>'.$_POST['sslc_institution'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['sslc_place'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['sslc_yop'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['sslc_parcentage'].'</p>
                                                </td>
                                              </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Technical Skills</h2>
                                        <div class="content">
                                            <ul>
                                              <li>'.$_POST['tech_skill'].'</li>
                                              <li>'.$_POST['tech_skill2'].'</li>
                                              <li>'.$_POST['tech_skill3'].'</li>
                                            </ul>
                                            <!--<p><strong>Frameworks/Tools:</strong> Punch Cards</p> -->
                                        </div>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Inplant Training</h2>
                                        <div class="content">
                                            <p>'.$_POST['inplant_train'].'</p>
                                        </div>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Conference/Journals</h2>
                                        <div class="content">
                                            <h4><b>'.$_POST['conference_title'].'</b></h4>
                                            <p>'.$_POST['conference_disc'].'</p>
                                            <p><a href="#">'.$con_title_url.'</a></p>
                                        </div>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Acadamic Projects</h2>
                                        <div class="content">
                                            <div class="project">
                                                <h4><b>'.$_POST['project_title'].'</b></h4>
                                                <p>'.$_POST['project_disc'].'</p>
                                                <!--<p><a href="#">protects.com/projects/projectname</a></p>-->
                                            </div>
                                            <!-- <div class="project">
                                            <h4></h4>
                                            <p></p>
                                            <p><a href=""></a></p>
                                        </div> -->
                                        </div>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Achievements</h2>
                                        <div class="content">
                                            <ul>
                                              <li>'.$_POST['achievements'].'</li>
                                              <li>'.$_POST['achievements2'].'</li>
                                            </ul>
                                        </div>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Declaration</h2>
                                        <div class="content">
                                            <p>'.$_POST['declaration'].'</p>
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                
                                    <div class="section">
                                        <div class="content">
                                            <table class = "sign">
                                                <tr>
                                                    <td style="text-align: left;">
                                                    <br />
                                                        <strong>Date: </strong><span>'.$curDate.'</span>
                                                        <br />
                                                        <strong>Place: </strong><span>'.$_POST['district'].'</span>
                                                        <br />
                                                    </td>
                                                    <td></td>
                                                    <td style = "text-align: center;">
                                                        <p>Yours Faithfully,</p>
                                                        <br />
                                                        <p>'.$_POST['sign'].'</p>
                                                        <br />
                                                        <strong>('.$_POST['name'].')</strong>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    </td></tr>
                                </td>
                              </tr>
                            </table> 
                            </div>
                            </body>
                            </html>';
                }elseif($format == 5){
                    $html = '<!DOCTYPE html>
                            <html>
                            
                            <head>
                                <title>Resume</title>
                            
                                <style>
                                    .container {
                                        width: 95%;
                                        margin: 0 auto;
                                        font-family: "Times New Roman", Times, serif;
                                    }
                            
                                    .main .title {
                                        font-size: 2.0em;
                                        text-transform: uppercase;
                                        margin-bottom: 10px;
                                        color: #F08080;
                                    }
                            
                                    #contact {
                                        list-style-type: none;
                                        padding: 0;
                                        margin: 0;
                                    }
                            
                                    #contact > li {
                                        display: inline-block;
                                        margin-right: 10px;
                                    }
                            
                                    #contact > li > img {
                                        width: 20px;
                                        height: 20px;
                                        margin-right: 2px;
                                    }
                            
                                    .profile {
                                        width: 120px;
                                        height: 120px;
                                        margin-left: 30px;
                                    }
                            
                                    img {
                                       width: 120px;
                                        height: 120px;
                                        margin-left: 30px;
                                    }
                            
                                    #contact > li > img,
                                    #contact > li > span {
                                        display: inline-block;
                                        vertical-align: middle;
                                    }
                            
                                    a,
                                    a:visited {
                                        color: #3333CC;
                                        text-decoration: none;
                                    }
                            
                                    .section .title {
                                        text-transform: uppercase;
                                        text-decoration: none;
                                    }
                            
                                    .inline {
                                        display: inline-block;
                                        vertical-align: top;
                                    }
                            
                                    .width-70 {
                                        width: 68%;
                                    }
                            
                                    .width-60 {
                                        width: 58%;
                                    }
                            
                                    .width-50 {
                                        width: 48%;
                                    }
                            
                                    .width-40 {
                                        width: 38%;
                                    }
                            
                                    .width-30 {
                                        width: 28%;
                                    }
                            
                                    .width-20 {
                                        width: 18%;
                                    }
                            
                                    .width-10 {
                                        width: 8%;
                                    }
                            
                                    .section {
                                        font-size: 13px;
                                        text-align: left;
                                    }
                            
                                    .title {
                                        margin-bottom: 5px;
                                        font-size: 15px;
                                    }
                            
                                    .content {
                                        margin-top: 5px;
                                        margin-left: 25px;
                                    }
                            
                                    .content p {
                                        margin-top: 5px;
                                        margin-left: 5px;
                                    
                                    }
                            
                                    .content h1,
                                    .content h2,
                                    .content h3,
                                    .content h4,
                                    .content h5,
                                    .content h6 {
                                        margin: 0;
                                    }
                            
                                    .project,
                                    .work {
                                        margin: 7px 0px;
                                    }
                            
                                     table.sign, table.sign td, table.sign th{    
                                        border: none;
                                    }
                                     table.education, td, th { 
                                        text-align: left;
                                    }
                                    
                                    table {
                                        width: 100%;
                                        border: 1px;
                                        font-size: 13px;
                                        margin-left: 15px;
                                    }
                                    
                                    th, td {
                                        padding: 5px;
                                    }
                                    table{
                                        border-collapse: collapse;
                                    }
                                    .firstLine td{
                                        border-bottom: 2px solid #ddd;
                                    }
                                </style>
                            </head>
                            
                            <body>
                            <div class="container">
                            <table  style="border: 2px solid #ddd;">
                                <tr class="firstLine"><td>
                                 <table class = "sign">
                                    <tr>
                                        <td style="text-align: left;">
                                            <h2>'.$_POST['name'].'</h2>
                                            <span> '.$_POST['email'].', &nbsp; '.$_POST['mobile'].'</span><br />
                                            <span> '.$_POST['address'].', &nbsp;'.$_POST['city'].',&nbsp;'.$_POST['district'].'-'. $_POST['pincode'].'</span>
                                        </td>
                                        <td></td>
                                        <td style="text-align: right;">
                                            <img class="profile" src="'.$uploads_dir.'/'.$photoname.'" alt="" style= "width: 120px;height: 120px;" />
                                        </td>
                                    </tr>
                                 </table>
                                </td></tr>
                                <tr><td>
                                    <div class="section">
                                    <h2 class="title">Career Objective</h2>
                                        <div class="content">
                                            <p>'.$_POST['carrer_objective'].'</p>
                                        </div>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Education</h2>
                                          <table>
                                            <thead>
                                              <tr>
                                                <th>Course</th>
                                                <th>Institution</th>
                                                <th>Place</th>
                                                <th>Year</th>
                                                <th>Parcentage</th>
                                              </tr>
                                            </thead>
                                            <tr>
                                                <td>
                                                <p>'.$_POST['deg_course'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['deg_institution'].'</p>
                                                 </td>
                                                <td>
                                                    <p>'.$_POST['deg_place'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['deg_yop'].'</p>
                                               </td>
                                                <td>
                                                    <p>'.$_POST['deg_parcentage'].'</p>
                                               </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                    <p>'.$_POST['hsc_course'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['hsc_institution'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['hsc_place'].'</p>
                                               </td>
                                                <td>
                                                    <p>'.$_POST['hsc_yop'].'</p>
                                               </td>
                                                <td>
                                                    <p>'.$_POST['hsc_parcentage'].'</p>
                                               </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                    <p>'.$_POST['sslc_course'].'</p>
                                               </td>
                                                <td>
                                                    <p>'.$_POST['sslc_institution'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['sslc_place'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['sslc_yop'].'</p>
                                                </td>
                                                <td>
                                                    <p>'.$_POST['sslc_parcentage'].'</p>
                                                </td>
                                              </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Technical Skills</h2>
                                        <div class="content">
                                            <ul>
                                              <li>'.$_POST['tech_skill'].'</li>
                                              <li>'.$_POST['tech_skill2'].'</li>
                                              <li>'.$_POST['tech_skill3'].'</li>
                                            </ul>
                                            <!--<p><strong>Frameworks/Tools:</strong> Punch Cards</p> -->
                                        </div>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Inplant Training</h2>
                                        <div class="content">
                                            <p>'.$_POST['inplant_train'].'</p>
                                        </div>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Conference/Journals</h2>
                                        <div class="content">
                                            <h4><b>'.$_POST['conference_title'].'</b></h4>
                                            <p>'.$_POST['conference_disc'].'</p>
                                            <p><a href="#">'.$con_title_url.'</a></p>
                                        </div>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Acadamic Projects</h2>
                                        <div class="content">
                                            <div class="project">
                                                <h4><b>'.$_POST['project_title'].'</b></h4>
                                                <p>'.$_POST['project_disc'].'</p>
                                                <!--<p><a href="#">protects.com/projects/projectname</a></p>-->
                                            </div>
                                            <!-- <div class="project">
                                            <h4></h4>
                                            <p></p>
                                            <p><a href=""></a></p>
                                        </div> -->
                                        </div>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Achievements</h2>
                                        <div class="content">
                                            <ul>
                                              <li>'.$_POST['achievements'].'</li>
                                              <li>'.$_POST['achievements2'].'</li>
                                            </ul>
                                        </div>
                                    </div>
                                    </td></tr> 
                                    <tr><td>
                                    <div class="section">
                                        <h2 class="title">Areas of Interest</h2>
                                        <div class="content">
                                            <ul>
                                              <li>'.$_POST['aoi'].'</li>
                                              <li>'.$_POST['aoi2'].'</li>
                                              <li>'.$_POST['aoi3'].'</li>
                                            </ul>
                                        </div>
                                    </div>
                                </td></tr>
                                <tr><td>
                                    <div class="section">
                                        <h2 class="title">Languages Known</h2>
                                        <div class="content">
                                            <ul>
                                              <li>'.$_POST['language'].'</li>
                                              <li>'.$_POST['language2'].'</li>
                                              <li>'.$_POST['language3'].'</li>
                                            </ul> 
                                        </div>
                                    </div>
                                </td></tr>
                                <tr><td>
                                    <div class="section">
                                        <h2 class="title">Personal Details</h2>
                                        <div class="content">
                                    
                                            <strong>Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['dob'].'</span>
                                            <br />
                                    
                                            <strong>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['gender'].'</span>
                                            <br />
                                    
                                            <strong>Material Status&nbsp;&nbsp;&nbsp;: </strong><span> '.$_POST['material_status'].' </span>
                                            <br />
                                    
                                            <strong>Nationality&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <span>'.$_POST['nationality'].'</span>
                                    
                                        </div>
                                    </div> 
                                </td></tr> 
                                <tr><td>
                                    <div class="section">
                                        <h2 class="title">Declaration</h2>
                                        <div class="content">
                                            <p>'.$_POST['declaration'].'</p>
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                </td></tr> 
                                <tr><td>
                                    <div class="section">
                                        <div class="content">
                                            <table class = "sign">
                                                <tr>
                                                    <td style="text-align: left;">
                                                    <br />
                                                        <strong>Date: </strong><span>'.$curDate.'</span>
                                                        <br />
                                                        <strong>Place: </strong><span>'.$_POST['district'].'</span>
                                                        <br />
                                                    </td>
                                                    <td></td>
                                                    <td style = "text-align: center;">
                                                        <p>Yours Faithfully,</p>
                                                        <br />
                                                        <p>'.$_POST['sign'].'</p>
                                                        <br />
                                                        <strong>('.$_POST['name'].')</strong>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </td></tr>
                            </td>
                            </tr>
                            </table> 
                            </div>
                            </body>
                            </html>';
                }
                else{
                $html = '<!DOCTYPE html>
                    <html>
                    
                    <head>
                        <title>Resume</title>
                    
                        <style>
                            .container {
                                width: 95%;
                                margin: 0 auto;
                            }
                    
                            .main .title {
                                font-size: 2.0em;
                                text-transform: uppercase;
                                margin-bottom: 10px;
                            }
                    
                            #contact {
                                list-style-type: none;
                                padding: 0;
                                margin: 0;
                            }
                    
                            #contact > li {
                                display: inline-block;
                                margin-right: 10px;
                            }
                    
                            #contact > li > img {
                                width: 20px;
                                height: 20px;
                                margin-right: 2px;
                            }
                    
                            .profile {
                                width: 120px;
                                height: 120px;
                                margin-left: 30px;
                            }
                    
                            img {
                               width: 120px;
                                height: 120px;
                                margin-left: 30px;
                            }
                    
                            #contact > li > img,
                            #contact > li > span {
                                display: inline-block;
                                vertical-align: middle;
                            }
                    
                            a,
                            a:visited {
                                color: #3333CC;
                                text-decoration: none;
                            }
                    
                            .section .title {
                                text-transform: uppercase;
                                background-color: #CCCCFF;
                            }
                    
                            .inline {
                                display: inline-block;
                                vertical-align: top;
                            }
                    
                            .width-70 {
                                width: 68%;
                            }
                    
                            .width-60 {
                                width: 58%;
                            }
                    
                            .width-50 {
                                width: 48%;
                            }
                    
                            .width-40 {
                                width: 38%;
                            }
                    
                            .width-30 {
                                width: 28%;
                            }
                    
                            .width-20 {
                                width: 18%;
                            }
                    
                            .width-10 {
                                width: 8%;
                            }
                    
                            .section {
                                font-size: 13px;
                            }
                    
                            .title {
                                margin-bottom: 5px;
                                font-size: 15px;
                            }
                    
                            .content {
                                margin-top: 5px;
                            }
                    
                            .content p {
                                margin: 0;
                            }
                    
                            .content h1,
                            .content h2,
                            .content h3,
                            .content h4,
                            .content h5,
                            .content h6 {
                                margin: 0;
                            }
                    
                            .project,
                            .work {
                                margin: 7px 0px;
                            }
          
                             table.sign, table.sign td, table.sign th{    
                                border: none;
                            }
                             table.education, td, th {    
                                border: 1px solid #ddd;
                                border-collapse: collapse;
                                text-align: left;
                            }
                            
                            table {
                                width: 100%;
                            }
                            
                            th, td {
                                padding: 5px;
                            }
                        </style>
                    </head>
                    
                    <body>
                    <div class="container">
                        <div class="main">
                            <div class="content">
                                <table class = "sign">
                                    <tr>
                                        <td>
                                            <h1 class="title">'.$_POST['name'].'</h1>
                                             <strong>Email: </strong><span> '.$_POST['email'].'</span> <br />
                                             <strong>Phone: </strong><span>'.$_POST['mobile'].'</span> <br />
                                             <strong>Address: </strong> <span> '.$_POST['address'].', &nbsp;'.$_POST['city'].',&nbsp;'.$_POST['district'].'-'. $_POST['pincode'].'</span>
                                        </td>
                                        <td></td>
                                        <td style = "text-align: right;">
                                            <img class="profile" src="'.$uploads_dir.'/'.$photoname.'" alt="" style= "width: 120px;height: 120px;" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    
                        <!--<div class="inline width-70">
                            <div class="main">
                                <h1 class="title">'.$_POST['name'].'</h1>
                                <div class="content">
                    
                                    <strong>Email: </strong><span> '.$_POST['email'].'</span> <br />
                    
                                    <strong>Web: </strong><a href="http://johndoe.com"> johndoe.com</a></span>
                                        <br /> 
                    
                                    <strong>Phone: </strong><span>'.$_POST['mobile'].'</span>
                                    <br />
                    
                                    <strong>Address: </strong> <span> '.$_POST['address'].', &nbsp;'.$_POST['city'].',&nbsp;'.$_POST['district'].'-'. $_POST['pincode'].'</span>
                    
                                </div>
                            </div>
                        </div>
                        <div class="inline width-30">
                            <img class="profile" src="'.$uploads_dir.'/'.$photoname.'" alt="" style= "width: 120px;height: 120px;" />
                        </div>-->
                        <hr />
                    
                        <div class="section">
                            <h2 class="title">Career Objective</h2>
                            <div class="content">
                                <p>'.$_POST['carrer_objective'].'</p>
                            </div>
                        </div>
                        <div class="section">
                            <h2 class="title">Education</h2>
                              <table class ="education">
                                <thead>
                                  <tr>
                                    <th>Course</th>
                                    <th>Institution</th>
                                    <th>Place</th>
                                    <th>Year</th>
                                    <th>Parcentage</th>
                                  </tr>
                                </thead>
                                <tr>
                                    <td>
                                    <p>'.$_POST['deg_course'].'</p>
                                    </td>
                                    <td>
                                        <p>'.$_POST['deg_institution'].'</p>
                                     </td>
                                    <td>
                                        <p>'.$_POST['deg_place'].'</p>
                                    </td>
                                    <td>
                                        <p>'.$_POST['deg_yop'].'</p>
                                   </td>
                                    <td>
                                        <p>'.$_POST['deg_parcentage'].'</p>
                                   </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <p>'.$_POST['hsc_course'].'</p>
                                    </td>
                                    <td>
                                        <p>'.$_POST['hsc_institution'].'</p>
                                    </td>
                                    <td>
                                        <p>'.$_POST['hsc_place'].'</p>
                                   </td>
                                    <td>
                                        <p>'.$_POST['hsc_yop'].'</p>
                                   </td>
                                    <td>
                                        <p>'.$_POST['hsc_parcentage'].'</p>
                                   </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <p>'.$_POST['sslc_course'].'</p>
                                   </td>
                                    <td>
                                        <p>'.$_POST['sslc_institution'].'</p>
                                    </td>
                                    <td>
                                        <p>'.$_POST['sslc_place'].'</p>
                                    </td>
                                    <td>
                                        <p>'.$_POST['sslc_yop'].'</p>
                                    </td>
                                    <td>
                                        <p>'.$_POST['sslc_parcentage'].'</p>
                                    </td>
                                  </tr>
                            </tbody>
                          </table>
                        </div>
                    
                        <div class="section">
                            <h2 class="title">Technical Skills</h2>
                            <div class="content">
                                <p>'.$_POST['tech_skill'].' </p>
                                <!--<p><strong>Frameworks/Tools:</strong> Punch Cards</p> -->
                            </div>
                        </div>
                    
                        <div class="section">
                            <h2 class="title">Inplant Training</h2>
                            <div class="content">
                                <p>'.$_POST['inplant_train'].'</p>
                            </div>
                        </div>
                    
                        <div class="section">
                            <h2 class="title">Conference/Journals</h2>
                            <div class="content">
                                <h4><b>'.$_POST['conference_title'].'</b></h4>
                                <p>'.$_POST['conference_disc'].'</p>
                                <p><a href="#">'.$con_title_url.'</a></p>
                            </div>
                        </div>
                    
                        <div class="section">
                            <h2 class="title">Acadamic Projects</h2>
                            <div class="content">
                                <div class="project">
                                    <h4><b>'.$_POST['project_title'].'</b></h4>
                                    <p>'.$_POST['project_disc'].'</p>
                                    <!--<p><a href="#">protects.com/projects/projectname</a></p>-->
                                </div>
                                <!-- <div class="project">
                                <h4></h4>
                                <p></p>
                                <p><a href=""></a></p>
                            </div> -->
                            </div>
                        </div>
                    
                        <div class="section">
                            <h2 class="title">Achievements</h2>
                            <div class="content">
                                <p>'.$_POST['achievements'].'</p>
                            </div>
                        </div>
                    
                        <div class="section">
                            <h2 class="title">Areas of Interest</h2>
                            <div class="content">
                                <p>'.$_POST['aoi'].'</p>
                            </div>
                        </div>
                    
                        <div class="section">
                            <h2 class="title">Languages Known</h2>
                            <div class="content">
                                <p>'.$_POST['language'].'</p>
                            </div>
                        </div>
                    
                        <div class="section">
                            <h2 class="title">Personal Details</h2>
                            <div class="content">
                    
                                <strong>Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['dob'].'</span>
                                <br />
                    
                                <strong>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['gender'].'</span>
                                <br />
                    
                                <strong>Material Status&nbsp;&nbsp;&nbsp;: </strong><span> '.$_POST['material_status'].' </span>
                                <br />
                    
                                <strong>Nationality&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <span>'.$_POST['nationality'].'</span>
                    
                            </div>
                        </div>
                    
                        <div class="section">
                            <h2 class="title">Declaration</h2>
                            <div class="content">
                                <p>'.$_POST['declaration'].'</p>
                            </div>
                        </div>
                        <br />
                        <br />
                    
                        <div class="section">
                            <div class="content">
                                <table class = "sign">
                                    <tr>
                                        <td>
                                        <br />
                                            <strong>Date: </strong><span>'.$curDate.'</span>
                                            <br />
                                            <strong>Place: </strong><span>'.$_POST['district'].'</span>
                                            <br />
                                        </td>
                                        <td></td>
                                        <td style = "text-align: center;">
                                            <p>Yours Faithfully,</p>
                                            <br />
                                            <p>'.$_POST['sign'].'</p>
                                            <br />
                                            <strong>('.$_POST['name'].')</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    
                        <!--	<div class="section">
                        <h2 class="title">Work Experience</h2>
                        <div class="content">
                            <div class="work">
                                <h4>Stark Industries</h4>
                                <p>Major upgrades Iron Man armors flight system.</p>
                            </div>
                            <div class="work">
                                <h4>S.H.I.E.L.D.</h4>
                                <p>Worked on a containment module for The Hulk.</p>
                            </div>
                             <div class="work">
                                <h4></h4>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="section">
                        <h2 class="title"></h2>
                        <div class="hr"></div>
                        <div class="content">
                            <p></p>
                        </div>
                    </div> -->
                    </div>
                    </body>
                    
                    </html>
                
                    ';
                }
                
                $dompdf->loadHtml($html);
                
                /* Render the HTML as PDF */
                
                $dompdf->render();
                 /* Save Output the generated PDF to Local  */
                
                 $output = $dompdf->output();
                 $pdf_name = $_POST['name'].'-'.$last_id.'.pdf';
                 $pdf_file_location =  $_SERVER['DOCUMENT_ROOT']."/lara/api/cv_maker/document/pdf/$pdf_name";
                 $pdf_file = file_put_contents($pdf_file_location, $output);
                 
                /* Output the generated PDF to Browser */
                // $dompdf->stream();  die;
               
                /************** geting file content Ror Word file generate ***********/
                
                    ob_start();
                    echo $html;
                    $content = ob_get_contents();
                    ob_end_clean();
                
                    //store in local file
                     $word_name = $_POST['name'].'-'.$last_id.'.doc';
                     $word_file_location = $_SERVER['DOCUMENT_ROOT']."/lara/api/cv_maker/document/word/$word_name";
                     $word_file = file_put_contents($word_file_location, $content);
                   // header("Content-type: application/vnd.ms-word");
                   // header("Content-Disposition: attachment;Filename=myResume_name.doc");
                    
                    //echo $content; die;
              
                /* Send email to user with the generated PDF file  */
                    
                    $mail = new PHPMailer;
                    
                    //$mail->SMTPDebug = 3;                               // Enable verbose debug output
                    $toMail = $_POST['email'];
                    $toName = $_POST['name'];
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'murugavel.kcmr@gmail.com';         // SMTP username
                    $mail->Password = 'Zeal@skvel56';                     // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to
                    
                    $mail->setFrom('murugavel.kcmr@gmail.com', 'CV | Manager');
                    $mail->addAddress($toMail, $toName);                    // Add a recipient
                   // $mail->addAddress('murugavel.c@vividinfotech.com');       // Name is optional
                    $mail->addReplyTo('murugavel.kcmr@gmail.com', 'Information');
                    //$mail->addCC('cc@example.com');
                    //$mail->addBCC('bcc@example.com');
                    
                    $mail->addAttachment($pdf_file_location);                   // Add attachments
                    $mail->addAttachment($word_file_location);                  // Optional name
                    $mail->isHTML(true);                                        // Set email format to HTML
                    
                    $mail->Subject = 'Your generated Word and PDF Resume here';
                    $mail->Body    = 'This is the generated PDF Resume with default Template and all your details, which you were given. ';
                   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    
                    $mail->send();
            	  // header("Location: index.php");
            	   $json = array("status" => "SUCCESS", "msg" => "Done Your Resume added.!, And also sent to your registered email..!!");
            	 }else{
            	 $json = array("status" => "ERROR", "msg" => "Error adding Your Resume!");
            	 }
                 
          }else{
         $json = array("status" => "ERROR", "msg" => "Resume Already Exist with this email id..");
        }
    }if(isset($_POST['save_pdf']))
    {
         if(isset($_FILES['photo']['name'])){
                        //$uploads_dir = $_SERVER['DOCUMENT_ROOT'].'\lara\api\cv_maker\uploads\profile';
                        $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/dev_cvmaker/uploads/profile';
                        $tmp_name = $_FILES["photo"]["tmp_name"];
                        $photoname = basename($_FILES["photo"]["name"]);
                        move_uploaded_file($tmp_name, "$uploads_dir/$photoname");
               }
        
        /* instantiate and use the dompdf class */
                $email = $_POST['email'];
                $conference_title = $_POST['conference_title'];
                $title = str_replace(' ', '+',$conference_title);
                $url = "http://dev192.com/smsjournals/wp-api/web_check_paper.php?email=$email&title=$title";

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($ch, CURLOPT_URL,$url);
                $result=curl_exec($ch);
                curl_close($ch);
              
                $check_paper = json_decode($result, true);
                $check_paper_status = $check_paper['result'];
                $con_title_url = '';
                if($check_paper_status == 'available'){
                    $con_title = str_replace(' ', '-', strtolower($conference_title));
                    $con_title_url = "http://dev192.com/smsjournals/".$con_title;
                }
                
                $dompdf = new Dompdf();
                $curDate = date("d-m-Y");
                
                $html = '<!DOCTYPE html>
<html>

<head>
    <title>Resume</title>

    <style>
        .container {
            width: 95%;
            margin: 0 auto;
            font-family: "Times New Roman", Times, serif;
        }

        .main .title {
            font-size: 2.0em;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #F08080;
        }

        #contact {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #contact > li {
            display: inline-block;
            margin-right: 10px;
        }

        #contact > li > img {
            width: 20px;
            height: 20px;
            margin-right: 2px;
        }

        .profile {
            width: 120px;
            height: 120px;
            margin-left: 30px;
        }

        img {
           width: 120px;
            height: 120px;
            margin-left: 30px;
        }

        #contact > li > img,
        #contact > li > span {
            display: inline-block;
            vertical-align: middle;
        }

        a,
        a:visited {
            color: #3333CC;
            text-decoration: none;
        }

        .section .title {
            color: #F08080;
            text-decoration: none;
            border-bottom: 1px solid blue;
        }

        .inline {
            display: inline-block;
            vertical-align: top;
        }

        .width-70 {
            width: 68%;
        }

        .width-60 {
            width: 58%;
        }

        .width-50 {
            width: 48%;
        }

        .width-40 {
            width: 38%;
        }

        .width-30 {
            width: 28%;
        }

        .width-20 {
            width: 18%;
        }

        .width-10 {
            width: 8%;
        }

        .section {
            font-size: 13px;
            text-align: left;
        }

        .title {
            margin-bottom: 5px;
            font-size: 15px;
        }

        .content {
            margin-top: 5px;
            margin-left: 25px;
        }

        .content p {
            margin-top: 5px;
            margin-left: 5px;
        
        }

        .content h1,
        .content h2,
        .content h3,
        .content h4,
        .content h5,
        .content h6 {
            margin: 0;
        }

        .project,
        .work {
            margin: 7px 0px;
        }

         table.sign, table.sign td, table.sign th{    
            border: none;
        }
         table.education,table.left-side, td, th {    
         
            text-align: center;
        }
         table.left-side, table.left-side td, table.left-side th{    
            border: none;
         
        }
        
        table {
            width: 100%;
            border: 1px;
            font-size: 13px;
            font-family: "Times New Roman", Times, serif;
        }
        
        th, td {
            font-size: 13px;
            padding: 5px;
        }
    </style>
</head>

<body>
<div class="container">
 <table border="1">
  <tr>
    <td style=" width: 25%; background-color: #87CEFA; vertical-align:top">
    <table class ="left-side">
    <tr><td>
        <img class="profile" src="'.$uploads_dir.'/'.$photoname.'" alt="" style= "width: 120px;height: 120px; border-radius: 50%;" />
        <h2>'.$_POST['name'].'</h2>
        <span> '.$_POST['email'].', &nbsp; '.$_POST['mobile'].'</span><br />
        <span> '.$_POST['address'].', &nbsp;'.$_POST['city'].',&nbsp;'.$_POST['district'].'-'. $_POST['pincode'].'</span>
    </td></tr>
    <tr><td>
        <div class="section">
            <h2 class="title">Areas of Interest</h2>
            <div class="content">
                <ul>
                  <li>'.$_POST['aoi'].'</li>
                  <li>'.$_POST['aoi2'].'</li>
                  <li>'.$_POST['aoi3'].'</li>
                </ul>
            </div>
        </div>
    </td></tr>
    <tr><td>
        <div class="section">
            <h2 class="title">Languages Known</h2>
            <div class="content">
                <ul>
                  <li>'.$_POST['language'].'</li>
                  <li>'.$_POST['language2'].'</li>
                  <li>'.$_POST['language3'].'</li>
                </ul>
            </div>
        </div>
    </td></tr>
    <tr><td>
        <div class="section">
            <h2 class="title">Personal Details</h2>
            <div class="content">
        
                <strong>Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['dob'].'</span>
                <br />
        
                <strong>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['gender'].'</span>
                <br />
        
                <strong>Material Status&nbsp;&nbsp;&nbsp;: </strong><span> '.$_POST['material_status'].' </span>
                <br />
        
                <strong>Nationality&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <span>'.$_POST['nationality'].'</span>
        
            </div>
        </div> 
    </td></tr> 
    </table>                                  
    </td>
    <td class ="right-side" style=" width: 75%;">
    <table>
    <tr><td>
        <div class="section">
        <h2 class="title">Career Objective</h2>
            <div class="content">
                <p>'.$_POST['carrer_objective'].'</p>
            </div>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Education</h2>
              <table class ="education">
                <thead>
                  <tr style="background-color: #87CEFA;">
                    <th>Course</th>
                    <th>Institution</th>
                    <th>Place</th>
                    <th>Year</th>
                    <th>Parcentage</th>
                  </tr>
                </thead>
                <tr>
                    <td>
                    <p>'.$_POST['deg_course'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['deg_institution'].'</p>
                     </td>
                    <td>
                        <p>'.$_POST['deg_place'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['deg_yop'].'</p>
                   </td>
                    <td>
                        <p>'.$_POST['deg_parcentage'].'</p>
                   </td>
                  </tr>
                  <tr>
                    <td>
                        <p>'.$_POST['hsc_course'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['hsc_institution'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['hsc_place'].'</p>
                   </td>
                    <td>
                        <p>'.$_POST['hsc_yop'].'</p>
                   </td>
                    <td>
                        <p>'.$_POST['hsc_parcentage'].'</p>
                   </td>
                  </tr>
                  <tr>
                    <td>
                        <p>'.$_POST['sslc_course'].'</p>
                   </td>
                    <td>
                        <p>'.$_POST['sslc_institution'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['sslc_place'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['sslc_yop'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['sslc_parcentage'].'</p>
                    </td>
                  </tr>
            </tbody>
          </table>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Technical Skills</h2>
            <div class="content">
                <ul>
                  <li>'.$_POST['tech_skill'].'</li>
                  <li>'.$_POST['tech_skill2'].'</li>
                  <li>'.$_POST['tech_skill3'].'</li>
                </ul>
                <!--<p><strong>Frameworks/Tools:</strong> Punch Cards</p> -->
            </div>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Inplant Training</h2>
            <div class="content">
                <p>'.$_POST['inplant_train'].'</p>
            </div>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Conference/Journals</h2>
            <div class="content">
                <h4><b>'.$_POST['conference_title'].'</b></h4>
                <p>'.$_POST['conference_disc'].'</p>
                <p><a href="#">'.$con_title_url.'</a></p>
            </div>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Acadamic Projects</h2>
            <div class="content">
                <div class="project">
                    <h4><b>'.$_POST['project_title'].'</b></h4>
                    <p>'.$_POST['project_disc'].'</p>
                    <!--<p><a href="#">protects.com/projects/projectname</a></p>-->
                </div>
                <!-- <div class="project">
                <h4></h4>
                <p></p>
                <p><a href=""></a></p>
            </div> -->
            </div>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Achievements</h2>
            <div class="content">
                <ul>
                  <li>'.$_POST['achievements'].'</li>
                  <li>'.$_POST['achievements2'].'</li>
                </ul>
            </div>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Declaration</h2>
            <div class="content">
                <p>'.$_POST['declaration'].'</p>
            </div>
        </div>
        </td></tr> 
        <br />
        <br />
        <tr><td>
        <div class="section">
            <div class="content">
                <table class = "sign">
                    <tr>
                        <td style="text-align: left;">
                        <br />
                            <strong>Date: </strong><span>'.$curDate.'</span>
                            <br />
                            <strong>Place: </strong><span>'.$_POST['district'].'</span>
                            <br />
                        </td>
                        <td></td>
                        <td style = "text-align: center;">
                            <p>Yours Faithfully,</p>
                            <br />
                            <p>'.$_POST['sign'].'</p>
                            <br />
                            <strong>('.$_POST['name'].')</strong>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        </td></tr>
    </td>
  </tr>
</table> 
</table>
</div>
</body>
</html>
        
            ';
        
        
        $dompdf->loadHtml($html);
        
        /* Render the HTML as PDF */
        
         $dompdf->render();
        /* Output the generated PDF to Browser */
       
        $dompdf->stream();
      
    }if(isset($_POST['save_word'])){
        
         if(isset($_FILES['photo']['name'])){
                        //$uploads_dir = $_SERVER['DOCUMENT_ROOT'].'\lara\api\cv_maker\uploads\profile';
                        $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/dev_cvmaker/uploads/profile';
                        $tmp_name = $_FILES["photo"]["tmp_name"];
                        $photoname = basename($_FILES["photo"]["name"]);
                        move_uploaded_file($tmp_name, "$uploads_dir/$photoname");
               }

    $curDate = date("d-m-Y");
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=MyResume_name.doc");
        
        $email = $_POST['email'];
        $conference_title = $_POST['conference_title'];
        $title = str_replace(' ', '+',$conference_title);
        $url = "http://dev192.com/smsjournals/wp-api/web_check_paper.php?email=$email&title=$title";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);
      
        $check_paper = json_decode($result, true);
        $check_paper_status = $check_paper['result'];
        $con_title_url = '';
        if($check_paper_status == 'available'){
            $con_title = str_replace(' ', '-', strtolower($conference_title));
            $con_title_url = "http://dev192.com/smsjournals/".$con_title;
        }  
    
    echo '<!DOCTYPE html>
<html>

<head>
    <title>Resume</title>

    <style>
        .container {
            width: 95%;
            margin: 0 auto;
            font-family: "Times New Roman", Times, serif;
        }

        .main .title {
            font-size: 2.0em;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #F08080;
        }

        #contact {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #contact > li {
            display: inline-block;
            margin-right: 10px;
        }

        #contact > li > img {
            width: 20px;
            height: 20px;
            margin-right: 2px;
        }

        .profile {
            width: 120px;
            height: 120px;
            margin-left: 30px;
        }

        img {
           width: 120px;
            height: 120px;
            margin-left: 30px;
        }

        #contact > li > img,
        #contact > li > span {
            display: inline-block;
            vertical-align: middle;
        }

        a,
        a:visited {
            color: #3333CC;
            text-decoration: none;
        }

        .section .title {
            color: #F08080;
            text-decoration: none;
            border-bottom: 1px solid blue;
        }

        .inline {
            display: inline-block;
            vertical-align: top;
        }

        .width-70 {
            width: 68%;
        }

        .width-60 {
            width: 58%;
        }

        .width-50 {
            width: 48%;
        }

        .width-40 {
            width: 38%;
        }

        .width-30 {
            width: 28%;
        }

        .width-20 {
            width: 18%;
        }

        .width-10 {
            width: 8%;
        }

        .section {
            font-size: 13px;
            text-align: left;
        }

        .title {
            margin-bottom: 5px;
            font-size: 15px;
        }

        .content {
            margin-top: 5px;
            margin-left: 25px;
        }

        .content p {
            margin-top: 5px;
            margin-left: 5px;
        
        }

        .content h1,
        .content h2,
        .content h3,
        .content h4,
        .content h5,
        .content h6 {
            margin: 0;
        }

        .project,
        .work {
            margin: 7px 0px;
        }

         table.sign, table.sign td, table.sign th{    
            border: none;
        }
         table.education,table.left-side, td, th {    
         
            text-align: center;
        }
         table.left-side, table.left-side td, table.left-side th{    
            border: none;
         
        }
        
        table {
            width: 100%;
            border: 1px;
            font-size: 13px;
            font-family: "Times New Roman", Times, serif;
        }
        
        th, td {
            font-size: 13px;
            padding: 5px;
        }
    </style>
</head>

<body>
<div class="container">
 <table border="1">
  <tr>
    <td style=" width: 25%; background-color: #87CEFA; vertical-align:top">
    <table class ="left-side">
    <tr><td>
        <img class="profile" src="'.$uploads_dir.'/'.$photoname.'" alt="" style= "width: 120px;height: 120px; border-radius: 50%;" />
        <h2>'.$_POST['name'].'</h2>
        <span> '.$_POST['email'].', &nbsp; '.$_POST['mobile'].'</span><br />
        <span> '.$_POST['address'].', &nbsp;'.$_POST['city'].',&nbsp;'.$_POST['district'].'-'. $_POST['pincode'].'</span>
    </td></tr>
    <tr><td>
        <div class="section">
            <h2 class="title">Areas of Interest</h2>
            <div class="content">
                <ul>
                  <li>'.$_POST['aoi'].'</li>
                  <li>'.$_POST['aoi2'].'</li>
                  <li>'.$_POST['aoi3'].'</li>
                </ul>
            </div>
        </div>
    </td></tr>
    <tr><td>
        <div class="section">
            <h2 class="title">Languages Known</h2>
            <div class="content">
                <ul>
                  <li>'.$_POST['language'].'</li>
                  <li>'.$_POST['language2'].'</li>
                  <li>'.$_POST['language3'].'</li>
                </ul>
            </div>
        </div>
    </td></tr>
    <tr><td>
        <div class="section">
            <h2 class="title">Personal Details</h2>
            <div class="content">
        
                <strong>Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['dob'].'</span>
                <br />
        
                <strong>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['gender'].'</span>
                <br />
        
                <strong>Material Status&nbsp;&nbsp;&nbsp;: </strong><span> '.$_POST['material_status'].' </span>
                <br />
        
                <strong>Nationality&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <span>'.$_POST['nationality'].'</span>
        
            </div>
        </div> 
    </td></tr> 
    </table>                                  
    </td>
    <td class ="right-side" style=" width: 75%;">
    <table>
    <tr><td>
        <div class="section">
        <h2 class="title">Career Objective</h2>
            <div class="content">
                <p>'.$_POST['carrer_objective'].'</p>
            </div>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Education</h2>
              <table class ="education">
                <thead>
                  <tr style="background-color: #87CEFA;">
                    <th>Course</th>
                    <th>Institution</th>
                    <th>Place</th>
                    <th>Year</th>
                    <th>Parcentage</th>
                  </tr>
                </thead>
                <tr>
                    <td>
                    <p>'.$_POST['deg_course'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['deg_institution'].'</p>
                     </td>
                    <td>
                        <p>'.$_POST['deg_place'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['deg_yop'].'</p>
                   </td>
                    <td>
                        <p>'.$_POST['deg_parcentage'].'</p>
                   </td>
                  </tr>
                  <tr>
                    <td>
                        <p>'.$_POST['hsc_course'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['hsc_institution'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['hsc_place'].'</p>
                   </td>
                    <td>
                        <p>'.$_POST['hsc_yop'].'</p>
                   </td>
                    <td>
                        <p>'.$_POST['hsc_parcentage'].'</p>
                   </td>
                  </tr>
                  <tr>
                    <td>
                        <p>'.$_POST['sslc_course'].'</p>
                   </td>
                    <td>
                        <p>'.$_POST['sslc_institution'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['sslc_place'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['sslc_yop'].'</p>
                    </td>
                    <td>
                        <p>'.$_POST['sslc_parcentage'].'</p>
                    </td>
                  </tr>
            </tbody>
          </table>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Technical Skills</h2>
            <div class="content">
                <ul>
                  <li>'.$_POST['tech_skill'].'</li>
                  <li>'.$_POST['tech_skill2'].'</li>
                  <li>'.$_POST['tech_skill3'].'</li>
                </ul>
                <!--<p><strong>Frameworks/Tools:</strong> Punch Cards</p> -->
            </div>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Inplant Training</h2>
            <div class="content">
                <p>'.$_POST['inplant_train'].'</p>
            </div>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Conference/Journals</h2>
            <div class="content">
                <h4><b>'.$_POST['conference_title'].'</b></h4>
                <p>'.$_POST['conference_disc'].'</p>
                <p><a href="#">'.$con_title_url.'</a></p>
            </div>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Acadamic Projects</h2>
            <div class="content">
                <div class="project">
                    <h4><b>'.$_POST['project_title'].'</b></h4>
                    <p>'.$_POST['project_disc'].'</p>
                    <!--<p><a href="#">protects.com/projects/projectname</a></p>-->
                </div>
                <!-- <div class="project">
                <h4></h4>
                <p></p>
                <p><a href=""></a></p>
            </div> -->
            </div>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Achievements</h2>
            <div class="content">
                <ul>
                  <li>'.$_POST['achievements'].'</li>
                  <li>'.$_POST['achievements2'].'</li>
                </ul>
            </div>
        </div>
        </td></tr> 
        <tr><td>
        <div class="section">
            <h2 class="title">Declaration</h2>
            <div class="content">
                <p>'.$_POST['declaration'].'</p>
            </div>
        </div>
        </td></tr> 
        <br />
        <br />
        <tr><td>
        <div class="section">
            <div class="content">
                <table class = "sign">
                    <tr>
                        <td style="text-align: left;">
                        <br />
                            <strong>Date: </strong><span>'.$curDate.'</span>
                            <br />
                            <strong>Place: </strong><span>'.$_POST['district'].'</span>
                            <br />
                        </td>
                        <td></td>
                        <td style = "text-align: center;">
                            <p>Yours Faithfully,</p>
                            <br />
                            <p>'.$_POST['sign'].'</p>
                            <br />
                            <strong>('.$_POST['name'].')</strong>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        </td></tr>
    </td>
  </tr>
</table> 
</table>
</div>
</body>
</html>
        ';
        }
    }else{
     $json = array("status" => "ERROR", "msg" => "Request method not accepted");
    }
    
    
 
@mysql_close($conn);
 
/* Output header */
 header('Content-type: application/json');
 echo json_encode($json);

?>