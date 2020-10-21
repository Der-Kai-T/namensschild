<?php
 
// Zeit in UNIX-Timestamp
	function TimeToUnix($input){
		@list ($date, $time)      = explode(' ', $input, 2);
		@list ($day, $mon, $year) = explode('.', $date);   
		
		$timestamp = strtotime("$year-$mon-$day $time");
		
		return $timestamp;
	}
	
	
// UNIX-Timestamp in dd.mm.yyyy hh:mm:ss
	function UnixToTime($input){
		$datum  = date("d.m.Y", $input);
		$zeit   = date("H:i:s", $input);
		
		$timestring = "$datum $zeit";
				
		return $timestring;
	}	
	
	function UnixToFileTime($input){
		$datum  = date("Y.m.d", $input);
		$zeit   = date("H.i.s", $input);
		
		$timestring = "$datum.$zeit";
				
		return $timestring;
	}	
// UNIX-Timestamp in  hh:mm
	function UnixToClock($input){
		$datum  = date("d.m.Y", $input);
		$zeit   = date("H:i", $input);
		
		$timestring = "$zeit";
				
		return $timestring;
	}	
		
// UNIX-Timestamp in dd.mm.yyyy
	function UnixToShortTime($input){
		$datum  = date("d.m.Y", $input);
			
		$timestring = "$datum";
				
		return $timestring;
	}	

// UNIX-Timestamp in dd.mm.yyyy
	function UnixToDate($input){
		$datum  = date("d.m.Y", $input);
			
		$timestring = "$datum";
				
		return $timestring;
	}	
// UNIX-Timestamp in YYYY
	function UnixToYear($input){
		$Jahr = date("Y", $input);

		
		return $Jahr;
	}	

// UNIX-Timestamp in mm.yyyy
	function UnixToMonth($input){
		$datum  = date("m.Y", $input);
			
		$timestring = "$datum";
				
		return $timestring;
	}	
	
	function UnixToBirth($input){
		
		if($input == 0){
			return "<i> bitte angeben! </i>";
		}else{
			return date("d.m.Y", $input);
		}
	}
	
	function UnixToBirthForm($input){
		
		if($input == 0){
			return "";
		}else{
			return date("d.m.Y", $input);
		}
	}
/*
Format Beschreibung                          Beispiel
  ========================================================
  d      Tag des Monats, zweistellig           03, 28
  j      Tag des Monats                        7, 13
  m      Nummer des Monats, zweistellig        01, 11
  n      Nummer des Monats                     2, 10
  y      Jahr zweistellig                      99, 00
  Y      Jahr vierstellig                      1999, 2001
  H      Stunde im 24-Stunden-Format, zweist.  08, 16
  G      Stunde im 24-Stunden-Format           7, 18
  i      Minuten, zweistellig                  08, 45
  s      Sekunden, zweistellig                 06, 56

  w      Wochentag in Zahlenwert               2, 6
*/
?>