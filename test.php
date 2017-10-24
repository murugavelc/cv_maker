<!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Order Details</title>
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
            
        }
        </style>
    </head>
    
    <body>
    <table cellpadding="5" cellspacing="0">
        
    <tr>
        <td class="title" style="width:30%">
            <img src="'.$client_logo.'" style="height:100px; max-width:200px;">
        </td>
        <td style="width:40%">
        <b>'.$client_data['client_company_name'].'</b> <br>
            '.$client_data['client_address'].'<br>
            '.$client_data['client_zip_code'].'
            
        </td>
        <td style="text-align: right; style="width:40%"">
            Order #: '.$orders['reference_number'].'<br>
            Created Date: '.$orders['order_date'].'<br>
            Expiry Date: '.$orders['expiry_date'].'<br>
           
        </td>
    </tr>
    
    <tr class="heading">
        <td>
            <b>Billing Address:</b> 
        </td>
        <td></td>
        <td style="text-align: left;">
            <b>Shipping Address:</b>
        </td>
    </tr>
    <tr>
         <td>

            '.$orders['bill_address'].'<br>
            '.$orders['bill_city'].'<br>
            '.$orders['bill_state'].'  '.$orders['bill_zipcode'].'
        </td>
        <td></td>
        <td style="text-align: left;">
        
            '.$orders['ship_address'].'<br>
            '.$orders['ship_city'].'<br>
            '.$orders['ship_state'].'  '.$orders['ship_zipcode'].'
        </td>
    <tr>
        
    </tr>
                
    <tr class="heading" style="background-color: #000; color: #000;">
        
        <td>
            <b>Client Name:</b> 
        </td>
        <td style="text-align: left;">
            <b>Sales Person:</b>
        </td>
         <td style="text-align: left;">
           <b> Payment Terms: </b>
        </td>
        
    </tr>
    <tr class="details">
        <td>
            '.$orders['client_name'].' 
        </td><br>
        
        <td style="text-align: left;">
            '.$sales_person['staff_name'].'
        </td><br>
        <td style="text-align: left;">
            '.$payment_terms.'
        </td><br>
    </tr>

</table><br>
<table class="products" cellpadding="3" cellspacing="3">
        <tr class="products-item" style=" background-color: #006787; color: #fff; text-align:left;">
            <td style="width:20%">
                Product/Services
            </td>
            <td style="width:30%">
                Description
            </td>
            <td style="width:10%">
                Qty
            </td>
            <td style="width:15%">
                Unit Rate ($)
            </td>
            <td style="width:15%">
                Discount ($)
            </td>
            <td style="width:10%">
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
        </tr>
        <tr class="item empty">
            
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
            <td>Sub Total($)</td>
            
            <td>'.$orders['sub_total'].'</td>
        </tr>
        <tr class="shipping">
            
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              Shipping($)
            </td>
            <td>
               '.$orders['shipping'].' 
            </td>
        </tr>
        <tr class="total">
            
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <b>Total Payable($)</b> 
            </td>
            <td>
                <b> '.$orders['total_price'].' </b>
            </td>
        </tr>
    </table><br> <br>
    <table>
    <tr>
        <td></td>
        <td>
            <img src="'.$orders['image_sign'].'" style="height:100px; max-width:200px; margin-left: 1123px;"><br>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <p style = "margin-left: 1123px;"> Signature of Prospect/Client </p>
        </td>
    </tr>
    
    </table>
    </body>
    </html>
    <hr />
<!doctype html>
                        <html>
                        <head>
                            <meta charset="utf-8">
                            <title>Order Details</title>
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
                                
                            }
                            </style>
                        </head>
                        
                        <body>
                        <table cellpadding="5" cellspacing="5">
                            
                        <tr>
                            <td></td>
                            <td>
                                <img src="'.$client_logo.'" style="height:100px; max-width:300px;">
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                            <b>'.$client_data['client_company_name'].'</b> <br>
                                '.$client_data['client_address'].'<br>
                                '.$client_data['client_zip_code'].'
                                
                            </td>
                            <td ></td>
                            <td style="text-align: right;">
                                Order #: '.$orders['reference_number'].'<br>
                                Created Date: '.$orders['quote_date'].'<br>
                                Expiry Date: '.$orders['expiry_date'].'<br>
                              
                            </td>
                        </tr>
                    
                    </table><br>
                    <table cellpadding="5" cellspacing="5">
                        <tr class="heading">
                            <td>
                                <b>Billing Address:</b> 
                            </td>
                            <td></td>
                            <td style="text-align: left;">
                                <b>Shipping Address:</b>
                            </td>
                        </tr>
                        <tr>
                             <td>
                    
                                '.$orders['bill_address'].'<br>
                                '.$orders['bill_city'].'<br>
                                '.$orders['bill_state'].'  '.$orders['bill_zipcode'].'
                            </td>
                            <td></td>
                            <td style="text-align: left;">
                            
                                '.$orders['ship_address'].'<br>
                                '.$orders['ship_city'].'<br>
                                '.$orders['ship_state'].'  '.$orders['ship_zipcode'].'
                            </td>
                        
                        </tr>
                    </table><br>   
                    <table cellpadding="5" cellspacing="5">
               
                        <tr class="heading" style="background-color: #000; color:#fff;">
                            
                            <td>
                                <b>Client Name:</b> 
                            </td>
                            <td style="text-align: left;">
                                <b>Sales Person:</b>
                            </td>
                             <td style="text-align: left;">
                               <b> Payment Terms: </b>
                            </td>
                            
                        </tr>
                        <tr class="details">
                            <td>
                                '.$orders['client_name'].' 
                            </td><br>
                            
                            <td style="text-align: left;">
                                '.$sales_person['staff_name'].'
                            </td><br>
                            <td style="text-align: left;">
                                '.$payment_terms.'
                            </td><br>
                        </tr>
                    
                    </table><br>
                    <table class="products" cellpadding="3" cellspacing="3">
                            <tr class="products-item" style=" background-color: #006787; color: #fff; text-align:left;">
                                <td style="width:20%">
                                    Product/Services
                                </td>
                                <td style="width:30%">
                                    Description
                                </td>
                                <td style="width:8%">
                                    Qty
                                </td>
                                <td style="width:15%">
                                    Unit Rate ($)
                                </td>
                                <td style="width:15%">
                                    Discount ($)
                                </td>
                                <td style="width:12%">
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
                            </tr>
                            <tr class="item empty">
                                
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
                                <td>Sub Total($)</td>
                                
                                <td>'.$orders['sub_total'].'</td>
                            </tr>
                            <tr class="shipping">
                                
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                  Shipping($)
                                </td>
                                <td>
                                   '.$orders['shipping'].' 
                                </td>
                            </tr>
                            <tr class="total">
                                
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                  <b>Total Payable($)</b> 
                                </td>
                                <td>
                                    <b> '.$orders['total_price'].' </b>
                                </td>
                            </tr>
                        </table><br> <br>
                        <table>
                        <tr>
                            <td></td>
                            <td>
                                <img src="'.$orders['image_sign'].'" style="height:100px; max-width:200px; margin-left: 1123px;"><br>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <p style = "margin-left: 1123px;"> Signature of Prospect/Client </p>
                            </td>
                        </tr>
                        
                        </table>
                        </body>
                        </html>
                    <hr />
                                 
    