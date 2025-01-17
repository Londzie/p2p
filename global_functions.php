<?php 
    require_once('config/config.php');

    //connects to database using parameters in the /config/config.php file and return true for success and false if failed to connect
    function connect_to_db(){
        global $dbname, $dbhost, $dbuser, $dbpass, $db_connection;

        $db_connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        if (!$db_connection) {
            // TO DO: if error write error to log file
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            return false;
        }

        // echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
        // echo "Host information: ".mysqli_get_host_info($db_connection).PHP_EOL;
        return true; // This should return the link to the db connection

    }

    function log_alert($message,$type = "info"){
        switch ($type) {
            case 'error':
                $type = 'danger';
                break;
            case 'info':
                $type = 'info';
                break;
            case 'secondary':
                $type = 'seconday';
                break;
            case 'success':
                $type = 'success';
                break;
            case 'warning':
                $type = 'warning';
                break; 
            case 'primary':
                $type = 'primary';
                break;
            default:
                $type = 'primary';
                break;
        }
        echo "<div class=\"fixed-bottom alert alert-$type\" role=\"alert\">";
            echo $message;
        echo "</div>";
    }


    function log_alert1($message,$type = "info"){
        switch ($type) {
            case 'error':
                $type = 'danger';
                break;
            case 'info':
                $type = 'info';
                break;
            case 'secondary':
                $type = 'seconday';
                break;
            case 'success':
                $type = 'success';
                break;
            case 'warning':
                $type = 'warning';
                break; 
            case 'primary':
                $type = 'primary';
                break;
            default:
                $type = 'primary';
                break;
        }
        echo "<div class=\"fixed-bottom alert alert-$type\" role=\"alert\">";
            echo $message;
        echo "</div>";
    }

    function count_investments($user_id){
        global $db_connection;
        $sql_query = "SELECT COUNT(*) FROM transactions WHERE recipient_id=\"$user_id\" ";
        $result = mysqli_query($db_connection,$sql_query);
        return mysqli_fetch_array($result)[0];
    }

    // echo "included";

?>