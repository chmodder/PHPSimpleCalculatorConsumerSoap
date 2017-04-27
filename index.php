<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="controller/calculatorController.php" method="get">
    <label for="number1">Number 1: </label>
    <input type="number" name="number1"><br>
    <label for="number2">Number 2: </label>
    <input type="number" name="number2"><br>

    <label for="operator">Math operation</label>
    <select name="operator">
        <option value="add" selected>+</option>
        <option value="subtract">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
    </select>

    <input type="submit" value="calculate">
</form>

</body>
</html>