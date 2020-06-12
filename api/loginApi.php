<?php
error_reporting(0);
header("Content-Type: application/json; charset=UTF-8");
if($_SERVER['REQUEST_METHOD']!=='POST'){
    header('Method Not Allowed', true, 405);
    $response->$status="Request method needs to be POST";
    echo json_encode($response);
    exit(405);
}

$request=file_get_contents("php://input");

$data=json_decode($request);

if(!isset($data->action)){
    header("Bad Request", true, 400);
    $response->$status="Action data missing.";
    echo json_encode($response);
    exit(400);
}

if(strtoupper($data->action) === "REGISTER" || $data->action===0){
    if(
        isset($data->email) &&
        isset($data->password) &&
        isset($data->name)
    ){
        try{
            if(preg_match('[a-z0-9]+([-+._][a-z0-9]+){0,2}@.*?(\.(a(?:[cdefgilmnoqrstuwxz]|ero|(?:rp|si)a)|b(?:[abdefghijmnorstvwyz]iz)|c(?:[acdfghiklmnoruvxyz]|at|o(?:m|op))|d[ejkmoz]|e(?:[ceghrstu]|du)|f[ijkmor]|g(?:[abdefghilmnpqrstuwy]|ov)|h[kmnrtu]|i(?:[delmnoqrst]|n(?:fo|t))|j(?:[emop]|obs)|k[eghimnprwyz]|l[abcikrstuvy]|m(?:[acdeghklmnopqrstuvwxyz]|il|obi|useum)|n(?:[acefgilopruz]|ame|et)|o(?:m|rg)|p(?:[aefghklmnrstwy]|ro)|qa|r[eosuw]|s[abcdeghijklmnortuvyz]|t(?:[cdfghjklmnoprtvwz]|(?:rav)?el)|u[agkmsyz]|v[aceginu]|w[fs]|y[etu]|z[amw])\b){1,2}', $data->email)){
                $email=$data->email;
            }
            else{
                header("Bad Request", true, 400);
                $response->status="Bad email format.";
                echo json_encode($response);
                exit(400);
            }
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
            $response->$status="Success.";
            echo json_encode($response);
            exit(200);
        }
        catch(Exception $e){
            header("Internal Server Error", true, 500);
            $response->$status="Something bad happened. Traceback: $e";
            echo json_encode($response);
            exit(500);
        }
    }
    else{
        header("Bad Request", true, 400);
        $response->$status="Invalid format.";
        echo json_encode($response);
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
                $response->$status="Wrong credentials.";
                echo json_encode($response);
                exit(403);
            }
        }
        catch(Exception $e){
            header("Internal Server Error", true, 500);
            $response->$status="Something bad happened. Traceback: $e";
            echo json_encode($response);
            exit(500);
        }
    }
    else{
        header("Bad Request", true, 400);
        $response->$status="Invalid format.";
        echo json_encode($response);
        exit(400);
    }
}
else{
    $action=$data->action;
    header("Bad Request", true, 400);
    $response->$status="Unknown action: $action";
    echo json_encode($response);
    exit(400);
}
