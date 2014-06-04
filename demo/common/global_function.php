<?php
/**
 * Description of global
 * @author Tony Tsang
 */
class global_function {
	/*
	 * Do something global operate.
	 */
	public static function pretreatment(){
		// do someting global operate on here.
	}

	/**
	 * get the client ip
	 *
	 * return @return String
	 */
	function getRealIpAddr()
	{
		if (!emptyempty($_SERVER['HTTP_CLIENT_IP'])){
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!emptyempty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	/**
	 * Generate The Random String
	 *
	 * @param int $length
	 * return @return String
	 */
	function generateTheRandomString($length = 6){
		$c= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789^*~!#+-";
		srand((double)microtime()*1000000);
		for($i=0; $i<$l; $i++) {
			$rand.= $c[rand()%strlen($c)];
		}
		return $rand;
	}

	/**
	 * Verify email address
	 * @param String $email
	 * @param String $test_mx
	 *
	 * return @return Bool
	 */
	function isEmailAddress($email, $test_mx = false){
		if(eregi("^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)){
			if($test_mx){
				list($username, $domain) = split("@", $email);
				return getmxrr($domain, $mxrecords);
			}else
			return true;
		} else
		return false;
	}

	/**
	 * Resize the image
	 * 
	 * @param String $filename path to the image
	 * @param String $tmpname temporary path to thumbnail 
	 * @param int $xmax
	 * @param int $ymax
	 */
	function resizeImage($filename, $tmpname, $xmax, $ymax)
	{
		$ext = explode(".", $filename);
		$ext = $ext[count($ext)-1];

		if($ext == "jpg" || $ext == "jpeg")
		$im = imagecreatefromjpeg($tmpname);
		elseif($ext == "png")
		$im = imagecreatefrompng($tmpname);
		elseif($ext == "gif")
		$im = imagecreatefromgif($tmpname);

		$x = imagesx($im);
		$y = imagesy($im);

		if($x <= $xmax && $y <= $ymax)
		return $im;

		if($x >= $y) {
			$newx = $xmax;
			$newy = $newx * $y / $x;
		}
		else {
			$newy = $ymax;
			$newx = $x / $y * $newy;
		}

		$im2 = imagecreatetruecolor($newx, $newy);
		imagecopyresized($im2, $im, 0, 0, 0, 0, floor($newx), floor($newy), $x, $y);
		return $im2;
	}
	
	public static function viewPage($viewPage){
		$view = new TFView($viewPage.'.html');
		return $view;
	}

}


