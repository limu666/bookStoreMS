<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 传 -->
    <?php

        switch ($a){
            case 'a':
                echo "somefunction()";
                break ;
            case 'b':
                echo "anotherfunction()";
                break ;
            case 'c':
                echo "dosomefunction()";
                break ;
            default:
                echo"donothing()";
        }
    ?>
</body>
</html>