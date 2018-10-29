<?php  
include("connection.php");
function save($table,$dataPost,$id=0){
	global $conn;
	if($id){
			//update
		$fileld = "";
		$i=0;
		foreach ($dataPost as $key => $value) {
			if($key !="addNew"){
				$i++;
				if($i==1){
					if($key == 'name' || $key=='status' || $key =='password'){
						if (isset($value) && !empty($value)) $fileld .="`".$key."`='".$value."'";
					}else{
						if (isset($value) && !empty($value)) $fileld .="".$key."='".$value."'";
					}
				}else{
					if($key == 'name' || $key=='status' || $key =='password'){
						if (isset($value) && !empty($value)) $fileld .=",`".$key."`='".$value."'";
					}else{
						if (isset($value) && !empty($value)) $fileld .=",".$key."='".$value."'";
					}
				}
			}
		}
		$sqlQuery="UPDATE ".$table." SET ".$fileld." WHERE id='$id '";
			// die($sqlQuery);
	}else{
		$fileld = "";
		$val ="";
		$i=0;
		foreach ($dataPost as $key => $value) {
			if($key !="addNew"){
				$i++;
				if ($key == 'cat_id') {
					$cat_id = catToCatId($value);
					if ($cat_id == NULL) {
						echo "NULL";
						$sqlInsert = "INSERT INTO category (`name`) VALUES ('".$value."')";
						mysqli_query($conn,$sqlInsert) or die("Loi ".$sqlInsert);	
					}
					$value = $cat_id;
				}
				if($i==1){
					if($key == 'name' || $key=='status' || $key =='password'){
						$key = "`".$key."`";
					}
					$fileld .= $key;
					$val .= "'".$value."'";
				}else{
					if($key == 'name' || $key=='status' || $key =='password'){
						$key = "`".$key."`";
					}
					$fileld .= ",".$key;
					$val .= ",'".$value."'";
				}
			}
		}
		$sqlQuery = "INSERT INTO ".$table."($fileld)";

		$sqlQuery .= " VALUES($val)";		
	      	// die($sqlQuery);	
	}
	mysqli_query($conn,$sqlQuery) or die("Loi Truy van" .$sqlQuery );
	// header("location:index.php");
}

function getById($table,$field,$condition){
	global $conn;
	$sqlEdit = "SELECT ".$field." FROM ".$table." WHERE ".$condition;
	$result = mysqli_query($conn,$sqlEdit) or die("Loi ".$sqlEdit);
	$row = mysqli_fetch_row($result);
	return $row;
}

function getInfoRow($table, $field, $condition){
	global $conn;
	$sqlSelect = "SELECT ".$field." FROM ".$table." WHERE ".$condition;
	$result = mysqli_query($conn,$sqlSelect) or die("Loi ".$sqlSelect);
	$row = mysqli_fetch_assoc($result);
	return $row;
}

function getAll($table,$fields = "*"){
	global $conn;
	$sqlSelect = "SELECT ".$fields." FROM ".$table;
	$result = mysqli_query($conn,$sqlSelect) or die("Loi truy van ".$sqlSelect);
	return $result;
}

//Hàm lấy về thông tin category bằng cat_id
function catIdToCat($cat_id) {
	global $conn;
	$sqlSelect = "SELECT `name` FROM category WHERE id = ".$cat_id;
	$result = mysqli_query($conn, $sqlSelect);
	$result = mysqli_fetch_assoc($result);
	return $result['name'];
}

//Hàm lấy về thông tin cat_id bằng category
function catToCatId($category) {
	global $conn;
	$sqlSelect = "SELECT `id` FROM category WHERE `name` = ".$category;
	$result = mysqli_query($conn, $sqlSelect);
	$result = mysqli_fetch_assoc($result);
	return $result['id'];
}

?>