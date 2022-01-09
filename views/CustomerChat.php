<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <!-- chat view start -->
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-sm-6">
                <form action="customerSendMessage" method="post" id="chat">
                    <div class="col-sm-12">
                        <?php
                        foreach ($this->chatLog->getMessageList() as $chat) {
                            if ($chat->getStatus() == 0) {
                                echo '<p class="text-end">' . $chat->getMessage() . '</p>';
                            } else {
                                echo '<p>' . $chat->getMessage() . '</p>';
                            }
                        }
                        ?>
                        <div class="panel-footer">
                            <div class="input-group">
                                <input name="msg" id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary btn-sm" id="send">Send</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- chat view end -->

    <!-- <form action="customerSendMessage" method="post">
        <label for="message">Message </label>
        <input type="text" name="message" id="message">
        <input type="submit" name="sendBtn" value="Click Here">
    </form> -->

</body>

</html>