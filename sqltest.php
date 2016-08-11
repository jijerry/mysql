<?php
/** //sqltest.php
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/12
 * Time: 0:24
 */
require_once "login.php";
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Unable to conncet to MYSQL".mysqli_error($db_server));

mysqli_select_db($db_server, $db_database)
    or die("Unable to choose DATABASE".mysqli_error($db_server));

echo <<<_END
<form action="sqltest.php method="post"><pre>
id <input type ="text" name="id"/>
name <input type ="text" name = "name"/>
    <input type = "submit" value ="ADD RECORD"/>
    </pre></form>
_END;


$query = "SELECT * FROM class";
$results = mysqli_query($db_server, $query);
if (!$results) die("Database access failed".mysqli_error($db_server));
$rows = mysqli_num_rows($results);
for ($row = 0; $row < $rows; $row++) {
    $row = mysqli_fetch_row($results);
    echo <<<_END
    <pre>
    id $row[0]
    name $row[1]
    </pre>

<form action = "sqltest.php" method = "post"><pre>
<input type = "hidden" name = "delete" value = "yes"/>
<input type = "hidden" name = "usename" value = "$row[0]"/>
<input type = "submit" value = "DELETE RECORD"/>
</pre></form>

_END;
}

