<?php
require_once '../includes/DbOperations.php';
$response = array();
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['username']) and isset($_POST['password'])){
        $db=new DbOperations();
        if($db->userLogin($_POST['username'],$_POST['password'])){
           $users= $db->getuserBy($_POST['username']);
            $response['error']=false;
            $response['id']=$users['id'];
            $response['username']=$users['username'];
            $response['email']=$users['email'];

        }
        else{
            $response['error']=true;
            $response['message']="invalid username or password";
        }
    }
    else  {
        $response['error']=true;
        $response['message']="some fields are missing";

    }
}
else{
    $response['error']=true;
    $response['message']="invalid Request";
}

echo json_encode($response);

?>