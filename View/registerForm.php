        <h2>Register your account</h2>
        <form name="register" action="../Controller/userRegister.php" method="POST">
            Username:
            <input type="text" name="username" placeholder="Użytkownik" required />
            Password:
            <input type="password" name="password" placeholder="Hasło" required />
            Email:
            <input type="email" name="email" placeholer="email" required />
            <input type="submit" value="Zaloguj">
        </form>