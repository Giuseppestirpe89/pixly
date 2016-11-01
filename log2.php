<!DOCTYPE html>
<html>

<head>
    <title>Form Validation:Demo Preview</title>
<?php include('includes/head.php'); ?>

</head>

<body>
    <div id="form">
        <p id="head"></p>
        <!-- This segment displays the validation rule -->
        <h2>JavaScript Form Validation</h2>
        <!-- Form starts from here -->
        <form onsubmit='return formValidation()'>
            <label>Full Name:</label>
            <input id='firstname' type='text'>
            <p id="p1"></p>
            <!-- This segment displays the validation rule for name -->
            <label>Username(6-8 characters):</label>
            <input id='username' type='text'>
            <p id="p2"></p>
            <!-- This segment displays the validation rule for user name -->
            
            <!-- This segment displays the validation rule for zip -->
            <input id="submit" type='submit' value='Check Form'>
        </form>
    </div>
</body>

</html>
