<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['get'])) {
        $number = $_POST['number'];
        if ($number == 0) {
            $_SESSION['uhoh'] = 'Uh oh!';
        } elseif ($number % 2 == 0) {
            $_SESSION['success'] = 'Approved!';
        } else {
            $_SESSION['fail'] = 'That\'s very ODD!';
        }
        header('Location: test2.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Alert!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-size: 2rem;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            gap: 20px;
        }
        form label abbr {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <form method="POST">
        <label for="number">
            <abbr title="Enter a number you will be responded according to the number.">
                Enter a number:
            </abbr>
        </label>
        <input type="number" name="number" required>
        <button type="submit" value="get" name="get">Submit</button>
    </form>
</body>

</html>