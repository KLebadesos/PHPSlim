<?php
$app->post('/api/login',function($request)
    {
        require_once('app/database/dbconnect.php');
        $lid=$request->getParsedBody()['username'];
        $pwd=$request->getParsedBody()['password'];
        mysql_select_db("phpslim_db");
        $sql_login="select id,pwd from tbl_list where id=".$lid." and pwd=".$pwd;
        $res_login=mysql_query($sql_login);
        while($row=mysql_fetch_array($res_login))
        {
            $data[]=$row;
        }
        if(isset($data))
        {
            header('Content-Type:application/json');
            echo json_encode($data);
        }
    }
);