<?php
class GoogleShopping {
  public function getPrices($ean) {
		$eanLength = 14;
			
		if(strlen($ean) < $eanLength){
			$ean = str_pad($ean, $eanLength, '0', STR_PAD_LEFT);
		}
	
		$res  = array();
		$file = fopen('https://www.google.nl/search?hl=nl&output=search&tbm=shop&q=08806085553941',"r");
		$data = "";
	
		while (!feof ($file)) {
			$data .= fgets ($file, 1024);
		} 
	
		preg_match_all("/shopping\/product\/[0-9]+/", $data,$res);
		preg_match_all("/[0-9]+/",$res[0][0],$res);
			
		$html = file_get_html("https://www.google.nl/shopping/product/{$res[0][0]}/online?hl=nl");
		
		$r_tables = $html->find('table');
		$tmp_array = array();
		$result = array();
	
		foreach($r_tables as $table) {
			$r_rows = $table->find('tr');
			foreach($r_rows as $r_row)
			{
				$a = $r_row->find('td.os-seller-name');
				$b = $r_row->find('td.os-price-col');
				
				$tmp_array["seller"] 	= @trim($a[0]->plaintext);
				$tmp_array["price"] 	= @trim($b[0]->plaintext);
				$tmp_array["price"] 	= str_replace(",",".",$tmp_array["price"]);
	
				if($tmp_array["seller"] != NULL && $tmp_array["price"] != NULL)
				{  
					$tmp_array["price"]  = $this->strtflt($tmp_array["price"]);
					$result[] = $tmp_array;
				}
			}
		}
		return $result;
  }

	static function strtflt($str) { 
	 $il = strlen($str); 
	 $flt = ""; 
	 $cstr = ""; 
	 
	 for($i=0;$i<$il;$i++) { 
		 $cstr = substr($str, $i, 1); 
		 if(is_numeric($cstr) || $cstr == ".") 
			 $flt = $flt.$cstr; 
	 } 
	 return floatval($flt); 
 }
}
?>
