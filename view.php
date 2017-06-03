<?php session_start(); ?>
<?php
require_once 'database.php';


 // Create Connection
            $obj = new Database("localhost","root","","codiurd");

            //Assign table name
            $tablename = "events";

            //Associative array for fetch function
			$show = $obj->fetch($tablename, array("eventId","title","subTitle","speaker","eventDate","eventTime","venue","displayOpt"));
$count = mysqli_num_rows($show);
echo '



          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Sub Title</th>
                  <th>Speaker</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Venue</th>
                  <th>Display</th>
                </tr>
              </thead>
              <tbody> ';
              while($row = $show->fetch_assoc()) {
	echo "
                <tr>
                  <td>".$row['eventId']."</td>
                  <td>".$row['title']."</td>
                  <td>".$row['subTitle']."</td>
                  <td>".$row['speaker']."</td>
                  <td>".$row['eventDate']."</td>
                  <td>".$row['eventTime']."</td>
                  <td>".$row['venue']."</td>
                  <td>".$row['displayOpt']."</td>
                </tr>
            ";
            }
    echo '
               </tbody>
            </table>
            Total number of records: '.$count.'
          </div>';

?>