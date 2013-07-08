<?php
/**
 * API Eternity Incurakai v1.0.1
 * Copyright 2012 Eternity Incurakai Studios, All Rights Reserved
 * Licensed under the ESCLv1 License
 */


########## STARTING POINT ##########
$codes=array(
    0 => "Up",
    // 110-119 - Up, but going down for unknown reason
        110 => "Up, but going down within 5 hours for unknown reason",
        111 => "Up, but going down within 1 hour for unknown reason",
        112 => "Up, but going down within 30 minutes for unknown reason",
        113 => "Up, but going down within 10 minutes for unknown reason",
        114 => "Up, but going down within 5 minutes for unknown reson",
    // 120-129 - Up, but going down for weekly update and backup
        120 => "Up, but going down within 5 hours for weekly update and backup",
        121 => "Up, but going down within 1 hour for weekly update and backup",
        122 => "Up, but going down within 30 minutes for weekly update and backup",
        123 => "Up, but going down within 10 minutes for weekly update and backup",
        124 => "Up, but going down within 5 minutes for weekly update and backup",
    // 130-139 - Up, but going down for emergency update
        130 => "Up, but going down within 5 hours for emergency update",
        131 => "Up, but going down within 1 hour for emergency update",
        132 => "Up, but going down within 30 minutes for emergency update",
        133 => "Up, but going down within 10 for emergency update",
        134 => "Up, but going down within 5 minutes for emergency update",
    // 210-219 - Down for unknown reason
        210 => "Down for unknown reason, going up within 5 hours",
        211 => "Down for unknown reason, going up within 1 hour",
        212 => "Down for unknown reason, going up within 30 minutes",
        213 => "Down for unknown reason, going up within 10 minutes",
        214 => "Down for unknown reason, going up within 5 minutes",
        215 => "Down for unknown reason for indefinite amount of time",
    // 220-229 - Down for weekly update and backup
        220 => "Down for weekly update and backup, going up within 5 hours",
        221 => "Down for weekly update and backup, going up within 1 hour",
        222 => "Down for weekly update and backup, going up within 30 minutes",
        223 => "Down for weekly update and backup, going up within 10 minutes",
        224 => "Down for weekly update and backup, going up within 5 minutes",
        225 => "Down for weekly update and backup for indefinite amount of time",
    // 230-239 - Down for emergency update
        230 => "Down for emergency update, going up within 5 hours",
        231 => "Down for emergency update, going up within 1 hour",
        232 => "Down for emergency update, going up within 30 minutes",
        233 => "Down for emergency update, going up within 10 minutes",
        234 => "Down for emergency update, going up within 5 minutes",
        235 => "Down for emergency update for indefinite amount of time",
    );
mysqli_connect(db_url,db_uname,db_pwd,db_name);
$result=mysqli_query($con,'SELECT * FROM `api_status`');
while($row = mysqli_fetch_array($result))
  {
  $code=$row['code']; // We only have one status code
  $message=$row['message']; // A custom message, such as "The site will be back up within 2 minutes" or "We are experiencing technical difficulties"
  }
if($code=='0')
{
$data='up';
}
else
{
$data='down';
}
$data.=':';
$data.=$code;
$data.=':';
$data.=$codes[intval($code)];
$data.=':';
$data.=$message;
/* Render Format: 
up/down:statuscode:meaning:message	*/
echo rawurlencode($data);

/* END OF FILE */