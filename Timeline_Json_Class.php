<?
class TimelineJson {
	public function __construct($Conn){
		$this->_Conn=$Conn;
	}
	public function SetSql($Sql){
		$this->_Sql=$Sql;
	}
	protected function GetSql(){
		return $this->_Sql=$Sql;
	}
	protected function GetFieldName(){
	}
	public function Showfield(){
		echo json_encode($this->_jsondata);
	}
	protected function ExecMysql(){
			 //$procsql = mysql_query($sql, $conn) or die("error on sql e");

	}
	public function Build(){
						//$Conn2=mysql_connect('localhost', 'dev', '123456');
				//@mysql_select_db('shafleena') or die ("Unable to connect to database");
		$procsql = mysql_query($this->_Sql, $this->_Conn) or die("error on sql e");
	 	//$rs_procsql= mysql_fetch_row($procsql);
	 	$numrows = mysql_num_rows($procsql);
		//echo $numrows.$rs_procsql[0];
		
		$jsondata = array();

			
		 while($rs_procsql = mysql_fetch_array($procsql)){
			 $jsondata[] = array("image"=>'../'.$rs_procsql['file_loc'].$rs_procsql['file_name'],"caption"=>$rs_procsql['caption'],"link"=>"main.php?op=9&fop=".$rs_procsql['file_cat']."&sop=7&pid=".$rs_procsql['pid']."&id=".$rs_procsql['fid']."");
		 }
			$this->_Gfield_names=$field_names;
			return $jsondata;
			//print_r($this->_Gfield_names);
	}
}
?>