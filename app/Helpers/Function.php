

<?php 

    if( ! function_exists('upload') ) {
        /**
         * Upload file
         * @param  str $fileControl
         * @return str
         */
        function upload($fileControl) {
            $baseFilename = public_path() . '/uploads/' . $_FILES[$fileControl]['name'];
            $info = new SplFileInfo($baseFilename);
            $ext = $info->getExtension();
            // Tên file mới
            $filename = md5($baseFilename) . '.' . $ext;
            move_uploaded_file($_FILES[$fileControl]['tmp_name'], public_path() . '/uploads/' . $filename);
            return $filename;
        }
    }

    /**
     * sắp xếp lại danh mục
     * @param  [type]  $listCategory      [description]
     * @param  integer $parents           [description]
     * @param  integer $level             [description]
     * @param  [type]  &$CategorySort     [description]
     * @return [type]                     [description]
     */
    function recursive($listCategory ,$parents = 0 ,$level = 1 ,&$CategorySort)
    {
        if(count($listCategory) > 0 )
        {
            foreach ($listCategory as $key => $value) {
                if($value['parent_id']  == $parents)
                {
                    $value['level'] = $level;
                    $CategorySort[] = $value;
                    unset($listCategory[$key]);
                    $newparents = $value['id'];

                    recursive($listCategory , $newparents ,$level + 1 , $CategorySort);
                }
            }
        }
    }

    /**
     * tao slug
     */

    function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

    /**
     * format price
     */

    function formatCurrency($number) {
        return number_format($number, 0, '.', '.') ." đ";
    }
 ?>