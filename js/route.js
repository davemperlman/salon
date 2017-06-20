
	var $drivingTime;
		var directionsDisplay = new google.maps.DirectionsRenderer;
	    var directionsService = new google.maps.DirectionsService;
	function initMap() {
	  var directionsDisplay = new google.maps.DirectionsRenderer;
	  var directionsService = new google.maps.DirectionsService;

	  directionsDisplay.setPanel(document.getElementById('right-panel'));

	  var onChangeHandler = function() {
	    calculateAndDisplayRoute(directionsService, directionsDisplay);
	  };
	  document.getElementById('start').addEventListener('change', onChangeHandler);
	  document.getElementById('end').addEventListener('change', onChangeHandler);
	  calculateAndDisplayRoute(directionsService, directionsDisplay);
	}

	function calculateAndDisplayRoute(directionsService, directionsDisplay) {
	  //var start = document.getElementById('start').value;
	  //var end = document.getElementById('end').value;
	  var start = 'auburn, maine';
	  var end = 'lewiston, maine';
	  directionsService.route({
	    origin: start,
	    destination: end,
	    travelMode: google.maps.TravelMode.DRIVING
	  }, function(response, status) {
	    if (status === google.maps.DirectionsStatus.OK) {
	      //directionsDisplay.setDirections(response);
	      console.log(directionsDisplay);
	      $drivingTime = directionsDisplay.directions.routes[0].legs[0].duration.value;
	      return $drivingTime;
	    } else {
	      //window.alert('Directions request failed due to ' + status);
	    }
  });
}
google.maps.event.addDomListener(window, "load", initMap);
