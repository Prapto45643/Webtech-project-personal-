<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="reg_control_admin.php" method="POST">
    <fieldset>
        <h1 style="text-align: center;">WELCOME TO BOOK HAVEN</h1>
        <h1 style="text-align: Center;">Register as ADMIN</h1>
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="u_name"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td>:</td>
                <td><input type="password" name="confirm_pass"></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>:</td>
                <td><input type="email" name="mail"></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td><input type="text" name="ph_num"></td>
            </tr>
            <tr>
                <td>Bank Account Number</td>
                <td>:</td>
                <td><input type="text" name="b_number"></td>
            </tr>
            <tr>
                <td><br><label for="dob">Date Of Birth</label></td>
                <td>:</td>
                <td><input type="date" id="dob" name="dob"></br></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td><input type="radio" value="Male" name="GD" >Male <input type="radio" value="Female" name="GD" >Female</td>
            </tr>

        </table>
        <div class="button-container">
            <input type="submit" name="submit" value="Submit">
            <input type="reset" name="reset" value="Reset">
        </div>
    </fieldset>
    </form>
</body>
</html>