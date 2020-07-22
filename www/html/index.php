<?php
    $pdo =  new PDO('mysql:dbname=php;host=db;unix_socket=/run/mysqld/mysqld.sock','root','secret');

    if(isset($_POST['submit'])){
        $content = $_POST['content'];

        $sql = "INSERT INTO todo VALUES ('$content')";
        $insert = $pdo->query($sql);
    }


    $sql = 'SELECT content FROM todo';
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
                <li><span>やること</span><input type="text" name="content">
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