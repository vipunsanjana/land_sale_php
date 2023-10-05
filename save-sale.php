<?php

    session_start();
    require_once("php/includes/dbFunctions.php");
    require_once("php/includes/validateFunctions.php");

    //array to store mandatoriness of each field of form
    $required = array(
        "action"=> True,
        "sale_id"=>True
    );

    $values = array();  //array to store values from form
    $errors = array();  //array to store errors relevent to each field

    foreach ($required as $fieldName=>$_)   //initialize arrays with empty values
    {
        $values[$fieldName] = '';
        $errors[$fieldName] = '';
    }

    $errors['form'] = ''; // variable to store form errors

    if(isset($_POST['action'])) //check for a post method
    {
        //get values from user
        foreach ($values as $fieldName=>$value)
        {
            $values[$fieldName] = $_POST[$fieldName];
        }

        $isValid = True;    //variable to store if the form details are valid

        //check if all required fields are provided
        if(areRequiredFieldsProvided($values, $required, $errors))
        {
            //check if numeric values are correct
            if(validateNumericValues($values, $errors, array('sale_id')))
            {
                //check if action is valid
                if ($values['action'] == 'save' or $values['action'] == 'unsave')
                {
                    //add to database
                    $values['user_id'] = $_SESSION['user_id'];
                    if(!saveSale($values))
                    {
                        //if adding to database failed add an error
                        $isValid = False;
                        $errors['form'] = 'failed the action';
                    }
                }
                else
                {
                    $isValid = False;
                    $errors['action'] = 'incorrect action';
                }
            }
            else
            {
                $isValid = False;
            }
        }
        else 
        {
            $isValid = False;
        }

        $toSend = array(); //array to send as result

        if ($isValid) $toSend['success'] = True;
        else $toSend['success'] = False;

        $toSend['errors'] = $errors;
        
        echo json_encode($toSend);  //send the results in json format
    }

?>