<?php
    header("Content-Type: text/html; charset=utf-8");
	require 'eb.upload.php';

    // upload işlemleri
    if( $_FILES ) 
    {
        $up = new UPLOAD( $_FILES['dosyalar'] );

        $up->yolDizin('upload');
        $up->minBoyut(1);
        $up->minDosya(1);
        $up->tipKabul('txt, jpg');
        $up->yazUstune(false);

        if( $up->baslat() === false ) {
        	echo $up->ilkHata();
        } else {
            print '<pre>';
            print_r( $up->bilgiVer() );
            print '</pre>';
            exit();
        }

        unset($up);
    }
?>

<html>
<head>
	<title> Dosya Upload </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

    <form method="post" action="" enctype="multipart/form-data" >
        <div>
            <input name="dosyalar[]" type="file" size="45" maxlength="500"  />
            <br>
            <input name="dosyalar[]" type="file" size="45" maxlength="500"  />
            <br>
            <input name="dosyalar[]" type="file" size="45" maxlength="500"  />
            <br>
            <button name="submit" type="submit" style="width:334px; padding: 10px">Yükle</button>
        </div>
    </form>

</body>
</html>