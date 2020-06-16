<?php
class DataComponent extends Object
{
    //called before Controller::beforeFilter()
    function initialize(&$controller, $settings = array()) {
    // saving the controller reference for later use
    $this->controller =& $controller;
    //Su dung DataComponent ngoài view
    $this->controller->set('DataComponent', new DataComponent());
    }
    //called after Controller::beforeFilter()
    function startup(&$controller) {
    }
    //called after Controller::beforeRender()
    function beforeRender(&$controller) {
    }
    //called after Controller::render()
    function shutdown(&$controller) {
    }
    //called before Controller::redirect()
    function beforeRedirect(&$controller, $url, $status=null, $exit=true) {
    }
    function redirectSomewhere($value) {
    // utilizing a controller method
    }
    function unicode_convert($str){
        if(!$str) return false;
        $unicode = array(
        'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
        'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
        'd'=>array('đ'),
        'D'=>array('Đ'),
        'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
        'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
        'i'=>array('í','ì','ỉ','ĩ','ị'),
        'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
        'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','õ','ớ','ờ','ở','ỡ','ợ'),
        '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Õ','Ớ','Ờ','Ở','Ỡ','Ợ'),
        'u'=>array('ú','ù','ủ','ũ','ụ','ý','ứ','ừ','ử','ữ','ự'),
        'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ý','Ứ','Ừ','Ử','Ữ','Ự'),
        'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
        'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'), 
        );
        foreach($unicode as $nonUnicode=>$uni){
        foreach($uni as $value)
        $str = str_replace($value,$nonUnicode,$str);
        }
        return $str;
    }
	public function htmlDecode($string)
	{
		return html_entity_decode($string,null,"UTF-8");
	}
	public function htmlEncode($string)
	{
		return htmlentities($string,null,"UTF-8");
	}
	public function filterData($string) {
		$string = preg_replace('#<script.*?</script>#s', '', $string);
		$string = preg_replace('#<\?.*?\?>#s', '', $string);
		$string = str_replace("\\'", "", $string);
		$string = str_replace('\"', "", $string);
		
		$string = $this->htmlDecode($string);
		return $string;
	}
	public function asignData($param)
	{
		$data = array();
		
		foreach ($param as $key => $value) {
			if(is_string($value))
			$data[$key] = $this->filterData($value);
			else 
			{
				$data[$key] = $value;
			}
		}
		return $data;
	}
	public function asignField($field)
	{
		return $this->filterData($this->htmlEncode($this->stripTags($field)));
	}
	public function tranferData($string)
	{
		$trans = array(
					'à'=>'a','á'=>'a','ả'=>'a','ã'=>'a','ạ'=>'a',
					'ă'=>'a','ằ'=>'a','ắ'=>'a','ẳ'=>'a','ẵ'=>'a','ặ'=>'a',
					'â'=>'a','ầ'=>'a','ấ'=>'a','ẩ'=>'a','ẫ'=>'a','ậ'=>'a',
					'À'=>'a','Á'=>'a','Ả'=>'a','Ã'=>'a','Ạ'=>'a',
					'Ă'=>'a','Ằ'=>'a','Ắ'=>'a','Ẳ'=>'a','Ẵ'=>'a','Ặ'=>'a',
					'Â'=>'a','Ầ'=>'a','Ấ'=>'a','Ẩ'=>'a','Ẫ'=>'a','Ậ'=>'a',    
					'đ'=>'d','Đ'=>'d',
					'è'=>'e','é'=>'e','ẻ'=>'e','ẽ'=>'e','ẹ'=>'e',
					'ê'=>'e','ề'=>'e','ế'=>'e','ể'=>'e','ễ'=>'e','ệ'=>'e',
					'È'=>'e','É'=>'e','Ẻ'=>'e','Ẽ'=>'e','Ẹ'=>'e',
					'Ê'=>'e','Ề'=>'e','Ế'=>'e','Ể'=>'e','Ễ'=>'e','Ệ'=>'e',
					'ì'=>'i','í'=>'i','ỉ'=>'i','ĩ'=>'i','ị'=>'i',
					'Ì'=>'i','Í'=>'i','Ỉ'=>'i','Ĩ'=>'i','Ị'=>'i',
					'ò'=>'o','ó'=>'o','ỏ'=>'o','õ'=>'o','ọ'=>'o',
					'ô'=>'o','ồ'=>'o','ố'=>'o','ổ'=>'o','ỗ'=>'o','ộ'=>'o',
					'ơ'=>'o','ờ'=>'o','ớ'=>'o','ở'=>'o','ỡ'=>'o','ợ'=>'o',
					'Ò'=>'o','Ó'=>'o','Ỏ'=>'o','Õ'=>'o','Ọ'=>'o',
					'Ô'=>'o','Ồ'=>'o','Ố'=>'o','Ổ'=>'o','Ỗ'=>'o','Ộ'=>'o',
					'Ơ'=>'o','Ờ'=>'o','Ớ'=>'o','Ở'=>'o','Ỡ'=>'o','Ợ'=>'o',
					'ù'=>'u','ú'=>'u','ủ'=>'u','ũ'=>'u','ụ'=>'u',
					'ư'=>'u','ừ'=>'u','ứ'=>'u','ử'=>'u','ữ'=>'u','ự'=>'u',
					'Ù'=>'u','Ú'=>'u','Ủ'=>'u','Ũ'=>'u','Ụ'=>'u',
					'Ư'=>'u','Ừ'=>'u','Ứ'=>'u','Ử'=>'u','Ữ'=>'u','Ự'=>'u',
					'ỳ'=>'y','ý'=>'y','ỷ'=>'y','ỹ'=>'y','ỵ'=>'y',
					'Y'=>'y','Ỳ'=>'y','Ý'=>'y','Ỷ'=>'y','Ỹ'=>'y','Ỵ'=>'y'
				  );
  		$string = strtr($this->htmlDecode($string), $trans);
  		return $string;		
	}

	public  function formod($a)
	{
		if(!empty($a)){
			$strong=substr($a, 0,1);
			for($i=0;$i<strlen($a);$i++){
				if($i!=0)
				$strong=$strong."0";
			}
			return $strong;
		}else{
			return '';
		}
	}

	public function toLower($string, $encode = "UTF-8")
	{
		return mb_strtolower($string, $encode);
	}
	public function toUpper($string, $encode = "UTF-8")
	{
		return mb_strtoupper($string, $encode);
	}
	public function toAlias($string)
	{
		$tmp = array("~","`","!","@","#","$","%","^","&","*","(",")","-","_","=","+","{","[","]","}","|","\\",":",";","'","\"","<",",",">",".","?","/");
		
		$string = $this->tranferData($string);
		$string = strip_tags($string);
		$string = trim($string, " \n\t.");
		$string = str_replace($tmp," ",$string);
		
		$arr = explode(" ", $string);
		
		$string = "";
		foreach ($arr as $key)
		{
			if(!empty($key))
				$string.= "-".$key;
		}
		return $this->toLower(substr($string, 1));
	}
	public function toAliasImages($string)
	{
		$tmp = array("~","`","!","@","#","$","%","^","&","*","(",")","-","_","=","+","{","[","]","}","|","\\",":",";","'","\"","<",",",">","?","/");
		
		$string = $this->tranferData($string);
		$string = strip_tags($string);
		$string = trim($string, " \n\t.");
		$string = str_replace($tmp," ",$string);
		
		$arr = explode(" ", $string);
		
		$string = "";
		foreach ($arr as $key)
		{
			if(!empty($key))
				$string.= "-".$key;
		}
		return $this->toLower(substr($string, 1));
	}
	public static function checkEmailType($email_address, $requied = false)
	{
		if(empty($email_address))
		{
			return $requied;
		}
		else 
		{
			 return preg_match('/^[^@]*@[^@]*\.[^@]*$/', $email_address);
		}
		
	}
	public static function checkPhone($phone){
			if(empty($phone)){
				return false;
			}
				if(preg_match("/^([1]-)?[0-9]{4}[0-9]{3}[0-9]{3}$/i", $phone) || preg_match("/^([1]-)?[0-9]{4} [0-9]{3} [0-9]{3}$/i", $phone) || preg_match("/^([1]-)?[0-9]{4}-[0-9]{3}-[0-9]{3}$/i", $phone) ) {
				   return true;
				}
				return false;
	}
	
	public	function checkDate($string)
	{
		$check = explode('/',$string);
		
		if(count($check)!=3)
		{
			return false;
		}
		if($check[1]<1 || $check[1]>12)
		{
			return false;
		}
		else 
		{
			$check[1] = (int) $check[1];
		}

		if ($check[2]<1)
		{
			return false;
		}
		else 
		{
			$check[2] = (int) $check[2]%100;
		}
		
		$thang = array();
		$thang[1] = 31;
		$thang[2] =28;
		$thang[3] =31;
		$thang[4] =30;
		$thang[5] =31;
		$thang[6] =30;
		$thang[7] =31;
		$thang[8] =31;
		$thang[9] =30;
		$thang[10] =31;
		$thang[11] =28;
		$thang[12] =31;
		if($check[2]%4 == 0)
		{
			$thang[2] =29;
		}
		if($check[0]<1)
		{
			return false;
		}
		else
		{	
			$check[0] = (int) $check[0];
			if($check[0]<=$thang[$check[1]])
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		return false;
	}
	
	public function check_File($file_name,$extent_file, $file_size, $max_size = 256000){
    	$extent_file = strtolower($extent_file);//"jpg|gif";	
    	$file_name = strtolower($file_name);
	
		if(!preg_match("/\\.(" . $extent_file . ")$/",$file_name)){ 
    		 return false;
		}else{
			if($file_size>$max_size || $file_size <=0)
	 			return false;
	 		else 
	 			return true;
		}
	}
	
	public static function createFolder($dir){
		if(!file_exists($dir)){
			mkdir($dir, 0777);
		}
		return true;
	}
	
	public static function checkLength($string, $min, $max){
		$len = mb_strlen($string,"UTF-8");
		if($len<$min||$len>$max){
			return false;
		}
		return true;
	}
	
	public static function checkRegexp($string, $regexp){
		return preg_match($regexp, $string);
		
	}

	
	public static function checkEmpty($val){
		return empty($val);
	}
	public static function checkEmptyArray($arr=array()){
		foreach($arr as $a){
			return empty($a);
		}
	}
	
	
	public static function dateToNumber($date){
		$arr = explode(" ", $date);
		$arr1 = explode("-", $arr[0]);
		$arr2 = explode(":", $arr[1]);
		return mktime($arr2[0],$arr2[1],$arr2[2],$arr1[1],$arr1[2],$arr1[0]);
	}
	public static function subString($string,$len){
		$string = html_entity_decode(strip_tags($string),null,"UTF-8");
		if(mb_strlen($string,"UTF-8")<=$len){
			return $string;
		}
		else{
			return mb_substr($string, 0,($len-3),"UTF-8")."...";
		}
	}
	public function randd($option=12){
		 $int = rand(0,10);
	    $a_z = "01234567891";
	    $rand_letter = $a_z[$int];
	    for($i=0;$i<$option;$i++){
	    	 $int1 = rand(0,10);
	    	$rand_letter.= $a_z[$int1];
	    }
	    return $rand_letter;
	}
	public function randomNumber($option=17){
		 $int = rand(0,51);
	    $a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $rand_letter = $a_z[$int];
	    for($i=0;$i<$option;$i++){
	    	 $int1 = rand(0,51);
	    	$rand_letter.= $a_z[$int1];
	    }
	    return $rand_letter;
	}
	public function get_image($pathIn, $name_img){
		$pathIn_check=WWW_ROOT.$pathIn;
        if(is_file($pathIn_check.$name_img)){
			return DS.$pathIn.$name_img;
		}
		return DS.IMG_DIR.DS."images-default.jpg";
	}
}
?>