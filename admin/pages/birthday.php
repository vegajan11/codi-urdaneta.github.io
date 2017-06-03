<?php



function showdateday($sdate){
    $d = strtotime($sdate);
    return date(' - d', $d);
}

require_once '../../database.php';

function celebrants($month){

// Fetch data from the table
$tablename = "users";
$cols = array("userId","lastName","firstName","dateOfBirth");
$condition = "MONTH(dateOfBirth) = $month ORDER BY DAY(dateOfBirth)";
$obj = new Database("localhost","root","","codiurd");
$show = $obj->fetch($tablename, $cols, $condition);
global $count;
$count = count($show);

    foreach ($show as $key => $val) {
     echo ('<h5>'.$val['firstName'].showdateday($val['dateOfBirth']).'</h5>');
    }
}   

?>


<!DOCTYPE html>
<html lang="en">

<head>
<style type="text/css">
    .bday{
        height: 250px;
        overflow:auto;
    }
.panel-heading {
    font-weight: 700;
}

</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Birthdays</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

<?php
require_once 'navigator.php';
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Birthdays</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                  <div class="col-lg-3 col-md-4 col-sm-6">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            January
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body bday">
                            <div id = "1"><?php $disp = celebrants("01"); echo $disp; ?></div>
                           
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?php echo "Number of celebrants: $count"; ?>
                        </div> <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->

                <div class="col-lg-3 col-md-4 col-sm-6">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            February
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body bday">
                            <div id = "2"><?php $disp = celebrants("02");echo $disp; ?></div>
                            
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?php echo "Number of celebrants: $count"; ?>
                        </div> <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->

                <div class="col-lg-3 col-md-4 col-sm-6">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            March
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body bday">
                            <div id = "3"><?php $disp = celebrants("03");echo $disp; ?></div>
                            
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?php echo "Number of celebrants: $count"; ?>
                        </div> <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->

                <div class="col-lg-3 col-md-4 col-sm-6">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            April
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body bday">
                            <div id = "4"><?php $disp = celebrants("04");echo $disp; ?></div>
                            
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?php echo "Number of celebrants: $count"; ?>
                        </div> <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->

                <div class="col-lg-3 col-md-4 col-sm-6">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            May
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body bday">
                            <div id = "5"><?php $disp = celebrants("05");echo $disp; ?></div>
                            
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?php echo "Number of celebrants: $count"; ?>
                        </div> <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-3 col-md-4 col-sm-6">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            June
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body bday">
                            <div id = "6"><?php $disp = celebrants("06");echo $disp; ?></div>
                            
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?php echo "Number of celebrants: $count"; ?>
                        </div> <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-3 col-md-4 col-sm-6">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            July
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body bday">
                            <div id = "7"><?php $disp = celebrants("07");echo $disp; ?></div>
                            
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?php echo "Number of celebrants: $count"; ?>
                        </div> <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-3 col-md-4 col-sm-6">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            August
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body bday">
                            <div id = "8"><?php $disp = celebrants("08");echo $disp; ?></div>
                            
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?php echo "Number of celebrants: $count"; ?>
                        </div> <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-3 col-md-4 col-sm-6">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            September
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body bday">
                            <div id = "9"><?php $disp = celebrants("09");echo $disp; ?></div>
                            
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?php echo "Number of celebrants: $count"; ?>
                        </div> <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-3 col-md-4 col-sm-6">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            October
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body bday">
                            <div id = "10"><?php $disp = celebrants("10");echo $disp; ?></div>
                            
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?php echo "Number of celebrants: $count"; ?>
                        </div> <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->

                <div class="col-lg-3 col-md-4 col-sm-6">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            November
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body bday">
                            <div id = "11"><?php $disp = celebrants("11");echo $disp; ?></div>
                            
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?php echo "Number of celebrants: $count"; ?>
                        </div> <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-3 col-md-4 col-sm-6">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            December
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body bday">
                            <div id = "12"><?php $disp = celebrants("12");echo $disp; ?></div>
                            
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?php echo "Number of celebrants: $count"; ?>
                        </div> <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->




            
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Search Name</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                        <input id = "strName" type = "text" class="form-control" autocomplete="off" autofocus="">
                                        <div id = "suggest"></div>
                                    </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->



    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    

</body>

</html>
