function getVerification($email,$code){
	$query_check = "UPDATE `email_var` SET `status` = '1' where `email` = '$email' && `code` = '$code'";
	if (mysql_query($query_check)) {
		return true;
	}
	else{
		return false;
	}
}
