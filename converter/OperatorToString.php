<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 30/04/2017
 * Time: 19.39
 */

function getOperatorSymbol($operator)
{
    if (isset($operator))
    {

        switch ($operator)
        {
            case "add":
                $operatorSym = "+";
                break;
            case "subtract":
                $operatorSym = "-";
                break;
            case "multiply":
                $operatorSym = "*";
                break;
            case "divide":
                $operatorSym = "/";
                break;
        }
    } else
    {
        $operatorSym = "";
    }
    return $operatorSym;
}