<?php
## Here, is necessary the DB Connection. If the script is in the WP install, it's not necessary.
#
# $DBHostname = 'mysql-hostname'
# $DBUser = 'username'
# $DBPass = 'password'
# $DBName = 'database-name'
##

$WP_Table = 'wp_posts';

## Define the interval period between First Date and Last Date

$Interval_Period = '15';
$Metric = 'day';

$Last_Date = Datetime ();  
$First_Data = Date_sub($Last_Date, interval '$Interval_Period' $Metric);


$sql = "SELECT id, post_title, post_date\n"
    . "FROM $WP_Table\n"
    . "WHERE post_date\n"
    . "BETWEEN \'$First_Date\'\n"
    . "AND \'$Last_Date\'\n"
    . "and post_title <> \' \'\n"
    . "AND post_status = \'publish\'\n"
    . "LIMIT 0 , 30";



function create_post(){
 // Generate the new $new_post
  $new_post = array();
  $new_post['post_title'] = 'The Periodic Auto Post';
  $new_post['post_content'] = $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Post_Title: " . $row["post_title"]. " " . $row["post_date"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
  $new_post['post_status'] = 'publish' (ou 'draft');
  $new_post['post_author'] = 1;
  $new_post['post_category'] = array(1);
 
// Insert the New Post to Database
  wp_insert_post( $new_post );
     
}


?>
