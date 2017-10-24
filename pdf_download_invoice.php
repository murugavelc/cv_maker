<?php
error_reporting(0);

require_once ('dompdf_config.inc.php');

$link = mysqli_connect('localhost','root','','ringsecurev2db') or die('Cannot connect to the DB');

     if (!$link) {
    	die ( 'Could not connect: ' . mysqli_error () );
    }

        $client = array();
        $products = array();
        $id = $_GET['id'];
        $action = $_GET['action'];
        $logged_id = $_GET['client'];
        $html = '';

        $sql = "SELECT * FROM `tbl_voicemax_crm_invoices`  WHERE `id` = '".$id."'";
        $check = mysqli_query($link,$sql);
        $invoice = mysqli_fetch_assoc($check);  
        
        $sql = "SELECT `id`,`client_name` FROM `tbl_voicemax_crm_clients` WHERE `user_id` = '".$logged_id."'";
        $check = mysqli_query($link,$sql);
        $client = mysqli_fetch_assoc($check);
        
        $sql = "SELECT * FROM `tbl_voicemax_clients` WHERE `user_id` = '".$logged_id."'";
        $check = mysqli_query($link,$sql);
        $client_data = mysqli_fetch_assoc($check); 
        
        $sql = "SELECT `service_id`,`name` FROM `tbl_voicemax_crm_product_services` WHERE `created_by` = '".$logged_id."' AND `status` = 1";
        $check = mysqli_query($link,$sql);
        $products = mysqli_fetch_assoc($check); 
        
        $sql = "SELECT * FROM `tbl_voicemax_invoice_services` WHERE `invoice_id` = '".$id."'";
        $check = mysqli_query($link,$sql);
        $product_list = mysqli_fetch_assoc($check); 
        
        $sql = "SELECT `staff_name` FROM `tbl_voicemax_staff_users` WHERE `staff_id` = '".$invoice['sales_person']."'";
        $check = mysqli_query($link,$sql);
        $sales_person = mysqli_fetch_assoc($check); 

        if($invoice['payment_terms']=='1'){
            $payment_terms = 'On delivery';
        }elseif($invoice['payment_terms']=='2'){
            $payment_terms = 'Advance';
        }elseif($invoice['payment_terms']=='3'){
            $payment_terms = 'Online';
        }elseif($invoice['payment_terms']=='4'){
            $payment_terms = 'Partial';
        }
        
        if(empty($client_data['client_logo'])){
            $client_logo = $_SERVER['DOCUMENT_ROOT'].'/images/blank_trans_logo.png';
        }else{
            $client_logo = $_SERVER['DOCUMENT_ROOT'].'/images/clients/'.$client_data['client_logo'];
        }
        
        foreach($product_list as $product_data){
            
        $sql = "SELECT `name` FROM `tbl_voicemax_crm_product_services` WHERE `service_id` = '".$product_data['service_id']."'";
        $check = mysqli_query($link,$sql);
        $products_name = mysqli_fetch_assoc($check);
        
            if($product_data['taxable']=='1'){
                $tax = 'Yes';
            }elseif($product_data['taxable']=='2'){
                $tax = 'No';
            }
            $product_items = '<tr class="item">
                <td>'.$products_name['name'].'</td>
                <td>'.$product_list['description'].'</td>
                <td>'.$product_list['qty'].'</td>
                <td>'.$tax.'</td>
                <td>'.$product_list['unit'].'</td>
                <td>'.$product_list['discount'].'</td>
                
                <td>'.$product_list['price'].'</td>
            </tr>';            
        }
        
       
       // print_r($product_items); die;
        if($action == '1'){
               $html = '<!doctype html>
                    <html>
                    <head>
                        <meta charset="utf-8">
                        <title>invoice template</title>
                        <style>
                        table{
                           width: 98%;  border: 1px; font-size: 13px; font-family: "Times New Roman", Times, serif;
                        }
                        table tr.heading td{
                            background:#eee;
                            border-bottom:1px solid #ddd;
                            font-weight:bold;
                        }
                        table tr.products-item td{
                            background:#006787;
                            background-color: #006787;
                            font-weight:bold;
                            text-align: center;
                        }
                        </style>
                    </head>
                    
                    <body>
                    <table cellpadding="5" cellspacing="5">
                        
                    <tr>
                        <td class="title">
                            <img src="'.$client_logo.'" style="height:100px; max-width:300px;">
                        </td>
                        
                        <td style="text-align: right;">
                            Invoice #: '.$invoice['reference_number'].'<br>
                            Created Date: '.$invoice['invoice_date'].'<br>
                            Expiry Date: '.$invoice['expiry_date'].'<br>
                            Due Date: '.$invoice['due_date'].'
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                        <b>'.$client_data['client_company_name'].'</b> <br>
                            '.$client_data['client_address'].'<br>
                            '.$client_data['client_zip_code'].'
                            
                        </td>
                    </tr>
                                
                    <tr class="heading" style="background-color: #000; color:#fff;">
                        
                        <td>
                            <b>Client Name:</b> 
                        </td>
                        <td style="text-align: right;">
                            <b>Sales Person:</b>
                        </td>
                    </tr>
                    <tr class="details">
                        <td>
                            '.$client['client_name'].' 
                        </td><br>
                        
                        <td style="text-align: right;">
                            '.$sales_person['staff_name'].'
                        </td><br>
                    </tr>
                     
                    <tr class="heading" style="background-color: #000; color:#fff;" >
                     
                        <td>
                           <b> Payment Terms: </b>
                        </td>
                        
                        <td style="text-align: right;">
                         <b>  $ </b>
                        </td>
                    </tr>
                    
                    <tr class="details">
                        <td>
                            '.$payment_terms.'
                        </td><br>
                        
                        <td style="text-align: right;">
                            '.$invoice['total_price'].'
                        </td><br>
                    </tr>
                      
                </table><br>
                <table class="products" cellpadding="3" cellspacing="3">
                        <tr class="products-item" style=" background-color: #006787; color: #fff;">
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
                      '.$product_items.'
                      <tr class="item empty">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="item empty">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="item last">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub Total($)</td>
                            
                            <td>'.$invoice['sub_total'].'</td>
                        </tr>
                        <tr class="shipping">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                              Shipping($)
                            </td>
                            <td>
                               '.$invoice['shipping'].' 
                            </td>
                        </tr>
                        <tr class="total">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                              <b>Total Payable($)</b> 
                            </td>
                            <td>
                                <b> '.$invoice['total_price'].' </b>
                            </td>
                        </tr>
                    </table><br> <br>
                    <table cellpadding="3" cellspacing="3">
                    <tr class="heading">
                        <td>
                            <b>Billing Address:</b> 
                        </td>
                        <td style="text-align: right;">
                            <b>Shipping Address:</b>
                        </td>
                    </tr>
                    <tr>
                        <td>
        
                            '.$invoice['bill_address'].'<br>
                            '.$invoice['bill_city'].'<br>
                            '.$invoice['bill_state'].'  '.$invoice['bill_zipcode'].'
                        </td>
                        
                        <td style="text-align: right;">
                        
                            '.$invoice['ship_address'].'<br>
                            '.$invoice['ship_city'].'<br>
                            '.$invoice['ship_state'].'  '.$invoice['ship_zipcode'].'
                        </td>
                    </tr>
                      
                    </table>
                    </body>
                    </html>';
            $filename = $invoice['id'].'-'.$client['client_name'].'-'.date('m-d-Y');
            $dompdf = new DOMPDF();
            $dompdf->load_html($html);
            $dompdf->render();
            $dompdf->stream("$filename.pdf");
            exit();
        }elseif($action == '2'){

             $html = '<!doctype html>
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
                        <div class="invoice-box">
                            <table cellpadding="5" cellspacing="5">
                                <tr class="top">
                                    <td colspan="2">
                                        <table>
                                            <tr>
                                                <td class="title">
                                                    <img src="'.$client_logo.'" style="height:100px; max-width:300px;">
                                                </td>
                                                
                                                <td style="text-align: right;">
                                                    Invoice #: '.$invoice['reference_number'].'<br>
                                                    Created Date: '.$invoice['invoice_date'].'<br>
                                                    Expiry Date: '.$invoice['expiry_date'].'<br>
                                                    Due Date: '.$invoice['due_date'].'
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                <tr class="information">
                                    <td colspan="2">
                                        <table cellpadding="3" cellspacing="3">
                                            <tr>
                                                <td>
                                                <b>'.$client_data['client_company_name'].'</b> <br>
                                                    '.$client_data['client_address'].'<br>
                                                    '.$client_data['client_zip_code'].'
                                                    
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
                                        '.$client['client_name'].' 
                                    </td>
                                    
                                    <td style="text-align: right;">
                                        '.$sales_person['staff_name'].'
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
                                        '.$payment_terms.'
                                    </td>
                                    
                                    <td style="text-align: right;">
                                        '.$invoice['total_price'].'
                                    </td>
                                </tr>
                                </table>
                                <table class="products" cellpadding="3" cellspacing="3">
                                <tr class="products-item" style="background-color: #006787; border: 1px solid #ddd; color:#fff;">
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
                              '.$product_items.'
                              <tr class="item empty">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="item last">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Sub Total($)</td>
                                    
                                    <td>'.$invoice['sub_total'].'</td>
                                </tr>
                                <tr class="shipping">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                      Shipping($)
                                    </td>
                                    <td>
                                       '.$invoice['shipping'].' 
                                    </td>
                                </tr>
                                <tr class="total">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                      <b>Total Payable($)</b> 
                                    </td>
                                    <td>
                                        <b> '.$invoice['total_price'].' </b>
                                    </td>
                                </tr>
                            </table>
                            <br><br>
                            <table cellpadding="3" cellspacing="3">
                            
                            <tr class="heading">
                                    <td>
                                        <b>Billing Address:</b> 
                                    </td>
                                    <td style="text-align: right;">
                                        <b>Shipping Address:</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                    
                                        '.$invoice['bill_address'].'<br>
                                        '.$invoice['bill_city'].'<br>
                                        '.$invoice['bill_state'].'  '.$invoice['bill_zipcode'].'
                                    </td>
                                    
                                    <td style="text-align: right;">
                                    
                                        '.$invoice['ship_address'].'<br>
                                        '.$invoice['ship_city'].'<br>
                                        '.$invoice['ship_state'].'  '.$invoice['ship_zipcode'].'
                                    </td>
                                </tr>
                            </table>
                                
                        </div>
                    </body>
                    </html>';
                echo $html;
            }       
        

?>