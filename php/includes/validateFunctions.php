<?php

    
    //check for empty values in the array, assign null and add errors
    function areRequiredFieldsProvided(&$values, $required, &$errors) 
    {
        $isProvided = True;

        foreach ($required as $fieldName=>$isRequired)
        {
            if (($values[$fieldName] === "" or $values[$fieldName] === NULL or $values[$fieldName] === array()))
            {
                $values[$fieldName] = NULL; //assign null to empty values

                //check if any mandatory field is missing and add errors
                if ($isRequired) 
                {
                    $isProvided = False;

                    $errors[$fieldName] = 'This field is required';
                }
            }
            
        }
        return $isProvided;  
    }

    //check if provided numerica values are valid and if valid convert data type to numeric types
    function validateNumericValues(&$values, &$errors, $fieldNames)    
    {
        $isValid = True;
        foreach($fieldNames as $fieldName)
        {
            if (!is_null($values[$fieldName]))
            {
                if (!is_numeric($values[$fieldName]))
                {
                    $isValid = False;
                    $errors[$fieldName] = 'invalid numeric value';
                }
                else
                {
                    $values[$fieldName] = $values[$fieldName] + 0; //convert to int or float data type
                }
            }
        }

        return $isValid;
    }
?>