<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 27/04/2017
 * Time: 20.39
 */

include '../model/myCalculator.php';

$num1 = $_GET["number1"];
$num2 = $_GET["number2"];
$operator = $_GET["operator"];
$result = calculateNumbers($num1, $num2, $operator);

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