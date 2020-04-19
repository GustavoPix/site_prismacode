<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato|Space+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ROUTE_WEBSITE; ?>/css/style.css">
    <script src="<?php echo ROUTE_WEBSITE; ?>/js/plugins/axios.js"></script>
    <title>Document</title>
</head>
<body class="login">
    <script>
        const GlobalConfigs = {
            host: "<?php echo ROUTE; ?>",
            hostApi: "<?php echo ROUTE_API; ?>"
        }    
        </script>
    <div>
        <h1>Login</h1>
        <input type="text" id="login_email" placeholder="email">
        <input type="password" id="login_password" placeholder="senha">
        <button class="button1" onclick="Login.login()">Entrar</button>
    </div>
</body>
</html>

<script src="<?php echo ROUTE_WEBSITE; ?>/js/Login.js"></script>