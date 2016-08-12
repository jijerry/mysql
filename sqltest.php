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

if (isset($_POST['delete'])&&isset($_POST['id']))
{
    $id = $_POST['id'];
    $query = "DELETE FROM classtable WHERE  id = '$id'";
    if (!mysqli_query($db_server, $query)){
        echo "DELETE data is failed".mysqli_error($db_server);
    }
}
if (isset($_POST['id'])&& isset($_POST['name']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    echo $id, $name;
    $query = "INSERT INTO classtable(id,name)VALUES('$id','$name')";
    if (!mysqli_query($db_server, $query)){
        echo "INSERT data is failed".mysqli_error($db_server);
    }
}

echo <<<_END
<form action="sqltest.php" method="post"><pre>
id <input type ="text" name="id"/>
name <input type ="text" name = "name"/>
    <input type = "submit" value ="ADD RECORD"/>
    </pre></form>
_END;


$query = "SELECT * FROM classtable";
$results = mysqli_query($db_server, $query);
if (!$results) die("Database access failed".mysqli_error($db_server));
$rows = mysqli_num_rows($results);
for ($j = 0; $j < $rows; $j++) {
    $row = mysqli_fetch_row($results);
    echo <<<_END
    <pre>
    id $row[0]
    name $row[1]
    </pre>

<form action = "sqltest.php" method = "post"><pre>
<input type = "hidden" name = "delete" value = "yes"/>
<input type = "hidden" name = "id" value = "$row[0]"/>
<input type = "submit" value = "DELETE RECORD"/>
</pre></form>

_END;
}

