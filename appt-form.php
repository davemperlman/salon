<?php 
	header('Content-Type: application/json');
	date_default_timezone_set('America/New_York');
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=thuy', '', '');

	$data = $pdo->query("SELECT * FROM schedule WHERE day = '2017-06-15' ")->fetchAll(PDO::FETCH_ASSOC);

	


	// Time Selector Logic Goes Here

	$duration = $_POST['time'] ? $_POST['time'] : 0;

	$times = array();
	$notgoodtimes = array();

	// Array of hour of operation - $times
	for ( $i=8; $i <= 18; $i++ ) { 
		$times[] = "$i:00:00";
	}

	// Assigns times that occur between appointments to the $notgoodtimes array
	foreach ($data as $key => $record) {
		foreach ($times as $time => $val) {
			if ( strtotime($val) >= strtotime($record['time']) && strtotime($val) <= strtotime($record['end_time']) ) {
				$notgoodtimes[] = $val;
			}
		}
	}

	// Assigns times to the $notgoodtimes array if the time + duration overlaps the start of the next appointment
	for ($i=0; $i < count($data) ; $i++) { 
		foreach ($times as $time) {
			if ( date('h:i:s',strtotime("+$duration minutes", strtotime($time))) > $data[$i+1]['time']) {
				if (!$data[$i+1]) {
					break;
				}else{
					$notgoodtimes[] = $time;
					break;
				}
			}
		}
	}

	// Array of available times to book based on input - $final
	foreach ( $times as $time => $value ) {
		foreach ( $notgoodtimes as $notgoodtime ) {
			if ( $notgoodtime == $value ) {
				unset( $times[$time] );
			}
		}
	}
	// echo json_encode($data);
	echo json_encode($times);

 ?>


