<?php
$sfz = $_GET['sfz'];

//拆解身份证
//前6个数字为区号
//7-11为年份
//12-13为月份
//14-15为日分
//最后四位为[随机数三位][单数男(X),双数女]
$list = array();
//判断*号打在身份证哪个位置
for ($i = 0;$i<17;$i++){
    if ($sfz[$i] == '*'){
        echo '检测到星号第'.($i+1).'个字符</br>';
        array_push($list,$i+1);
    }else {
//        echo $sfz[$i] . '</br>';
    }
}
echo '[+]检查到'.count($list).'个未知数字</br>';
echo '[+]开始检测缺失数据...</br>';

if(ArrinArr12($list)){
    echo '省级政府代码缺失</br>';
}
if (ArrinArr34($list)){
    echo '地、市级代码缺失</br>';
}
if (ArrinArr56($list)){
    echo '县、区级代码缺失</br>';
}
if (ArrinArr78910($list)){
    echo '出生年份缺失</br>';
}
if (ArrinArr1112($list)){
    echo '出生月份缺失</br>';
}
if (ArrinArr1314($list)){
    echo '出生日份缺失</br>';
}
if (ArrinArr151617($list)){
    echo '随机数代码缺失</br>';
}
if (ArrinArr18($list)){
    echo '性别代码缺失</br>';
}

function ArrinArr12($listS)
{
    foreach (array(1,2) as $l){
        if(in_array($l,$listS)){
            return true;
        }
    }
    return false;
}
function ArrinArr34($listS)
{
    foreach (array(3,4) as $l){
        if(in_array($l,$listS)){
            return true;
        }
    }
    return false;
}

function ArrinArr56($listS)
{
    foreach (array(5,6) as $l){
        if(in_array($l,$listS)){
            return true;
        }
    }
    return false;
}
function ArrinArr78910($listS)
{
    foreach (array(7,8,9,10) as $l){
        if(in_array($l,$listS)){
            return true;
        }
    }
    return false;
}
function ArrinArr1112($listS)
{
    foreach (array(11,12) as $l){
        if(in_array($l,$listS)){
            return true;
        }
    }
    return false;
}
function ArrinArr1314($listS)
{
    foreach (array(13,14) as $l){
        if(in_array($l,$listS)){
            return true;
        }
    }
    return false;
}
function ArrinArr151617($listS)
{
    foreach (array(15,16,17) as $l){
        if(in_array($l,$listS)){
            return true;
        }
    }
    return false;
}
function ArrinArr18($listS)
{
    foreach (array(18) as $l){
        if(in_array($l,$listS)){
            return true;
        }
    }
    return false;
}

?>

