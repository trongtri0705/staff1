<?php
    function stripUnicode($str) {
        if (!$str)
            return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        );
        foreach ($unicode as $nonUnicode => $uni)
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        return $str;
    }  
    function getImage($id){
        if($image = DB::table('profiles')->select('*')->where('user_id',$id)->first())
            return $image->avatar;
        else return 'default.jpg';
    }
    function changePlace($str)
    {
        $str = trim($str);
        if ($str=="") return "";
        $str = str_replace('"','', $str);
        $str = str_replace("'",'', $str);
        $str = stripUnicode($str);
        $str = mb_convert_case($str, MB_CASE_LOWER,'utf-8');        
        return ucwords($str);
    }
    function changeTitle($str){
        $str = trim($str);
        if ($str=="") return "";
        $str = str_replace('"','', $str);
        $str = str_replace("'",'', $str);
        $str = stripUnicode($str);
        $str = mb_convert_case($str, MB_CASE_LOWER,'utf-8');
        $str = str_replace(' ','-' , $str);
        return $str;
    }
    function cate_parent($data, $parent=0,$str="",$select=0)
    {
        foreach ($data as $key => $value) {
            $id = $value['id'];
            $name = $value["name"];
            if($value["department_id"]==$parent){
                if($select !=0 && $id == $select)
                {
                    echo "<option value='$id' selected='selected'>$str $name</option>";

                }
                else{
                    echo "<option value='$id'>$str $name</option>";   
                }
                
                cate_parent($data, $id,$str." --");
            }
        }
    }
?>