<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $site; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="<?php echo $ROOT; ?>/3rdparty/bootstrap/css/bootstrap.min.css" rel="stylesheet"
              media="screen">

        <!-- fix P0120-11 -->
        <style>
            
            .table td:nth-child(7)  {white-space: nowrap;}
            .table td:nth-child(6)  {white-space: nowrap;}
            
        </style>
        <!-- fix end P0120-11 -->
        
        <script src="<?php echo $ROOT; ?>/3rdparty/jquery/jquery.min.js"></script>
       	<link rel="stylesheet" type="text/css" href="<?php echo $ROOT; ?>/3rdparty/datatables/datatables.min.css"/>
        <script type="text/javascript" src="<?php echo $ROOT; ?>/3rdparty/datatables/datatables.min.js"></script>

    </head>
    <body>

        <div class="container">

            <br>

            <div class="row">
                <div class="col-sm-3">
                    <img class="img-responsive" src="<?php echo $ROOT; ?>/assets/img/ppmslognew.jpg">
                </div>
                <div class="col-sm-5">
                    <!--<?php if ($message): ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><?php echo $message; ?></strong>
                        </div>
                    <?php endif; ?>-->
                    <div style="margin-top: 10px;">
                        <p>Role: <?php echo $logged_user->getGroupName(); ?></p>

                        <p>You are logged in as: <?php echo $logged_user['name']; ?> <?php echo $logged_user['last_name']; ?></p>
                    </div>
                </div>
                <div class="col-sm-2">
					<?php if ($logged_user['group_id'] !=4 && $logged_user['group_id'] !=5): ?>
						<button type="button" class="btn btn-primary btn-lg pull-right"
								onclick="javascript:window.location.href = '<?php echo $ROOT; ?>/'">Dashboard
						</button>
					<?php endif; ?>
                </div>
                <div class="col-sm-1" style="margin-left: 5px">
                    <button type="button" class="btn btn-primary btn-lg pull-right"
                            onclick="javascript:window.location.href = '<?php echo $ROOT; ?>/logout'">Log Out
                    </button>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-sm-2">
                    <?php echo $this->render('user/__sidebar.htm',$this->mime,get_defined_vars()); ?>
                </div>
                <div class="col-sm-10">
                   
                    <?php echo $this->render($content,$this->mime,get_defined_vars()); ?>
                </div>
            </div>

        </div>

        <script src="<?php echo $ROOT; ?>/3rdparty/bootstrap/js/bootstrap.min.js"></script>
        
        <script>
              
            function checkmsg(){
                
                 $.ajax({
                    url: "/section/checkmessagef",
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    success: function(data) {
                        // to work on session expiry
                        if(data != null)
                        {
                            if(data.mflag == "-1")
                            {
                                //location.reload();
								window.location = "/login/timeout";
                            }
                        }
                    }
                });
        }
        
        function msgchecktimer(){
                        
                        // deepanshu stopping message calls
                        checkmsg();
                        
                        setTimeout(function(){msgchecktimer()},3000)
                        
        }
        
        $(document).ready(function(){
             msgchecktimer();
        });
        
          
        $(document).ready(function(){
            $('#data').DataTable({
                "bSort": false
            });
			
        });
        </script>
        
     
    </body>
</html>
