<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/14
 * Time: 1:05
 */
include_once "login.php";

//´´½¨cats±í

$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Unable to connect to MYSQL".mysqli_error($db_server));
mysqli_select_db($db_server, $db_database)
    or die("Unable to connect to DATABASE".mysqli_error($db_server));

$query = "CREATE TABLE cats(
            id SMALLINT NOT NULL AUTO_INCREMENT,
            family VARCHAR(32) NOT NULL ,
            name VARCHAR(32) NOT NULL ,
            age INT NOT NULL ,
            PRIMARY KEY (id)
          )";

$result = mysqli_query($db_server, $query);
if (!$result) die("Database access failed:".mysqli_error($db_server));
