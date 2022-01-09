<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Simple Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="layout" content="main"/>
    
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <script src="../../../public/JS/Deliveryperson.js" type="text/javascript" ></script>
    <link href="../../../public/CSS/Deliveryperson.css" type="text/css" media="screen, projection" rel="stylesheet" />

    <style>
    </style>
</head>
<body>
<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    
                    <a href="dashboard.html" class="brand"><i class="icon-leaf">Clean Dashboard</i></a>
                    <h4>My Status : <?php echo $this->stateName ?></h4>
                    <div id="app-nav-top-bar" class="nav-collapse">
                        
                        <ul class="nav pull-right">
                            <li>
                                <a href="login.html">Logout</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="body-container">
            <div id="body-content">
                
                    
                
                
        

        <section class="page container">
            <div class="row">
            
                <div class="span12">
            <?php  
            foreach($this->invoiceOrders as $order){ ?> 
                
                <div id="<?php echo $order->getOrderId(); ?>" class="box">
                <div class="box-header">
                    <i class="icon-user icon-large"></i>
                    <h5><?php echo $order->getCustomerName(); ?></h5>
                </div>
                <div>
                <form method="post" <?php echo 'action="updateStatus/'.$order->getOrderId().'/0"'?>>
                    <?php if($order->getStatus()==2){ ?>
                    <input name="updatestat" id="upt" type="submit" data-placement="top" class="btn btn-info btn-xs glyphicon glyphicon-usd" title="Danger" value="Accept">
                    <?php } ?>
                    <?php if($order->getStatus()==3){ ?>
                    <input name="updatestat" id="upt" type="submit" data-placement="top" class="btn btn-success btn-xs glyphicon glyphicon-ok" title="Danger" value="Delivered">
                    <?php } ?>
        

                </form>
                </div>
                <div class="box-content box-table">
                <table class="table table-hover tablesorter">
                    <thead>
                        <tr>
                        <th>Name</th>
                        <th>Telephone No</th>
                        <th>Address</th>
                        <th>Items</th>
                        <th>Amount</th>
                        <th>Type</th>   
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td><?php echo $order->getCustomer()->getName(); ?></td>
                            <td><?php echo $order->getCustomer()->getMobile_no(); ?></td>
                            <td><?php echo $order->getCustomer()->getAddress(); ?></td>
                            <td><?php foreach ($order->getOrderItems() as $item){
                                echo $item->getName()."-". $item->getQuantity()."  ";
                            } ?></td>
                            <td><?php echo $order->getAmount(); ?></td>
                            <td>Order</td>

                            
                        </tr>
                    
                        
                    
                    </tbody>
                </table>
                </div>

            </div>
                 <?php   } ?>

                 <?php  
            foreach($this->returnOrders as $order){ ?> 
                
                <div id="<?php echo $order->getOrderId(); ?>" class="box">
                <div class="box-header">
                    <i class="icon-user icon-large"></i>
                    <h5><?php echo $order->getCustomerName(); ?></h5>
                </div>
                <div>
                <form method="post" <?php echo 'action="updateStatus/'.$order->getOrderId().'/1"'?>>
                    <?php if($order->getStatus()==1){ ?>
                    <input name="updatestat" id="upt" type="submit" data-placement="top" class="btn btn-info btn-xs glyphicon glyphicon-usd" title="Danger" value="Accept">
                    <?php } ?>
                    <?php if($order->getStatus()==2){ ?>
                    <input name="updatestat" id="upt" type="submit" data-placement="top" class="btn btn-success btn-xs glyphicon glyphicon-ok" title="Danger" value="Delivered">
                    <?php } ?>
        

                </form>
                </div>
                <div class="box-content box-table">
                <table class="table table-hover tablesorter">
                    <thead>
                        <tr>
                        <th>Name</th>
                        <th>Telephone No</th>
                        <th>Address</th>
                        <th>Items</th>
                        <th>Amount</th>
                        <th>Type</th>   
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td><?php echo $order->getCustomer()->getName(); ?></td>
                            <td><?php echo $order->getCustomer()->getMobile_no(); ?></td>
                            <td><?php echo $order->getCustomer()->getAddress(); ?></td>
                            <td><?php foreach ($order->getOrderItems() as $item){
                                echo $item->getName()."-". $item->getQuantity()."  ";
                            } ?></td>
                            <td><?php echo $order->getAmount(); ?></td>
                            <td>Return Order</td>

                            
                        </tr>
                    
                        
                    
                    </tbody>
                </table>
                </div>

            </div>
                 <?php   } ?>
                     
                </div>
                  
            </div>
        </section>
        
    
            </div>
        </div>

        <div id="spinner" class="spinner" style="display:none;">
            Loading&hellip;
        </div>

        <footer class="application-footer">
            <div class="container">
                <p>Application Footer</p>
                <div class="disclaimer">
                    <p>This is an example disclaimer. All right reserved.</p>
                    <p>Copyright © keaplogik 2011-2012</p>
                </div>
            </div>
        </footer>

        <script src="../js/bootstrap/bootstrap-transition.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-alert.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-modal.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-dropdown.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-scrollspy.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-tab.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-tooltip.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-popover.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-button.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-collapse.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-carousel.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-typeahead.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-affix.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-datepicker.js" type="text/javascript" ></script>
        <script src="../js/jquery/jquery-tablesorter.js" type="text/javascript" ></script>
        <script src="../js/jquery/jquery-chosen.js" type="text/javascript" ></script>
        <script src="../js/jquery/virtual-tour.js" type="text/javascript" ></script>
        <script type="text/javascript">
        $(function() {
            $('#person-list.nav > li > a').click(function(e){
                if($(this).attr('id') == "view-all"){
                    $('div[id*="Person-"]').fadeIn('fast');
                }else{
                    var aRef = $(this);
                    var tablesToHide = $('div[id*="Person-"]:visible').length > 1
                            ? $('div[id*="Person-"]:visible') : $($('#person-list > li[class="active"] > a').attr('href'));

                    tablesToHide.hide();
                    $(aRef.attr('href')).fadeIn('fast');
                }
                $('#person-list > li[class="active"]').removeClass('active');
                $(this).parent().addClass('active');
                e.preventDefault();
            });

            $(function(){
                $('table').tablesorter();
                $("[rel=tooltip]").tooltip();
            });
        });
    </script>
</body>
</html>