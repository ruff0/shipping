<?php
	function droplist($data){
		foreach ($data as $key => $val){
			$id  = $val["id"];
			$name = $val["name"];
		echo "<option value='$id'> $name </option>";
		}
	}
    function perlist($data){
        foreach ($data as $key => $val){
            $id  = $val["id"];
            $name = $val["name"];
        echo "<option value='$id' > $name </option>";
        }
    }
    function adminlist($data){
        foreach ($data as $key => $val){
            $id  = $val["id"];
            $name = $val["name"];
        echo "<option value='$id'> $name </option>";
        }
    }
    function agentlist($data){
        foreach ($data as $key => $val){
            $id  = $val["id"];
            $name = $val["name"];
        echo "<option value='$id'> $name </option>";
        }
    }
    function cuslist($data){
        echo "<option value='1'> View </option>";
        }
    

	function gridlist($data){
		foreach ($data as $key => $val){
			$id  = $val["id"];
			$name = $val["name"];
		echo "<option value='$id'> $name </option>";
		}
	}
	function editlist($data,$select=0){
		foreach ($data as $key => $val){
			$id  = $val["id"];
			$name = $val["name"];
            if ($select !=0 && $id == $select){
		echo "<option value='$id' selected> $name </option>";
		} else
        {
            echo "<option value='$id'> $name </option>";
        }
	}
    }

    function slist($data,$select=0){
        foreach ($data as $key => $val){
            $id  = $val["id"];
            $name = $val["name"];
            if ($select !=0 && $id == $select){
                echo $name;
                } 
        }
    }

	function test_input($text_input){
    $text_input = trim($text_input);
    $text_input = stripslashes($text_input);
    $text_input = htmlspecialchars($text_input);
    
    return $text_input;
   }
   function clean($string) {
   //$string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
	return preg_replace("/[^ \w]+/", "", $string);
    // Removes special chars.
	}

	function inputtext($text_input){
    $text_input = trim($text_input);
    $text_input = stripslashes($text_input);
    $text_input = htmlspecialchars($text_input);
    
    return $text_input;
   }
   function bookRandomString($length) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = 'BO'.'';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
   function billRandomString($length) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = 'BL'.'';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
   function logRandomString($length) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>