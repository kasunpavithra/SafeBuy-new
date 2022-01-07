<?php
$messageList = $this->messageList;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php



    foreach ($messageList as $message) {
        echo $message->getMessage() . " " . $message->getStatus() . " " . $message->getTime();
        echo "<br>";
    }


    ?>
    <form action="customerSendMessage" method="post">
        <label for="message">Message </label>
        <input type="text" name="message" id="message">
        <input type="submit" name="sendBtn" value="Click Here">
    </form>

</body>

</html>