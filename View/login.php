<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="../jquery.js"></script>
        <script src="js/app.js"></script>
    </head>
    <body>
        <form name="login" action="../Controller/userLogin.php" method="POST">
            <h2>Log in</h2>
            Email:
            <input type="email" name="email" placeholer="email" required />
            Password:
            <input type="password" name="password" placeholder="Hasło" required />

            <input type="submit" value="Login">
            
            <div>
                <a href="./registerForm.php"> Register yourself</a>
            </div>
            
    </body>
</html>
