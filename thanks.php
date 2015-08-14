<?php 

	error_reporting( E_ALL );
	ini_set( 'display_errors', 1 );

	require_once( "buy.php" );
	require_once( "classes/concertClass.php" );
	include( "views/header.php" );

	$id = $_GET['id'];
	$name = $_POST['name'];
	$userId = $_POST['userId'];
	$email = $_POST['email'];
	$ticket = $_POST['entradas'];
	

	$concert = new drawConcertTable();

	$concertAll = $concert->eventInfo($id);
	$print = ($concertAll[0]['precioConcierto']);

	//Get the quantity of tickets in the table ENTRADA
	$itemsQuant = $concert->countTicketsItems( $id )->count;
	
	for ( $i=0; $i < $ticket; $i++ ) { 
		$insertTicket = $concert->insertEntrada( $itemsQuant + $i, $_GET['id'] );
	}

	$expectator = $concert->insertEspectador( $userId, $name, $email, $ticket, $_GET['id'] );

	echo'
		<div class="col-md-6 event-info">
		<p>El total a pagar por las '.$ticket.' entradas es de: &#8353 '.( $print * $ticket ).'.</p> 
			<p>Gracias por su compra</p>
		</div>
	';
	
	include( "views/footer.php" );
?>