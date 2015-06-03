$(document).ready(function() {
	var tracker = $('.tracker'),
		step = tracker.find('.gps-step'),
		time = tracker.find('.gps-time'),
		point = tracker.find('.tracker-point'),
		stepCounter = 1;

	setInterval(function() {
		trackerStatus();
	}, 1000*5);

	function trackerStatus() {
		var active = point.children('.active'),
			stepText, timeText;
		if (active) {
			active.removeClass('active').addClass('done');
			active.next().addClass('active');
		}

		++stepCounter;

		switch (stepCounter) {
			case 2:
				stepText = 'BEING PREPARED';
				timeText = '25';
				break;
			case 3:
				stepText = 'BEING BAKED';
				timeText = '22';
				break;
			case 4:
				stepText = 'BOXED';
				timeText = '16';
				break;
			case 5:
				stepText = 'PACKED';
				timeText = '14';
				break;
			case 6:
				stepText = 'READY';
				timeText = '11';
				break;
			case 7:
				stepText = 'BEING DELIVERED';
				timeText = '9';
				break;
			default:
				stepText = 'PLACED';
				timeText = '30';
		}
		step.text(stepText);
		time.text(timeText);
	}
});