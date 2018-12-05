<?php
	
	if (session_status() == PHP_SESSION_NONE) { session_start(); }
	require '../settings/functions.php';
	iConnected();

	require_once '../settings/database.php';
	
    $password = "Howareyou%1";
    
	$password = password_hash($psw, PASSWORD_BCRYPT);
	$req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1167', 'Jack', 'jack@gmail.com', $password, 0, 'Jucy', 19, 'M', 'F', 'I love programming, gaming, and flying racing drones. I also made this website.',
    '../img/user/1167/profile.jpg', 'Programming', 'Gaming', 'RacingDrones', 4, 'Tembisa', 0.0009333, 0.1113667, '2018-02-03 16:57:05', 0]))
        echo "<span style=\"color: green;\">Jack is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\n  Jack is not captured </span><br/>";    

	$req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1074', 'Jane', 'jane@gmail.com', $password, 0, 'Pupple', 18, 'F', 'M', 'We are all stories at the end, just make it a good ones.',
    '../img/user/1074/profile.jpg', 'Reading', 'Gaming', 'Music', 12, 'Soweto', 0.1333, 0.0003667, '2018-11-21 16:01:25', 0]))
        echo "<span style=\"color: green;\">Jane is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\n  Jane is not captured </span><br/>";  

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1075', 'Jackie', 'jackie@gmail.com', $password, 0, 'Mommie', 26, 'F', 'M', 'Believer',
    '../img/user/1075/profile.jpg', 'Mystery', 'Pop corn', 'Fun', 3, 'Hillbrow', 0.00655, 0.1017, '2018-11-21 07:57:05', 0]))
        echo "<span style=\"color: green;\">Jackie is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\n  Jackie is not captured </span><br/>"; 

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1076', 'Sandra', 'sandra@gmail.com', $password, 0, 'Blue', 24, 'F', 'M', 'Business woman',
    '../img/user/1076/profile.jpg', 'Adventure', 'Education', 'Market', 9, 'Pretoria', 0.00155, 0.103667, '2018-11-21 08:37:55', 0]))
        echo "<span style=\"color: green;\">Sandra is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\nSandra is not captured </span><br/>"; 

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1077', 'Jacob', 'Jacob@gmail.com', $password, 0, 'Dick-can', 24, 'M', 'F', 'Software engineer',
    '../img/user/1077/profile.jpg', 'AI', 'Bitcoin', 'Tha Carter V', 7, 'Turfloop', 0.00655, 0.113667, '2018-11-19 18:31:50', 0]))
        echo "<span style=\"color: green;\">Jacob is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\nJacob is not captured </span><br/>"; 


    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1078', 'Tim', 'tim@gmail.com', $password, 0, 'Pappa', 34, 'M', 'M-F', 'Romance is art',
    '../img/user/1078/profile.jpg', 'Food', 'Tv', 'soccer', 2, 'packtown', 0.155, 0.003667, '2018-10-30 09:07:05', 0]))
        echo "<span style=\"color: green;\">Tim is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\n  Tim is not captured </span><br/>"; 

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1079', 'Lucy', 'Lucy@gmail.com', $password, 0, 'Princess', 29, 'F', 'M', 'Lawyer',
    '../img/user/1079/profile.jpg', 'News', 'Trends', 'Truth', 7, 'Midrand', 0.0055, 0.03, '2018-11-21 08:37:55', 0]))
        echo "<span style=\"color: green;\">Lucy is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\nLucy is not captured </span><br/>"; 

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1080', 'Chris', 'chris@gmail.com', $password, 0, 'Mascout', 30, 'M', 'F', 'Rosses are red Grasses are green and I am blue',
    '../img/user/1080/profile.jpg', 'TV', 'Foot', 'Cars', 18, 'Alexandra', 0.102, 0.11, '2018-11-03 12:17:09', 0]))
        echo "<span style=\"color: green;\">Chris is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\n  Chris is not captured </span><br/>"; 

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1081', 'Mary', 'mary@gmail.com', $password, 0, 'Big lips', 24, 'F', 'M', 'Laughter laughter laughter',
    '../img/user/1081/profile.jpg', 'trading', 'Gaming', 'hockey', 23, 'Bryston', 0.0133, 0.17, '2018-11-18 19:45:55', 0]))
        echo "<span style=\"color: green;\">Mary is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\n  mary is not captured </span><br/>"; 
        

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1090', 'Lucci', 'Lucci@gmail.com', $password, 0, 'Chocolate', 24, 'F', 'M', 'Librarian',
    '../img/user/1090/profile.jpg', 'YouTube', 'Spotify', 'Facebook', 45, 'Sandton', 0.133, 0.1101, '2018-11-18 19:45:55', 0]))
        echo "<span style=\"color: green;\">Lucci is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\nLucci is not captured </span><br/>";

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1091', 'Jess', 'Jess@gmail.com', $password, 0, 'Yellow', 31, 'F', 'M', 'Teacher',
    '../img/user/1091/profile.jpg', 'Commedy', 'Church', 'Family', 54, 'Soweto', 0.019, 0.1, '2018-11-30 19:45:55', 0]))
        echo "<span style=\"color: green;\">Jess is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\nJess is not captured </span><br/>";

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1092', 'Chloe', 'Chloe@gmail.com', $password, 0, 'Spark', 42, 'F', 'M', 'Presenter',
    '../img/user/1092/profile.jpg', 'YouTube', 'Netball', 'Twitter', 7, 'Benoni', 0.0189, 0.001, '2018-12-01 09:45:55', 0]))
        echo "<span style=\"color: green;\">Chloe is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\nChloe is not captured </span><br/>";

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1093', 'Maxi', 'Maxi@gmail.com', $password, 0, 'Water', 31, 'F', 'M-F', 'Hair Dresser',
    '../img/user/1093/profile.jpg', 'Fashion', 'Clubing', 'Shopping', 36, 'Auckland Park', 0.0333, 0.1101, '2018-11-18 19:45:55', 0]))
        echo "<span style=\"color: green;\">Maxi is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\nMaxi is not captured </span><br/>";

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1094', 'Lucky', 'Lucky@gmail.com', $password, 0, 'X_man', 25, 'M', 'M-F', 'Musician',
    '../img/user/1094/profile.jpg', 'Church', 'Music', 'Movies', 9, 'Melville', 0.133, 0.1101, '2018-11-29 22:45:55', 0]))
        echo "<span style=\"color: green;\">Lucky is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\nLucky is not captured </span><br/>";

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1095', 'Meg', 'Meg@gmail.com', $password, 0, 'Pup', 18, 'F', 'M', 'Student',
    '../img/user/1095/profile.jpg', 'YouTube', 'Movies', 'Facebook', 28, 'Ivory Park', 0.103, 0.1101, '2018-11-18 19:45:55', 0]))
        echo "<span style=\"color: green;\">Meg is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\nMeg is not captured </span><br/>";

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1096', 'Bob', 'Bob@gmail.com', $password, 0, 'Cok', 24, 'M', 'M', 'Bar tender',
    '../img/user/1096/profile.jpg', 'Commedy', 'Spotify', 'Music', 38, 'Katlehong', 0.0033, 0.1107, '2018-11-30 14:45:55', 0]))
        echo "<span style=\"color: green;\">Bob is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\nBob is not captured </span><br/>";

    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1097', 'Laurah', 'Laurah@gmail.com', $password, 0, 'Love-bird', 29, 'F', 'M', 'Reporter',
    '../img/user/1097/profile.jpg', 'Music', 'Sex', 'Cooking', 17, 'Braamfontein', 0.03, 0.01101, '2018-11-30 23:45:55', 0]))
        echo "<span style=\"color: green;\">Laurah is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\nLaurah is not captured </span><br/>";
        
    $req = $pdo->prepare('INSERT INTO users SET id = ?, username = ?, mail = ?, password = ?, verif = ?, name = ?, age = ?, gender = ?, orientation = ?, bio = ?,
    profile_img = ?, i1 = ?, i2 = ?, i3 = ?, popscore = ?, location = ?, lati = ?, longi = ?, lastonline = ?, reported = ?  ');
    if ($req->execute(['1098', 'Kevin', 'Kevin@gmail.com', $password, 0, 'Big-Dicci', 31, 'M', 'F', 'Librarian',
    '../img/user/1098/profile.jpg', 'Soccer', 'Food', 'Whatsapp', 21, 'Sandton', 0.12, 0.1101, '2018-12-01 19:01:55', 0]))
        echo "<span style=\"color: green;\">Kevin is captured successfully</span><br/> \n";
    else
        echo "<span style=\"color: red;\">Error:<br/><br/>\n...\nKevin is not captured </span><br/>";

?>