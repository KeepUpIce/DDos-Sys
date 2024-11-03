<?php
session_start();
$servername = "localhost";
$username = "admin-ice";
$password = "ice-2024-11-3";
$dbname = "security-ice";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");//防止SQL注入
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error_message = "登录失败，用户名或密码错误。";
    }
}
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录</title>
    <link rel="stylesheet" href="styles.css"> 
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #0A1E2C; 
            color: #F0F0F0; 
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 2.5em;
            color: #00A2E8; 
            margin: 0;
        }
        form {
            background-color: #1C2B3A; 
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            margin: auto;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #00A2E8;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #2A394B; 
            color: #F0F0F0; 
        }
        input[type="submit"] {
            background-color: #00A2E8;
            color: #FFFFFF;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 10px; 
        }
        input[type="submit"]:hover {
            background-color: #0086C3; 
        }
        p {
            text-align: center;
        }
        a {
            color: #00A2E8;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .error {
            color: #FF4C4C; 
            text-align: center;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>面向DDoS防护的网络管理系统</h1>
</div>

<form method="post">
    <h2>登录</h2>
    <label for="username">用户名:</label>
    <input type="text" name="username" required>
    
    <label for="password">密码:</label>
    <input type="password" name="password" required>
    
    <input type="submit" value="登录">
    <?php if (isset($error_message)): ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php endif; ?>
</form>

</body>
</html>
