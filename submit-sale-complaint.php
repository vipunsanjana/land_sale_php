<?php

    session_start();
    require_once("php/includes/dbFunctions.php");
    require_once("php/includes/validateFunctions.php");

    //array to store mandatoriness of each field of form
    $required = array(
        "complaint_type"=> True,
        "description"=>False,
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

    if(isset($_POST['complaint_type'])) //check for a post method
    {
        //get values from user
        foreach ($values as $fieldName=>$value)
        {
            $values[$fieldName] = $_POST[$fieldName];
        }

        $isValid = True;    //variable to store if the form details are valid

        if(areRequiredFieldsProvided($values, $required, $errors))
        {
            if(validateNumericValues($values, $errors, array('sale_id')))
            {
                //validate complaint type
                if(!($values['complaint_type'] == 'false advertisement' or  $values['complaint_type'] == 'spam and abuse' or  $values['complaint_type'] == 'false information' or  $values['complaint_type'] == 'transaction denial'))
                {
                    $isValid = False;
                    $errors['complaint_type'] = 'invalid reason';
                }
                
                //validate description
                if(strlen($values['description']) > 500)
                {
                    $isValid = False;
                    $errors['description'] = 'description should be less than 500 characters';
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

        if ($isValid)   //if valid add to database
        {
            $result = addSaleComplaint($values, $_SESSION['user_id']);
            if(!$result) 
            {
                $isValid = False;
                $errors['form'] = 'failed to submit the complaint';
            }
        }

        $toSend = array(); //array to send as result

        if ($isValid) $toSend['success'] = True;
        else $toSend['success'] = False;

        $toSend['errors'] = $errors;
        
        echo json_encode($toSend);  //send the results in json format
    }

?>