<?php
error_reporting(0);
header("Content-Type: application/json; charset=UTF-8");
if($_SERVER['REQUEST_METHOD']!=='POST'){
    header('Method Not Allowed', true, 405);
    echo "Request method needs to be POST";
    exit(405);
}

$request=file_get_contents("php://input");

$data=json_decode($request);

if(!isset($data->action)){
    header("Bad Request", true, 400);
    echo "Action data missing.";
    exit(400);
}

if(strtoupper($data->action) === "REGISTER" || $data->action===0){
    if(
        isset($data->email) &&
        isset($data->password) &&
        isset($data->name)
    ){
        try{
            $email=$data->email;
            $password=$data->password;
            $name=$data->name;
            $file=fopen('ID.txt',"r+");
            $new_file=fopen('ID2.txt','r+');

            $file_content=file_get_contents('ID.txt');
            $k=substr_count($file_content,"\n");

            $i=0;

            while($i!=$k){
                $line=fgets($file);
                fputs($new_file,$line."\n");
                $i++;
            }

            fputs($new_file,$file_content."\n");
            fputs($new_file,$email."/".$password."/".$name);
            $file2_content=file_get_contents('ID2.txt');
            fputs($file,$file2_content);
            fclose($file);
            fclose($new_file);
            echo "Success.";
            exit(200);
        }
        catch(Exception $e){
            header("Internal Server Error", true, 500);
            echo "Something bad happened. Traceback: $e";
            exit(500);
        }
    }
    else{
        header("Bad Request", true, 400);
        echo "Invalid format.";
        exit(400);
    }
}
elseif(strtoupper($data->action)==="LOGIN" || $data->action===1){
    if(
        isset($data->email) &&
        isset($data->password)
    ){
        try{
            $email=$data->email;
            $password=$data->password;

            $file=fopen('ID.txt',"r");

            $file_content = file_get_contents('ID.txt');
            $k=substr_count($file_content, "\n");
            $k++;
            $i=0;

            while($i!=$k)
            {	
                $ligne=fgets($file);
                $query="$email/$password";
                if (strpos($ligne, $query) !==false)
                {
                    session_start();
                    $name=substr(strstr($ligne, "$email/$password/"),strlen($email)+strlen($password)+2);
                    if(strpos($name,"\n")!==false){
                        $name=substr($name,0,-1);
                    }
                    $_SESSION["name"]=$name;
                    $isAllowed=True;
                    $i=$k;
                    break;   
                }
                else
                {
                    $isAllowed=False;
                    $i++;
                }
                
            }

            fclose($file);
            if($isAllowed){
                $response->status="Success";
                $response->name=$name;
                echo json_encode($response);
                exit(200);
            }
            else{
                header("Forbidden", true, 403);
                echo "Wrong credentials.";
            }
        }
        catch(Exception $e){
            header("Internal Server Error", true, 500);
            echo "Something bad happened. Traceback: $e";
            exit(500);
        }
    }
    else{
        header("Bad Request", true, 400);
        echo "Invalid format.";
        exit(400);
    }
}
else{
    $action=$data->action;
    header("Bad Request", true, 400);
    echo "Unknown action: $action";
    exit(400);
}

?>