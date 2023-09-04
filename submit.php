<?php
session_start();

$id = time();
$star = $_SESSION['star'];
$message = htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8');

//mysql接続
$dsn = 'mysql:dbname=formdata;host=localhost';
$user = 'root';
$password = 'Hosi1998';
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    print('Error:' . $e->getMessage());
    die();
}
?>
<!DOCTYPE HTML>
<html lang="ja">

<head>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8">
    <title>投稿</title>
    <style media="screen">
        p {
            margin: 20px 0;
        }

        textarea {
            margin: auto;
            display: block;
            width: 100%;
            border-radius: 5px;
            font-size: 15px;
            margin-bottom: 3em;
        }

        .main_log {
            padding: 20px 30px;
        }

        #log_body {
            background-color: #fff6e2;
        }

        .log_button {
            width: 45%;
        }
    </style>
</head>

<body id="log_body">
    <?php
    // データの追加
    $sql = 'INSERT INTO formdata(id, star, message) VALUES("' . $id . '","' . $star . '","' . $message . '")';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    ?>
    <p align="center">投稿ありがとうございました。</p>
    <p align="center"><a href="detail.php?kind=<?php echo $kind; ?>" class="log_button" width="45%">店舗画面に戻る</a></p>

    <p align="center"><a href="input.php" class="log_button" width="45%">投稿画面に戻る</a></p>
</body>

</html>