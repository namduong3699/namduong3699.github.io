<?php 
	include("class.phpmailer.php");
	include("class.smtp.php");

    function sendMail($title='title', $content='content', $nTo = 'HoaiNam', $mTo='namduong3699@gmail.com',$diachicc=''){
	    $nFrom = 'cozastore-contact: '.$title;
	    $mFrom = 'namduong3616@gmail.com';  //dia chi email cua ban 
	    $mPass = 'lplkqhezlfdiiikg';       //mat khau email cua ban
	    $mail             = new PHPMailer();
	    $body             = $content;
	    $mail->IsSMTP(); 
	    $mail->CharSet    = "utf-8";
	    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	    $mail->SMTPAuth   = true;                    // enable SMTP authentication
	    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	    $mail->Host       = "smtp.gmail.com";        
	    $mail->Port       = 465;
	    $mail->Username   = $mFrom;  // GMAIL username
	    $mail->Password   = $mPass;               // GMAIL password
	    $mail->SetFrom($mFrom, $nFrom);
	    //chuyen chuoi thanh mang
	    $ccmail = explode(',', $diachicc);
	    $ccmail = array_filter($ccmail);
	    if(!empty($ccmail)){
	    	foreach ($ccmail as $k => $v) {
	    		$mail->AddCC($v);
	    	}
	    }
	    $mail->Subject    = $title;
	    $mail->MsgHTML($body);
	    $address = $mTo;
	    $mail->AddAddress($address, $nTo);
	    $mail->AddReplyTo('namduong3616@gmail.com', 'codecat.tk');
	    if(!$mail->Send()) {
	    	return false;
	    } else {
	    	return true;
	    }
	}
	function sendMailAttachment($title, $content, $nTo, $mTo,$diachicc='',$file,$filename){
		$nFrom = 'cozastore-contact';
	    $mFrom = 'namduong3616@gmail.com';  //dia chi email cua ban 
	    $mPass = 'lplkqhezlfdiiikg';       //mat khau email cua ban
	    $mail             = new PHPMailer();
	    $body             = $content;
	    $mail->IsSMTP(); 
	    $mail->CharSet   = "utf-8";
	    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	    $mail->SMTPAuth   = true;                    // enable SMTP authentication
	    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	    $mail->Host       = "smtp.gmail.com";        
	    $mail->Port       = 465;
	    $mail->Username   = $mFrom;  // GMAIL username
	    $mail->Password   = $mPass;               // GMAIL password
	    $mail->SetFrom($mFrom, $nFrom);
	    //chuyen chuoi thanh mang
	    $ccmail = explode(',', $diachicc);
	    $ccmail = array_filter($ccmail);
	    if(!empty($ccmail)){
	    	foreach ($ccmail as $k => $v) {
	    		$mail->AddCC($v);
	    	}
	    }
	    $mail->Subject    = $title;
	    $mail->MsgHTML($body);
	    $address = $mTo;
	    $mail->AddAddress($address, $nTo);
	    $mail->AddReplyTo('namduong3699@gmail.com', 'codecat.tk');
	    $mail->AddAttachment($file,$filename);
	    if(!$mail->Send()) {
	    	return 0;
	    } else {
	    	return 1;
	    }
	}



?>




