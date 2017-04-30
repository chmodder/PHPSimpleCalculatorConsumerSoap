<?php
include '../converter/OperatorToString.php';

/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 27/04/2017
 * Time: 20.39
 */


$num1 = $_GET["number1"];
$num2 = $_GET["number2"];
$operator = $_GET["operator"];

//Make parameters ready for SOAP method call
$parametersToSoap = array('num1' => $num1, 'num2' => $num2);

//Soap

$client = new SoapClient("http://dalvang-wcfservicecalculator2.azurewebsites.net/Service1.svc?wsdl");


if (isset($operator))
{
    switch ($operator)
    {
        case "subtract":
            $resultWrapped = $client->Subtract($parametersToSoap);//Subtract is the name of the method in the service
            //SubtractResult is the name of the return variable.
            //Can be found by looking at the response body in XML format in the WCF Test tool,
            //when invoking the method in the service
            $result = $resultWrapped->SubtractResult;
            break;
        case "add":
            $resultWrapped = $client->Add($parametersToSoap);
            //SubtractResult is the name of the return variable.
            //Can be found by looking at the response body in XML format in the WCF Test tool,
            //when invoking the method in the service
            $result = $resultWrapped->AddResult;
            break;
        case "multiply":
            $resultWrapped = $client->Multiply($parametersToSoap);
            //SubtractResult is the name of the return variable.
            //Can be found by looking at the response body in XML format in the WCF Test tool,
            //when invoking the method in the service
            $result = $resultWrapped->MultiplyResult;
            break;
        case "divide":
            $resultWrapped = $client->Divide($parametersToSoap);
            //SubtractResult is the name of the return variable.
            //Can be found by looking at the response body in XML format in the WCF Test tool,
            //when invoking the method in the service
            $result = $resultWrapped->DivideResult;
            break;
    }
}
//Soap end

$operatorSymbol = getOperatorSymbol($operator);

require_once '../vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../view');
$twig = new Twig_Environment($loader, array(
    //'cache' => '/path/to/compilation_cache',
    'auto_reload' => true));

$template = $twig->loadTemplate('calculatorView.html.twig');

$parametersToTwig = array("number1" => $num1, "number2" => $num2, "operator" => $operatorSymbol, "result" => $result);
echo $template->render($parametersToTwig);

//Some useful SOAP methods
//The result is returned in a special format
//var_dump($resultWrapped);

//Get list of methods in the service
//var_dump($client->__getFunctions());
