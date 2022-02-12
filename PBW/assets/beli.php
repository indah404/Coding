<?php

    $jum = $_POST['jumlah'];
    $id = $_POST['id'];

    $servername = "localhost";
	$username = "root";
	$password = "";
	$db = "pbw";

	$conn = new mysqli($servername, $username, $password, $db);
	if ($conn->connect_error){
	    die("Connection failed: ". $conn->connect_error);
    }
    $sql = "UPDATE barang SET stock = Stock - ".$jum." WHERE id= ".$id;
    $hasil = $conn->query($sql);
    header("location: index.php");

    ?>