<?php
## Here, is necessary the DB Connection. If the script is in the WP install, it's not necessary.
#
# $DBHostname = 'mysql-hostname'
# $DBUser = 'username'
# $DBPass = 'password'
# $DBName = 'database-name'
##

## Define the interval period between First Date and Last Date

$Interval_Period = 
$Last_Date = Datetime ();  
$First_Data = sub($Last_Date, interval '




$sql = "SELECT id, post_title, post_date\n"
    . "FROM wp_unp_posts\n"
    . "WHERE post_date\n"
    . "BETWEEN \'2016-01-01\'\n"
    . "AND \'2016-01-25\'\n"
    . "and post_title <> \' \'\n"
    . "AND post_status = \'publish\'\n"
    . "LIMIT 0 , 30";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["campo1"]. " " . $row["campo2"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();



function create_post(){
 // Cria o objeto $post
  $my_post = array();
  $my_post['post_title'] = 'My post';
  $my_post['post_content'] = 'aqui os resultados da consulta.';
  $my_post['post_status'] = 'publish' (ou 'draft');
  $my_post['post_author'] = 1;
  $my_post['post_category'] = array(1);
 
// Insere o Post no Banco de Dados
  wp_insert_post( $my_post );
     
}


?>
