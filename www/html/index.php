<?php
    $pdo =  new PDO('mysql:dbname=php;host=127.0.0.1;unix_socket=/tmp/mysql.sock','root','secret');

    if(isset($_POST['submit'])){
        $content = $_POST['content_name'];

        $sql = "INSERT INTO doing (content) VALUES ('$content')";
        $insert = $pdo->query($sql);
    }


    $sql = 'SELECT content FROM doing';
    $results = $pdo->query($sql);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <Title>ToDoリスト</Title>
    </head>
    <body>
        <h1>ToDoリスト</h1>
        <form action="index.php" method="post">
            <ul>
                <li><span>やること</span><input type="text" name="content_name">
                <span><input type="submit" name="submit"></span></li>
            </ul>
        <ul>
            <ul>
                <?php
                    foreach($results as $result){
                        echo "<li>";
                        echo $result['content'];
                        echo "</li>";
                    };
                ?>
            </ul>
        </ul>
    </body>
</html>