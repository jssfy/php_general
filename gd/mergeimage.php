<?php
    function mergerImg($imgs) {
     
            list($max_width, $max_height) = getimagesize($imgs['dst']);
            $dests = imagecreatetruecolor($max_width, $max_height);
    		echo "$max_width, $max_height\n"; 
            $dst_im = imagecreatefromjpeg($imgs['dst']);
     
            imagecopy($dests,$dst_im,0,0,0,0,$max_width,$max_height);
            imagedestroy($dst_im);
     
            $src_im = imagecreatefromjpeg($imgs['src']);
            $src_info = getimagesize($imgs['src']);
			echo "$src_info[0], $src_info[1]\n";
            imagecopy($dests,$src_im,$max_width/2,$max_height/2,0,0,$src_info[0],$src_info[1]);
            imagedestroy($src_im);
     
            // header("Content-type: image/jpeg");
            imagejpeg($dests, "temp.jpg");
    }
     
    $imgs = array(
            // 'dst' => 'http://www.wangshangyou.com/content/uploadfile/201112/7627fce925cf8ba5091a4b9b759e4bfd20111210125922.jpg',
            // 'src' => 'http://tva3.sinaimg.cn/crop.0.0.180.180.50/6cdb1362jw1e8qgp5bmzyj2050050aa8.jpg'
            'dst' => '01.jpeg',
            'src' => '02.jpeg'
    );
     
    mergerImg($imgs);
?>
