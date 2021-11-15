<?php

// Create a PHP application that pings a server given in the 'server' query param.
// The application should use the system's built in ping command.
// The user inputs the server address in a pink text input that's centered on the screen.
// The application's tilte is 'Check me server' and it's displayed above the form.


// The server address is passed as a query parameter to the script.
// If no address is provided, the script should jus display a message that no server was provided.
// The application should also handle invalid server addresses.

// The application should display the ping results in a blue text area.

// The application should display the following message if the ping failed:
// Server could not be reached.

// The application should display the following message if the ping succeeded:
// Server is reachable.

// The application should display the following message if it is not able to run the ping command:
// Ping failed.

// The application should display the following message if the ping command run successfully, but the server is unreachable:
// Server is unreachable.


$server_ip = $_GET['server'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ping</title>
    </head>
    <body>
        <h1>Ping</h1>
        <img src="https://i.imgur.com/kWj8Nwm.png" />

        <?php
        if(isset($_GET['server'])) {
            echo '<p>Server: '.$_GET['server'].'</p>';
        }
        ?>

<form>
    <input type="text" name="server" placeholder="Server IP address">
    <input type="submit" value="Ping">
</form>
<br>
<?php

if(!$server_ip) {
    echo 'No server was provided!';
}
else {
    $ping = shell_exec("ping -c 1 -W 2 $server_ip");
    $ping = str_replace("\n", "<br>", $ping);
    echo $ping;
} 

?>


<style>
    body {
        background: #e1e1e1;
        text-align: center;
    }
    h1 {
        font-size: 50px;
        color: #c0c0c0;
    }
    input {
        font-size: 25px;
        color: #c0c0c0;
        text-align: center;
        padding: 10px;
    }
    textarea {
        font-size: 25px;
        color: #c0c0c0;
        text-align: center;
        padding: 10px;
        margin-top: 30px;
    }
</style>

    </body>
</html>
