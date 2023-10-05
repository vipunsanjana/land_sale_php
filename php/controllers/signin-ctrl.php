<?php

    require_once("php/includes/dbFunctions.php");
    require_once("php/includes/signinFunctions.php");
    require_once("php/includes/validateFunctions.php");

    //array to store mandatoriness of each field of form
    $required = array(
        "email"=> True,
        "password"=>True
    );

    $values = array();  //array to store values from form
    $errors = array();  //array to store errors relevent to each field

    foreach ($required as $fieldName=>$_)   //initialize arrays with empty values
    {
        $values[$fieldName] = '';
        $errors[$fieldName] = '';
    }

    $errors['form'] = ''; // variable to store form errors

    if(isset($_POST["email"])) //check for a post method
    {
        //get values from user
        foreach ($required as $fieldName=>$_)
        {
            $values[$fieldName] = $_POST[$fieldName];
        }
        
        //alter fields
        $values['email'] = strtolower($values['email']);

        if(areRequiredFieldsProvided($values, $required, $errors))
        {
            //check for matching email password pair
            $info = checkAccount($values['email'], $values['password']); 

            if ($info === NULL)    // if user is not valid
            {
                $errors['form'] = "Email and password do not match";
            }
            else    //if user is valid
            {
                if ($info['account_status'] === 'valid')
                {
                    signin($info['user_id']);    //signin user
                    if (isset($_POST['redirect']))
                    {
                       header('Location: '.$_POST['redirect']);  //redirect to requested page
    
                    }
                    else{
                       header('Location: index.php');  //redirect to homepage
                    }
                }
                else
                {
                    $errors['form'] = 'Your account is ' . $info['account_status'];
                }
                
            }
        }

       
    }
   




?>