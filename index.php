<?php
// Curtis Lee
// Curtis@Curtis.tw
// May 8th, 2024

// SMTP Configs and Functions
require_once(__DIR__.'/func_sendemail_sample.php');

// Email Configs
$email_sender_email    = "學號@nsysu.edu.tw";
$email_sender_name     = "寄件者姓名";
$email_recipient_email = "收件者信箱";
$email_recipient_name  = "收件者姓名";
$email_subject      = "Test Email";
$email_body         = "This is a test email.<br/>Thank you!";

$msg = '';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $status_email = sendemail_sample($email_sender_email, $email_sender_name, $email_recipient_email, $email_recipient_name, $email_subject, $email_body);
    $msg = '<h2>Email寄送狀態：</h2><p>'.$status_email.'</p>';
}

?>

<html>

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=1, minimum-scale=1.0, maximum-scale=3.0">
    <title>寄送Email範例</title>
    <link href="style.css" rel="stylesheet">
</head>

<body style="padding: 3em 8%;">
    <h1 style="color:#D93025;">Email 寄送範例<br />(づ｡◕‿‿◕｡)づ</h1>
    <p>&copy;&nbsp;CansCurtis</p>

    <?= $msg; ?>

    <h2>目前設定值【SMTP】<small>(func_sendemail_sample.php)</small></h2>
    <div>
        <table class="mailer_setting">
            <tr>
                <td>Host</td>
                <td><?= $smtp_host; ?></td>
            </tr>
            <tr>
                <td>Port</td>
                <td><?= $smtp_port; ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?= $smtp_username; ?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?= $smtp_password; ?></td>
            </tr>
        </table>
    </div>

    <h2>目前設定值【EMAIL】<small>(index.php)</small></h2>
    <div>
        <table class="mailer_setting">
            <tr>
                <td>sender_email</td>
                <td><?= $email_sender_email; ?></td>
            </tr>
            <tr>
                <td>sender_name</td>
                <td><?= $email_sender_name; ?></td>
            </tr>
            <tr>
                <td>recipient_email</td>
                <td><?= $email_recipient_email; ?></td>
            </tr>
            <tr>
                <td>recipient_name</td>
                <td><?= $email_recipient_name; ?></td>
            </tr>
            <tr>
                <td>subject</td>
                <td><?= $email_subject; ?></td>
            </tr>
            <tr>
                <td>body</td>
                <td><?= $email_body; ?></td>
            </tr>
        </table>
    </div>

    <form action="" method="POST" class="form_send_email">
        <button class="btn_send_email" type="submit">寄送 Email</button>
    </form>
</body>

</html>