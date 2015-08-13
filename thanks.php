<?php 

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	require_once("buy.php");
	require_once("classes/concertClass.php");
	include("views/header.php");

	$name = $_POST['name'];
	$userId = $_POST['userId'];
	$email = $_POST['email'];
	$ticket = $_POST['entradas'];

	$concert = new drawConcertTable();
	$itemsQuant = $concert->countTicketsItems($_GET['id'])->count;

	echo $itemsQuant;
	$insertTicket = $concert->insertEntrada($idEntrada, $_GET['id']);
	echo $ticket;
	
	include("views/footer.php");
?>