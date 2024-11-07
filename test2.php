<?php
session_start();

$successMessage = isset($_SESSION['success']) ? $_SESSION['success'] : '';
$failMessage = isset($_SESSION['fail']) ? $_SESSION['fail'] : '';
$uhohMessage = isset($_SESSION['uhoh']) ? $_SESSION['uhoh'] : '';
unset($_SESSION['success']);
unset($_SESSION['fail']);
unset($_SESSION['uhoh']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            user-select: none;
        }

        .box {
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .msg {
            background-color: #008000;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 5rem;
            color: white;
            width: 30%;
            height: 230px;
            animation: fadein 1s forwards;
        }

        .fail {
            background-color: red;
        }

        .uhoh {
            background-color: grey;
            color: black;
        }

        .hide {
            display: none;
        }

        @keyframes fadein {
            from {
                opacity: 0;
                transform: translate(-200px);
            }

            to {
                opacity: 1;
                transform: translateX(0px);
            }
        }
    </style>
</head>

<body>
    <div class="box">
        <div class="<?php echo $uhohMessage ? 'msg uhoh' : 'hide'; ?>">
            <?php echo $uhohMessage; ?>
        </div>
        <div class="<?php echo $successMessage ? 'msg' : 'hide'; ?>">
            <?php echo $successMessage; ?>
        </div>
        <div class="<?php echo $failMessage ? 'msg fail' : 'hide'; ?>">
            <?php echo $failMessage; ?>
        </div>
    </div>
</body>

</html>