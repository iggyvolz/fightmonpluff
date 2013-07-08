<?php
$array = array(); // Stats will be put in later
$data = '';
$first = TRUE;
foreach($array as $name=>$nextarray)
{
if($first) // Skip first time only
{
$first = FALSE;
}
else
{
echo ';';
}
$data.= 'Name:'.$name;
foreach($nextarray as $key => $value)
{
$data.=',';
echo $key.':'.$value;
}
}
echo rawurldecode($data);