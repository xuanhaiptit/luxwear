<?php

// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer dumpautoload

function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
	$str=trim($str);
	if ($str=="") return "";
	$str =str_replace('"','',$str);
	$str =str_replace("'",'',$str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str,$case,'utf-8');
	$str = preg_replace('/[\W|_]+/',$strSymbol,$str);
	return $str;
}
function show_array($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}


// function cate_parent($data,$parent = 0,$str="--",$select=0){
// 	foreach($data as $val){
// 		$id= $val['id'];
// 		$name= $val['name'];
// 		if($val['parent_id'] == $parent){
// 			if($select != 0 && $id == $select){
// 				echo "<option value='$id' select='selected'>$str $name</option>";
// 			} else {
// 				echo "<option value='$id'>$str $name</option>";
// 			}
// 			cate_parent($data,$id,$str."--");
// 		}
// 	}
// }


function stripUnicode($str){
	if(!$str) return '';
	//$str = str_replace($a, $b, $str);
	$unicode = array(
		'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
		'ae'=>'ǽ',
		'AE'=>'Ǽ',
		'c'=>'ć|ç|ĉ|ċ|č',
		'C'=>'Ć|Ĉ|Ĉ|Ċ|Č',
		'd'=>'đ|ď',
		'D'=>'Đ|Ď',
		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
		'f'=>'ƒ',
		'F'=>'',
		'g'=>'ĝ|ğ|ġ|ģ',
		'G'=>'Ĝ|Ğ|Ġ|Ģ',
		'h'=>'ĥ|ħ',
		'H'=>'Ĥ|Ħ',
		'i'=>'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',	  
		'I'=>'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
		'ij'=>'ĳ',	  
		'IJ'=>'Ĳ',
		'j'=>'ĵ',	  
		'J'=>'Ĵ',
		'k'=>'ķ',	  
		'K'=>'Ķ',
		'l'=>'ĺ|ļ|ľ|ŀ|ł',	  
		'L'=>'Ĺ|Ļ|Ľ|Ŀ|Ł',
		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
		'Oe'=>'œ',
		'OE'=>'Œ',
		'n'=>'ñ|ń|ņ|ň|ŉ',
		'N'=>'Ñ|Ń|Ņ|Ň',
		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
		's'=>'ŕ|ŗ|ř',
		'R'=>'Ŕ|Ŗ|Ř',
		's'=>'ß|ſ|ś|ŝ|ş|š',
		'S'=>'Ś|Ŝ|Ş|Š',
		't'=>'ţ|ť|ŧ',
		'T'=>'Ţ|Ť|Ŧ',
		'w'=>'ŵ',
		'W'=>'Ŵ',
		'y'=>'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
		'z'=>'ź|ż|ž',
		'Z'=>'Ź|Ż|Ž'
	);
	foreach($unicode as $khongdau=>$codau) {
		$arr=explode("|",$codau);
		$str = str_replace($arr,$khongdau,$str);
	}
	return $str;
}

if (!function_exists('upload_image'))
{
/**
* @param $file [tên file trùng tên input]
* @param array $extend [ định dạng file có thể upload được]
* @return array|int [ tham số trả về là 1 mảng - nếu lỗi trả về int ]
*/
function upload_image($file , $folder = '',array $extend = array() )
{
    $code = 1;
// lay duong dan anh
    $baseFilename = public_path() . '/uploads/' . $_FILES[$file]['name'];
// thong tin file
    $info = new SplFileInfo($baseFilename);
// duoi file
    $ext = strtolower($info->getExtension());
// kiem tra dinh dang file
    if ( ! $extend )
    {
        $extend = ['png','jpg','jpeg'];
    }
    if( !in_array($ext,$extend))
    {
        return $data['code'] = 0;
    }
// Tên file mới
    $nameFile = trim(str_replace('.'.$ext,'',strtolower($info->getFilename())));
    $filename = date('Y-m-d__').str_slug($nameFile) . '.' . $ext;
// thu muc goc de upload
    $path = public_path().'/uploads/'.date('Y/m/d/');
    if ($folder)
    {
        $path = public_path().'/uploads/'.$folder.'/'.date('Y/m/d/');
    }
    if ( !\File::exists($path))
    {
        mkdir($path,0777,true);
    }
// di chuyen file vao thu muc uploads
    move_uploaded_file($_FILES[$file]['tmp_name'], $path. $filename);
    $data = [
        'name' => $filename,
        'code' => $code,
        'path_img' => 'uploads/'.$filename
    ];
    return $data;
}
}
if (!function_exists('pare_url_file')) {
    function pare_url_file($image,$folder = '')
    {
        if (!$image)
        {
            return'/images/no-image.jpg';
        }
        $explode = explode('__', $image);
        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return '/uploads/'.$folder.'/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}
if (!function_exists('get_data_user'))
{
    function get_data_user($type,$field = 'id')
    {
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
    }
}


?>