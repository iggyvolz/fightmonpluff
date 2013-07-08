<?php
/**
 * API Eternity Incurakai v1.0.1
 * Copyright 2012 Eternity Incurakai Studios, All Rights Reserved
 * Licensed under the ESCLv1 License
 */


########## STARTING POINT ##########
mysqli_connect(db_url,db_uname,db_pwd,db_name);
$result=mysqli_query($con,'SELECT * FROM `api_yard`');
while($row = mysqli_fetch_array($result))
{
    if($row['username']===$_GET['username'])
    {
        $yard=unserialize($row['yard']);
    }
}
$data='';
foreach($yard as $value)
{
    foreach($value as $newvalue)
    {
        $data.=$newvalue;
        $data.=',';
    }
    $data=substr($data, 0, -1); // Remove final ,
    $data.=';';
}
$data=substr($data, 0, -1); // Remove final ;
echo rawurlencode($data);

/* END OF FILE */