<?php
require 'include/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
//
//$mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
//$mail->SMTPAuth = true;                               // Enable SMTP authentication
//$mail->Username = 'murugavel.kcmr@gmail.com';                 // SMTP username
//$mail->Password = 'Zeal@skvel56';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 587;                                    // TCP port to connect to
//
//$mail->setFrom('murugavel.kcmr@gmail.com', 'Mailer');
//$mail->addAddress('murugavel.c@vividinfotech.com', 'Joe User');     // Add a recipient
//$mail->addAddress('kabilan.k@vividinfotech.com');               // Name is optional
//$mail->addReplyTo('murugavel.kcmr@gmail.com', 'Information');
////$mail->addCC('cc@example.com');
////$mail->addBCC('bcc@example.com');
//
////$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
////$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
////$mail->isHTML(true);                                  // Set email format to HTML
//
//$mail->Subject = 'Here is the subject';
//$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
//if(!$mail->send()) {
//    echo 'Message could not be sent.';
//    echo 'Mailer Error: ' . $mail->ErrorInfo;
//} else {
//    echo 'Message has been sent'; 
//}


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'murugavel.kcmr@gmail.com';                 // SMTP username
$mail->Password = 'Zeal@skvel56';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('murugavel.kcmr@gmail.com', 'Mailer');
$mail->addAddress('murugavel.c@vividinfotech.com', 'Joe User');     // Add a recipient
//$mail->addAddress('kabilan.k@vividinfotech.com');               // Name is optional
$mail->addReplyTo('murugavel.kcmr@gmail.com', 'Information');
$mail->isHTML(true);

