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
<style>
    body {
        background: #F45B5B;
    }

    .container-fluid {
        overflow: auto;
        margin-top: 100px;
        background-color: #ffffffdc;
        backdrop-filter: blur(10px);
        width: 75%;
        height: 400px;
        /* margin: 7em auto; */
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }

    .input-group {
        /* align-items: flex-end; */
        /* margin: 40% 10px 10px 10px; */
        width: 75%;
        margin: 0 auto;
    }

    .btn-sm {
        /* width: 100%; */
        height: 100%;
    }

    .col-sm-6 {
        width: 100%;

    }
</style>

<body>
    <!-- chat view start -->
    <a class=" navbar-brand" href="dashboard">SAFEBUY</a>

    <form action="customerSendMessage" method="post" id="chat">
        <div class="container-fluid p-5">
            <div class="row">
                <div class="col-sm-6">
                    <div class="col-sm-12">
                        <?php
                        foreach ($this->chatLog->getMessageList() as $chat) {
                            if ($chat->getStatus() == 0) {
                                echo '<p class="text-end">' . $chat->getMessage() . '</p>';
                            } else if ($chat->getSeenStatCus() == 0) {
                                echo '<p><b>' . $chat->getMessage() . '</b></p>';
                            } else {
                                echo '<p>' . $chat->getMessage() . '</p>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>




        </div>
        <div class="panel-footer">
            <div class="input-group">
                <input name="msg" id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary btn-sm" id="send">Send</button>
                </span>
            </div>
        </div>
    </form>

    <!-- chat view end -->

    <!-- <form action="customerSendMessage" method="post">
        <label for="message">Message </label>
        <input type="text" name="message" id="message">
        <input type="submit" name="sendBtn" value="Click Here">
    </form> -->

</body>

</html>