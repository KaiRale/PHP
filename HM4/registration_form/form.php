<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/form.css" rel="stylesheet">
    <link href="css/valid.css" rel="stylesheet">
</head>

<body>

<div class="forForm">
    <form name="someForm" method="post" action="page1.php">
        <div class="textArea">
            <input class="validate" type="email" name="email" placeholder="email">
            <input class="validate" type="password" name="password" placeholder="password">
            <input class="validate" type="text" name="name" placeholder="name">
        </div>

        <div>
            <input class="date" type="date" name="birthdate" placeholder="birthdate">
        </div>

        <div class="gender">
             <label>Male<input class="check" type="checkbox" name="gender" value="Male"></label>
             <label>Female<input class="check" type="checkbox" name="gender" value="Female"></label>
        </div>

        <select class="country" name="country">
            <option value="1">Russia</option>
            <option value="2">Belgium</option>
            <option value="3">Spain</option>
            <option value="4">Italy</option>
            <option value="5">Brazilian</option>
        </select>


        <div class="submit">
            <div id="errors"></div>
            <input type="submit" value="Submit" name="formSub">
        </div>

    </form>
</div>

</body>

<script src="formValid.js"></script>

</html>
