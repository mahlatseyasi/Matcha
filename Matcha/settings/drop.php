<?php

try {
        $dbh = new PDO("mysql:host=localhost;dbname="."matcha", "root", "Mahlat73");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DROP DATABASE `matcha`";
        $dbh->exec($sql);
        echo "<span style=\"color: green;\">Database removed successfully</span><br />";
    } catch (PDOException $e) {
        echo "<span style=\"color: red;\">Error: ".$e->getMessage()." </span><br/>\n";
    }
?>
