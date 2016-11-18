<?php
session_start();

require_once( "php/functions.php" );

$conn = Functions::db_connect();

if(isset($_POST['login']))
    {
    
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];
    
    $controlle = "SELECT * FROM klant WHERE gebruikersnaam = '$gebruikersnaam'";
    $resultaat = $conn->query($controlle);
    if($resultaat->num_rows > 0)
        {
        $array = $resultaat->fetch_assoc();
        
        if ( $wachtwoord == $array["wachtwoord"] )
            {
            $_SESSION["user"] = $gebruikersnaam;
            header('Location: index.php?ingelogd');
        }
        else
        {
            echo ("onjuist wachtwoord");
        }
            
        
        
    }
    else{
        echo("gebruikersnaam bestaat niet");
    }
    
}
if(isset($_POST['logout']))
    {
    session_destroy();
   header('Location: index.php');
}

?>