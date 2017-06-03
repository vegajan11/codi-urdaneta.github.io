<?php
session_start(); 




require_once '../../database.php';

$tablename = " users INNER JOIN membersinfo ON users.userId = membersinfo.userId ";
$cols = " users.userId, users.lastName, users.firstName, membersinfo.sex, users.dateOfBirth, membersinfo.memberAddress ";
$condition = " users.userId >= '1'";


$show = $obj->fetchi($tablename, $cols, $condition);

$total = count($show);



?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Attendance Report</title>

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
                    <h1 class="page-header">Attendance Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Search Settings
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>View Attendance</label>
                                    <select id = "viewby" class="form-control">
                                        <option>By Person</option>
                                        <option>By Event</option>
                                    </select>
                                </div>
                            </div>
                            <div class="byevent col-md-10">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Event Type</label>
                                    <select id = "eventType" class="form-control">
                                        <option value = "Sunday Service">Sunday Service</option>
                                        <option value = "Midweek Service">Midweek Service</option>
                                        <option value = "Prayer Meeting">Prayer Meeting</option>
                                        <option value = "Special Event">Special Event</option>
                                    </select>
                                </div>
                            </div>
                                
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Event Date</label>
                                    <input id = "eventDate" type = "date" class="form-control" name="eventDate">
                                </div>
                            </div>
                            </div>

                            <div  class="byperson col-md-10">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From</label>
                                        <input id = "dateFrom" type = "date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">                         
                                    <div class="form-group">
                                        <label>To</label>
                                        <input id = "dateTo" type = "date" class="form-control">
                                    </div>
                                </div>
                                <div  class="col-md-4">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id = "name" type = "text" class="form-control" data-toggle="modal" data-target="#myModal" readonly>
                                        <input type="hidden" id ="userId" name=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Attendance Report
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class = "byevent">
                            <div id = "memberattendancetable">
                               
                           </div>
                        </div>
                        <div class = "byperson">
                            <div id = "memberattendanceperson">
                               
                           </div>
                        </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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


<script>

$(document).ready(function(){

    var viewby = $('#viewby');
    $('.byevent').hide();
    viewby.change(divshow);
    function divshow (){
        if (viewby.val() == "By Person"){
            $('.byevent').hide('fast');
            $('.byperson').show('fast');

        } else {
            $('.byperson').hide('fast');
            $('.byevent').show('fast');

        }
    }

        var eventDate = $('#eventDate');
        var eventType = $('#eventType');
        var dateFrom = $('#dateFrom');
        var dateTo = $('#dateTo');
        var strName = $('#strName');
        var eventdate = eventDate.val();;
        var eventtype;
        var datefrom;
        var dateto;
        var strname;
    function byevent(){

            eventdate = eventDate.val();
            eventtype = eventType.val();
            strname = strName.val();

            var jqxhr = "";
            var jqxhr = $.post('viewmemberattendance.php',{eventDate:eventdate, eventType:eventtype,  strName:strname}, function(data){
            document.getElementById('memberattendancetable').innerHTML = data;
            })
            .done(function(){

                 $('#dataTables-attendance').DataTable({
                    responsive: true
                });
            }) 

             .fail(function(){

            }) 

              .always(function(){

            });
    }



    $('body').on("change", "#eventType", function(){
        if (!(eventdate == '')){
            byevent();
        }
    });

    $('body').on("change", "#eventDate", function(){
          byevent();
  
    });

var name = $('#strName');
$('#strName').keyup(function(){
         if (name.val() == ""){
            $("#suggest").hide();
         } else {
            $("#suggest").show();
                var str = name.val();

            $.post('autocomplete.php',{strname:str}, function(data){
                   $("#suggest").html(data);
                });    
                
            }
});

function search(){
if (!($('#userId').val()=="") && !($('#dateTo').val()=="") && !($('#dateFrom').val()=="")){
       
            var datefrom = dateFrom.val();
            var dateto = dateTo.val();
            var userID = $('#userId').val();


  var jqxhr = "";
            var jqxhr = $.post('viewpersonattendance.php',{dateFrom:datefrom, dateTo:dateto, userID:userID}, function(data){
            document.getElementById('memberattendanceperson').innerHTML = data;
            })
            .done(function(){

                 $('#dataTables-person').DataTable({
                    responsive: true
                });
            }) 

             .fail(function(){

            }) 

              .always(function(){

            });







    }
    
}


$('body').on("click", "tr.myRow", function(){

    var userId = this.cells[0].innerHTML;
    var membername = this.cells[1].innerHTML;
 $('#userId').val(userId);
 $('#name').val(membername);


       search();
    

});


$('#dateFrom').change(function(){
         search();
});

$('#dateTo').change(function(){
         search();
});

$('#name').click(function(){
    $('#strName').focus()
});

$('#dateTo').datepicker("option", "minDate", "05/28/2017");


$('#dateFrom').datepicker({
    "onSelect": function (){
        var input = $(this);
        $('#dateTo').datepicker("option", "minDate", input.datepicker("getDate"));
            $('#dateTo').datepicker("refresh");
    }
});

$('#dateTo').datepicker();

$('#dateTo').datepicker({
    "onSelect": function (){
        var input = $(this);
        $('#dateFrom').datepicker("option", "maxDate", input.datepicker("getDate"));
            $('#dateFrom').datepicker("refresh");
    }
});

var dayAfter = input.datepicker("getDate");
dayAfter.setDate(dayAfter.getDate() + 1);
$('#dateTo').datepicker("option", "minDate", dayAfter);

});

</script>
<style type="text/css">
    
tr {
  border-radius:10px;
}
td {
  font-style: italic;
  font-weight: 800;
  font-color: black;
  padding: 0.5em;
  font-size: 1.15em;
  font-family: "Lora";

}

tr.myRow:hover {
  border-radius:4px;
opacity: 0.5; background-color: rgb(255, 255,255);
color:blue;
font-size:1.10em;
}

tr.present:hover {
  border-radius:4px;
opacity: 0.5; background-color: rgb(255, 255,255);
}
td.fontdisplay {
  padding-top:.1em;
  font-size: 0.5em;
  border-bottom: 2px solid white; 
}

#suggest {

    cursor:pointer;
    margin-top:5px;

}
#suggest{
      height:100px; 
      width:100%;
      overflow:auto;
}

#suggestdiv{
      height:300px; 
      border:2px solid white;
      border-radius:5px;
      padding:5px;
      opacity:0.5;
      background-color: rgb(255, 255, 255);
}
</style>