$mail->Subject = 'Quote Email Template';
$mail->Body    = '<!doctype html>
                    <html>
                    <head>
                        <meta charset="utf-8">
                        <title>A simple, clean, and responsive HTML invoice template</title>
                        
                        <style>
                        .invoice-box{
                            max-width:800px;
                            margin:auto;
                            padding:30px;
                            border:1px solid #555;
                            box-shadow:0 0 10px rgba(0, 0, 0, .15);
                            font-size:16px;
                            line-height:24px;
                            font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                            color:#000;
                        }
                        
                        .invoice-box table{
                            width:100%;
                            line-height:inherit;
                            text-align:left;
                        }
                        
                        .invoice-box table td{
                            padding:5px;
                            vertical-align:top;
                        }
                        
                        .invoice-box table tr td:nth-child(2){
                            text-align:right;
                        }
                        
                        .invoice-box table tr.top table td{
                            padding-bottom:20px;
                        }
                        
                        .invoice-box table tr.top table td.title{
                            font-size:45px;
                            line-height:45px;
                            color:#fff;
                        }
                        
                        .invoice-box table tr.information table td{
                            padding-bottom:40px;
                        }
                        
                        .invoice-box table tr.heading td{
                            background:#eee;
                            border-bottom:1px solid #ddd;
                            font-weight:bold;
                        }
                        
                        .invoice-box table tr.details td{
                            padding-bottom:20px;
                        }
                        
                        .invoice-box table tr.item td{
                            border-bottom:1px solid #eee;
                        }
                        
                        .invoice-box table tr.item.last td{
                            border-bottom:none;
                        }
                        
                        .invoice-box table tr.total td:nth-child(2){
                            border-top:2px solid #eee;
                            font-weight:bold;
                        }
                        
                        @media only screen and (max-width: 600px) {
                            .invoice-box table tr.top table td{
                                width:100%;
                                display:block;
                                text-align:center;
                            }
                            
                            .invoice-box table tr.information table td{
                                width:100%;
                                display:block;
                                text-align:center;
                            }
                        }
                        </style>
                    </head>
                    
                    <body>
                        <div class="content">
                            <h2>Paris</h2>
                            <p>Paris is the capital and most populous city of France.</p>
                        </div>
                        <div align="center">
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" width="300" height="40" bgcolor="#000091" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">
                                        <a href="http://local.siarum.net/hc_scripts/dompdf/pdf_download_invoice.php?id=1&action=2&client=529" style="font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block"><span style="color: #FFFFFF">Accept this Quote.!!</span></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="invoice-box">
                            <table cellpadding="0" cellspacing="0">
                                <tr class="top">
                                    <td colspan="2">
                                        <table>
                                            <tr>
                                                <td class="title">
                                                    <img src="http://siarum.dev192.com/images/Siarum-v2-logo-75.png" style="width:100%; max-width:300px;">
                                                </td>
                                                
                                                <td style="text-align: right;">
                                                    Quote #: 123<br>
                                                    Created Date: June 7, 2017<br>
                                                    Expiry Date: July 1, 2017<br>
                                                    Due Date: July 1, 2017
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                <tr class="information">
                                    <td colspan="2">
                                        <table>
                                            <tr>
                                                <td>
                                                <b>Billing Address:</b> <br>
                                                    Next Step Webs, Inc.<br>
                                                    12345 Sunny Road<br>
                                                    Sunnyville, TX 12345
                                                </td>
                                                
                                                <td style="text-align: right;">
                                                <b>Shipping Address:</b> <br>
                                                    Next Step Webs, Inc.<br>
                                                    12345 Sunny Road<br>
                                                    Sunnyville, TX 12345
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                <tr class="heading">
                                    <td>
                                        <b>Client Name:</b> 
                                    </td>
                                    <td style="text-align: right;">
                                        <b>Sales Person:</b>
                                    </td>
                                </tr>
                                <tr class="details">
                                    <td>
                                        Vivid Infotech 
                                    </td>
                                    
                                    <td style="text-align: right;">
                                        Murugavel
                                    </td>
                                </tr>
                                <tr class="heading">
                                    <td>
                                        Payment Terms:
                                    </td>
                                    
                                    <td style="text-align: right;">
                                       $
                                    </td>
                                </tr>
                                
                                <tr class="details">
                                    <td>
                                        Check
                                    </td>
                                    
                                    <td style="text-align: right;">
                                        $1000
                                    </td>
                                </tr>
                                </table>
                                <table class="products">
                                <tr class="products-item" style="background-color: #000; border: 1px solid #ddd; color:#fff;">
                                    <td>
                                        Product/Services
                                    </td>
                                    <td>
                                        Description
                                    </td>
                                    <td>
                                        Qty
                                    </td>
                                    <td>
                                        Apply Taxes
                                    </td>
                                    <td>
                                        Unit Rate ($)
                                    </td>
                                    <td>
                                        Discount Price ($)
                                    </td>
                                    <td>
                                        Price ($)
                                    </td>
                                </tr>
                                
                                <tr class="item">
                                    <td> Website design</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td>$300.00</td>
                                </tr>
                                
                                <tr class="item">
                                    <td> Hosting (3 months)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td>$75.00</td>
                                </tr>
                                
                                <tr class="item last">
                                    <td>Domain name (1 year)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td>$10.00</td>
                                </tr>
                                
                                <tr class="total">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                      <b> Total: </b> 
                                    </td>
                                    <td>
                                        <b> $385.00  </b>
                                    </td>
                                </tr>
                            </table><br><br>
                        </div>
                        
                    </body>
                    </html>
                    ';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent'; 
}
//// multiple recipients
//$to  = 'aidan@example.com' . ', '; // note the comma
//$to .= 'wez@example.com';
//
//// subject
//$subject = 'Birthday Reminders for August';
//
//// message
//$message = '
//<html>
//<head>
//  <title>Birthday Reminders for August</title>
//</head>
//<body>
//  <p>Here are the birthdays upcoming in August!</p>
//  <table>
//    <tr>
//      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
//    </tr>
//    <tr>
//      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
//    </tr>
//    <tr>
//      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
//    </tr>
//  </table>
//</body>
//</html>
//';
//
//// To send HTML mail, the Content-type header must be set
//$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//
//// Additional headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
//$headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
//
//
//// Mail it
//mail($to, $subject, $message, $headers);
?>