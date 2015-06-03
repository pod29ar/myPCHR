<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
</head>
<body onload="show();">
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div>Time: <span id="time"></span></div>
			<input type="button" value="start" onclick="start();">
			<input type="button" value="stop" onclick="stop();">
			<input type="button" value="reset" onclick="reset()">
		</div>
	</nav>

	<iframe src="<?php echo base_url();?>main" style="width:100%; height:100%;"></iframe>

	<script type="text/javascript">
	//	Simple example of using private variables
	//
	//	To start the stopwatch:
	//		obj.start();
	//
	//	To get the duration in milliseconds without pausing / resuming:
	//		var	x = obj.time();
	//
	//	To pause the stopwatch:
	//		var	x = obj.stop();	// Result is duration in milliseconds
	//
	//	To resume a paused stopwatch
	//		var	x = obj.start();	// Result is duration in milliseconds
	//
	//	To reset a paused stopwatch
	//		obj.stop();
	//
	var	clsStopwatch = function() {
			// Private vars
			var	startAt	= 0;	// Time of last start / resume. (0 if not running)
			var	lapTime	= 0;	// Time on the clock when last stopped in milliseconds

			var	now	= function() {
					return (new Date()).getTime(); 
				}; 
	 
			// Public methods
			// Start or resume
			this.start = function() {
					startAt	= startAt ? startAt : now();
				};

			// Stop or pause
			this.stop = function() {
					// If running, update elapsed time otherwise keep it
					lapTime	= startAt ? lapTime + now() - startAt : lapTime;
					startAt	= 0; // Paused
				};

			// Reset
			this.reset = function() {
					lapTime = startAt = 0;
				};

			// Duration
			this.time = function() {
					return lapTime + (startAt ? now() - startAt : 0); 
				};
		};

	var x = new clsStopwatch();
	var $time;
	var clocktimer;

	function pad(num, size) {
		var s = "0000" + num;
		return s.substr(s.length - size);
	}

	function formatTime(time) {
		var h = m = s = ms = 0;
		var newTime = '';

		h = Math.floor( time / (60 * 60 * 1000) );
		time = time % (60 * 60 * 1000);
		m = Math.floor( time / (60 * 1000) );
		time = time % (60 * 1000);
		s = Math.floor( time / 1000 );
		ms = time % 1000;

		newTime = pad(h, 2) + ':' + pad(m, 2) + ':' + pad(s, 2) + ':' + pad(ms, 3);
		return newTime;
	}

	function show() {
		$time = document.getElementById('time');
		update();
	}

	function update() {
		$time.innerHTML = formatTime(x.time());
	}

	function start() {
		clocktimer = setInterval("update()", 1);
		x.start();
	}

	function stop() {
		x.stop();
		clearInterval(clocktimer);
	}

	function reset() {
		stop();
		x.reset();
		update();
	}
	</script>
</body>
</html>