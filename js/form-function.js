

	var totalTime = 0;
	var $date = $( '#date' );
	var $time;
	var sel = document.getElementById('available-times');

	function init(){
		$time = $('.time > span');
		$( 'input[type=checkbox]' ).on( 'change', function(){
			var $this = $( this );
			document.getElementById('available-times').options.length = 0;
			if( $this.prop( 'checked' ) ){
				totalTime += $this.data( 'time' );
			}else{
				totalTime -= $this.data( 'time' );
			}

			$time.text( totalTime );

			$.post( 'appt-form.php', { day: date.value, time: totalTime }, function( result ){
				$.each(result, function(i, value){
					$('#available-times').append($('<option>').text(value).attr('value', value));
				});
			}, 'json');


		} );
	}

	$(init);


	$('#date').change( function(){
		var day = this.value;
			document.getElementById('available-times').options.length = 0;
			$.post( 'appt-form.php', { day: day, time: totalTime }, function( result ){
				$.each(result, function(i, value){
					$('#available-times').append($('<option>').text(value).attr('value', value));
				});
			}, 'json');
		});

	// function submit(){
	// 	var appointmentType = $('input[type=checkbox]:checked').map(function(){
	// 		return this.name;
	// 	}).get();
	// 	var duration = ($drivingTime/60) + totalTime;
	// 	var name = document.getElementById('name');
	// 	$.post( 'appt-submit.php', { time: sel.value, type: appointmentType, duration: duration, customer:   } )

	// }