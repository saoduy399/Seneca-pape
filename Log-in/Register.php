<?php
    include_once "Account.php";
    include_once "AccountManager.php";
    $accountManager = new AccountManager("account.json");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    fieldset{
        width:100px;
    }
</style>
<body>
<div>
    <form action="" method="post">
        <fieldset>
            <legend>Creat new account</legend>
            Account: <input type="text" name="account">
            Password: <input type="password" name="password">
            <button type="submit">Register</button>
        </fieldset>
    </form>
</div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $account = $_REQUEST["account"];
    $password = $_REQUEST["password"];

    $data = [
            "account"=>$account,
            "password"=>$password
    ];

    if ($accountManager->checkRegister($account)){
        $accountManager->add($data);
    } else {
        echo "This account has been register";
    }
    
    header("location:Log-in.php");
}
