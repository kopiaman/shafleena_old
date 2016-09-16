<?
session_start();
require_once("config.php");
require_once("DbConfig.php");
require_once("class.DB.php");
require_once("Timeline_RecordUpdate_Class.php");
require_once("Timeline_DbOutputMapper_Class.php");
require_once("Timeline_MysqlToJson_Class.php");
require_once("Timeline_Json_Class.php");
require_once("Timeline_GalleryJson_Class.php");
require_once("Timeline_ClientProductImgJson_Class.php");
//require_once("Timeline_LatestNewsJson_Class.php");
//require_once("Timeline_SubproductJson_Class.php");
$Conn=new DB($DbHost, $DbUser, $DbPwd, $Db);
$Conn2=mysql_connect($DbHost, $DbUser, $DbPwd);
$conn=mysql_connect($DbHost, $DbUser, $DbPwd);
@mysql_select_db($Db) or die ("Unable to connect to database");
$UpdateRecord = new TimelineRecordUpdate($Conn);
$JsonData = new TimelineMysqlToJson($Conn2);
$JsonData2 = new TimelineJson($conn);
$JsonData3 = new GalleryJson($conn);
$JsonData4 = new ClientProductImgJson($conn);
//$JsonData5 = new LatestNewsJson($conn);
//$JsonData6 = new SubproductJson($conn);

//$JsonData = new TimelineDbOutputMapper($Conn);
$function = $_POST['function'];
$JsonArr= array();
function sanitize($data,$Conn){
	$Conn->connect();
$data = trim($data); 
	if(get_magic_quotes_gpc()){
	$data = stripslashes($data);
	}
	$data = mysql_real_escape_string($data);
	return $data;
}

	if($function=='GetProductImage'){
		 $JsonData2->SetSql("SELECT fid,pid,file_name,file_loc,caption,file_cat FROM filemanager where pid='".$_POST['pid']."' AND file_cat='".$_POST['file_cat']."' AND (show_status='1'  OR show_status='0') ORDER BY fid ASC");
		 echo json_encode($JsonData2->Build());
	}
	if($function=='GetSubProductImage'){
		 $JsonData6->SetSql("SELECT fid,pid,file_name,file_loc,caption,file_cat FROM filemanager where pid='".$_POST['pid']."' AND file_cat='".$_POST['file_cat']."' AND (show_status='1'  OR show_status='0') ORDER BY fid ASC");
		 echo json_encode($JsonData6->Build());
	}	
	elseif($function=='GetGalleryImage'){
		 $JsonData3->SetSql("SELECT fid,pid,file_name,file_loc,caption,file_cat FROM filemanager where pid='".$_POST['pid']."' AND file_cat='".$_POST['file_cat']."' AND (show_status='1'  OR show_status='0') ORDER BY fid ASC");
		 echo json_encode($JsonData3->Build());
	}
	elseif($function=='GetClientProductImage'){
		 $JsonData4->SetSql("SELECT fid,pid,file_name,file_loc,caption,file_cat FROM filemanager where pid='".$_POST['pid']."' AND file_cat='".$_POST['file_cat']."' AND show_status='1' ORDER BY fid ASC");
		 echo json_encode($JsonData4->Build());
	}	
	elseif($function=='GetClientGalleryImage'){
		if($_POST['pid']==0 || $_POST['pid']==NULL){
		 $Conn->connect();
		  $Conn->query("SELECT id FROM gallery_code WHERE show_front='1' AND show_status='1'");
		  $Result=$Conn->fetchRow();	
		  $RecordCnt=$Conn->resultCount();		
		  
		  $JsonData4->SetSql("SELECT fid,pid,file_name,file_loc,caption,file_cat FROM filemanager where file_cat='".$_POST['file_cat']."' AND pid='".$Result[0]."' AND show_status='1' ORDER BY fid ASC");		
		 echo json_encode($JsonData4->Build());
		}
		else{
		  $JsonData4->SetSql("SELECT fid,pid,file_name,file_loc,caption,file_cat FROM filemanager where file_cat='".$_POST['file_cat']."' AND pid='".$_POST['pid']."' AND show_status='1' ORDER BY fid ASC");		
		 echo json_encode($JsonData4->Build());			
		}

	}
	elseif($function=='GetClientGalleryImage'){
		if($_POST['pid']==0 || $_POST['pid']==NULL){
		 $Conn->connect();
		  $Conn->query("SELECT id FROM gallery_code WHERE show_front='1' AND show_status='1'");
		  $Result=$Conn->fetchRow();	
		  $RecordCnt=$Conn->resultCount();		
		  
		  $JsonData4->SetSql("SELECT fid,pid,file_name,file_loc,caption,file_cat FROM filemanager where file_cat='".$_POST['file_cat']."' AND pid='".$Result[0]."' AND show_status='1' ORDER BY fid ASC");		
		 echo json_encode($JsonData4->Build());
		}
		else{
		  $JsonData4->SetSql("SELECT fid,pid,file_name,file_loc,caption,file_cat FROM filemanager where file_cat='".$_POST['file_cat']."' AND pid='".$_POST['pid']."' AND show_status='1' ORDER BY fid ASC");		
		 echo json_encode($JsonData4->Build());			
		}

	}			
	elseif($function=='GetNewsGalleryImage'){
		 $Conn->connect();
		  $Conn->query("SELECT galLinkId FROM news WHERE show_status='1' AND id='".$_POST['pid']."'");
		  $Result=$Conn->fetchRow();	
		  $RecordCnt=$Conn->resultCount();		
		  
		  $JsonData4->SetSql("SELECT fid,pid,file_name,file_loc,caption,file_cat FROM filemanager where file_cat='".$_POST['file_cat']."' AND pid='".$Result[0]."' AND show_status='1' ORDER BY fid ASC");		
		 echo json_encode($JsonData4->Build());		
	}	
	elseif($function=='getNews'){
		 $JsonData5->SetSql("SELECT id,tittle,summary,fdate FROM news WHERE show_front='1' AND show_status='1'");
		 echo json_encode($JsonData5->Build());
	}
	elseif($function=='getAllNews'){
		 $JsonData5->SetSql("SELECT id,tittle,summary,fdate FROM news WHERE show_status='1' ORDER BY entry_dt DESC");
		 echo json_encode($JsonData5->Build());
	}					
	else{
	}
	//echo json_encode($JsonSend);
	//debug
	//echo json_encode($JsonArr);
	//echo json_encode($JsonData->Build());
?>