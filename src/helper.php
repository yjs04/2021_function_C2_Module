<?php

use App\DB;

function init(){
    if(DB::searchAll("cultures")) return false;
    $xml = simplexml_load_file(XML."/nihList.xml");
    $totalCnt = (int)$xml->totalCnt;
    for($i = 0; $i < $totalCnt; $i++){
        $item = $xml->item[$i];
        $sn = (int) $item->sn;
        $no = (string)$item->no;
        $ccmaName = (string)$item->ccmaName;
        $crltsnoNm = (string)$item->crltsnoNm;
        $ccbaMnm1 = (string)$item->ccbaMnm1;
        $ccbaMnm2 = (string)$item->ccbaMnm2;
        $ccbaCtcdNm = (string)$item->ccbaCtcdNm;
        $ccsiName = (string)$item->ccsiName;
        $ccbaAdmin = (string)$item->ccbaAdmin;
        $ccbaKdcd = (string)$item->ccbaKdcd;
        $ccbaCtcd = (string)$item->ccbaCtcd;
        $ccbaAsno = (string)$item->ccbaAsno;
        $ccbaCncl = (string)$item->ccbaCncl;
        $ccbaCpno = (string)$item->ccbaCpno;
        $longitude = (float)$item->longitude;
        $latitude = (float)$item->latitude;
        
        $detail = simplexml_load_file(XML."/detail/{$ccbaKdcd}_{$ccbaCtcd}_{$ccbaAsno}.xml");
        $detail = $detail->item;
        $gcodeName = (string)$detail->gcodeName;
        $bcodeName = (string)$detail->bcodeName;
        $mcodeName = (string)$detail->mcodeName;
        $scodeName = (string)$detail->scodeName;
        $ccbaQuan = (string)$detail->ccbaQuan;
        $ccbaAsdt = (string)$detail->ccbaAsdt;
        $ccbaAsdt = substr($ccbaAsdt,0,4)."-".substr($ccbaAsdt,5,2)."-".substr($ccbaAsdt,7,2);
        $ccbaLcad = (string)$detail->ccbaLcad;
        $ccceName = (string)$detail->ccceName;
        $ccbaPoss = (string)$detail->ccbaPoss;
        $ccbaAdmin = (string)$detail->ccbaAdmin;
        $ccbaCndt = (string)$detail->ccbaCndt;
        $ccbaCndt = substr($ccbaCndt,0,4)."-".substr($ccbaCndt,5,2)."-".substr($ccbaCndt,7,2);
        $image = (string)$detail->imageUrl;
        $content = (string)$detail->content;

        $sql = "INSERT INTO `cultures`(`sn`, `no`, `ccmaName`, `crltsnoNm`, `ccbaMnm1`, `ccbaMnm2`, `ccbaCtcdNm`, `ccsiName`, `ccbaAdmin`, `ccbaKdcd`, `ccbaCtcd`, `ccbaAsno`, `ccbaCncl`, `ccbaCpno`, `longitude`, `latitude`, `gcodeName`, `bcodeName`, `mcodeName`, `scodeName`, `ccbaQuan`, `ccbaAsdt`, `ccbaLcad`, `ccceName`, `ccbaPoss`, `ccbaCndt`, `image`, `content`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        DB::query($sql,[$sn, $no, $ccmaName, $crltsnoNm, $ccbaMnm1, $ccbaMnm2, $ccbaCtcdNm, $ccsiName, $ccbaAdmin, $ccbaKdcd, $ccbaCtcd, $ccbaAsno, $ccbaCncl, $ccbaCpno, $longitude, $latitude, $gcodeName, $bcodeName, $mcodeName, $scodeName, $ccbaQuan, $ccbaAsdt, $ccbaLcad, $ccceName, $ccbaPoss, $ccbaCndt, $image, $content]);
    }

}

function view($name,$data=[]){
    extract($data);
    include_once VIEW."/header.php";
    include_once VIEW."/$name.php";
    include_once VIEW."/footer.php";
}

function go($url,$msg){
    echo "<script>alert('$msg');location.href='$url';</script>";
    exit;
}

function back($msg){
    echo "<script>alert('$msg');histroy.back();</script>";
    exit;
}

function DBback($msg){
    echo "<script>alert('$msg');history.go(-2);</script>";
    exit;
}

function extname($filename){
    return strtolower(substr($filename,strrpos($filename,".")));
}

function image_upload($file){
    $filename = time().extname($file['name']);
    move_uploaded_file($file['tmp_name'],IMAGE."/$filename");
    return $filename;
}

function base64_upload($data){
    $data = base64_encode(file_get_contents(IMAGE."/$data"));
    $filename = "data:image/jpg;base64,".$data;
    return $filename;
}

function pagination($data,$type,$bcode){
    define("LIST_LENGTH",$type == "list" ? 10 : 8);
    define("BLOCK_LENGTH",10);

    $count = count($data);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $totalPage = ceil(count($data) / LIST_LENGTH);
    $block = ceil($page / BLOCK_LENGTH);
    $end = $block * BLOCK_LENGTH;
    $start = $end - BLOCK_LENGTH + 1;
    
    $next = true;
    $next_block = true;
    $prev = true;
    $prev_block = true;

    if($end >= $totalPage){
        $end = $totalPage;
        $next_block = false;
    }

    if($start <= 1){
        $start = 1;
        $prev_block = false;
    }

    $prev = $page -1 < 1 ? false : true;
    $next = $page + 1 > $totalPage ? false: true;

    $items = array_splice($data,($page - 1) * LIST_LENGTH,LIST_LENGTH);
    return compact("page","totalPage","end","start","next","next_block","prev","prev_block","items","type","count","bcode");
}

function calendar($year,$month){
    $first = strtotime("{$year}-{$month}-01");
    $start = $first;

    while(true){
        $day = date("w",$start);
        if($day == 0) break;
        $start = strtotime(date("Y-m-d",$start)."-1 day");
    }

    $nextMonth = strtotime(date("Y-m-d",$first)."+1 month");
    $prevMonth = strtotime(date("Y-m-d",$first)."-1 month");

    $last = strtotime(date("Y-m-d",$nextMonth)."-1 day");
    $end = $last;

    while(true){
        $day = date("w",$end);
        if($day == 6) break;
        $end = strtotime(date("Y-m-d",$end)."+1 day");
    }

    $nextQ = "/monthShow?year=".date("Y",$nextMonth)."&month=".date("m",$nextMonth);
    $prevQ = "/monthShow?year=".date("Y",$prevMonth)."&month=".date("m",$prevMonth);

    return compact("first","start","last","end","nextQ","prevQ");
}