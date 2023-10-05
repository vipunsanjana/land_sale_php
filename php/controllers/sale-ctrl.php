<?php 

    require_once("php/includes/dbFunctions.php");

    $values = array(); //to store post details

    if (isset($_GET['id']) and is_numeric($_GET['id'])) //check if page is accessed with correct parameters
    {
        $id = (int)$_GET['id'];  //get post id

        if (isset($_SESSION['user_id']))
        {
            $values = getSale((int)$id, $_SESSION['user_id']); //get details from the database
        }
        else
        {
            $values = getSale((int)$id); //get details from the database
        }

        if ($values === False)
        {
            echo "could not find that post";
            die();
        }
    }
    else
    {
        //todo error page
        echo "could not find that post";
        die();
    }
?>