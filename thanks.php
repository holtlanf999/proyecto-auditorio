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

	//Get the quantity of tickets in the table ENTRADA
	$itemsQuant = $concert->countTicketsItems($_GET['id'])->count;
	echo $itemsQuant;

	for ($i=0; $i < $ticket; $i++) { 
		$insertTicket = $concert->insertEntrada($itemsQuant + $i, $_GET['id']);
	}
	
	$expectator = $concert->insertEspectador($userId, $name, $email, $ticket, $_GET['id']);
	
	include("views/footer.php");
?>