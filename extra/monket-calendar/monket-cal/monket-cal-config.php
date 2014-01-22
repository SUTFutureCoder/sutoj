<?php

	// URL of monket-cal
	define('SITE_DIR', '/monket-calendar/monket-cal/');

	// Filesystem location of your .ics calendars
	define('CALENDAR_DIR', '/var/www/monket-calendar/monket-cal/calendars/');

	// URL of monket-cal-source
	define('MONKET_BASE', '/monket-calendar/monket-cal-source/');

	// Filesyatem location of monket source
	define('MONKET_SOURCE', '/var/www/monket-calendar/monket-cal-source/');

	define('DEFAULT_CALENDAR', 'Home');

	// Calendars to Import from the web (won't be editable)
	$MonketWebCals[] = 'http://ical.mac.com/ical/UK32Holidays.ics';
	$MonketWebCals[] = 'http://www.monket.net/cal/Instructions.ics';
	// Add more as needed

?>
