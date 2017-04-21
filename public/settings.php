<?php
    function pdoConnect($db)
    {
        try {
            $pdo = new PDO(
                sprintf('mysql:host=%s;dbname=%s;port=%s;charset=%s',
                    'localhost',
                    $db,
                    '3306',
                    'utf8'
                ),
                'root',
                'root'
            );
        } catch (PDOException $e) {
            return "数据库连接错误";
        }
        return $pdo;
    }
?>
