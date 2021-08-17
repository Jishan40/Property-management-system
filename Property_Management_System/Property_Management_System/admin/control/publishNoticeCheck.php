<?php
    $err_notice = $msg="";
    $hasError = false;

    if(isset($_POST["publish"])){
        
    
        if(empty ($_POST["notice"])){
            $err_notice="You have to write something";
            $hasError = true;
        }
        
        if(!$hasError){
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $formdata = array(
                'notice'=> $_POST['notice']
                );

                $tempJSONdata[] = $formdata;
                $jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);

                file_put_contents("../data/notice.json", $jsondata);
        
            }
            $msg = "Notice Published Successfully";	
        }
    }

?>