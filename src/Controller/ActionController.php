<?php

namespace Controller;

use App\DB;

class ActionController{
    function addCultureProccess(){
        extract($_POST);
        $image = "";
        if($_FILES['image'] !== []) $image = image_upload($_FILES['image']);
        $sql = "INSERT INTO `cultures`(`sn`, `no`, `ccmaName`, `crltsnoNm`, `ccbaMnm1`, `ccbaMnm2`, `ccbaCtcdNm`, `ccsiName`, `ccbaAdmin`, `ccbaKdcd`, `ccbaCtcd`, `ccbaAsno`, `ccbaCncl`, `ccbaCpno`, `longitude`, `latitude`, `gcodeName`, `bcodeName`, `mcodeName`, `scodeName`, `ccbaQuan`, `ccbaAsdt`, `ccbaLcad`, `ccceName`, `ccbaPoss`, `ccbaCndt`, `image`, `content`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        DB::query($sql,[$sn, $no, $ccmaName, $crltsnoNm, $ccbaMnm1, $ccbaMnm2, $ccbaCtcdNm, $ccsiName, $ccbaAdmin, $ccbaKdcd, $ccbaCtcd, $ccbaAsno, $ccbaCncl, $ccbaCpno, $longitude, $latitude, $gcodeName, $bcodeName, $mcodeName, $scodeName, $ccbaQuan, $ccbaAsdt, $ccbaLcad, $ccceName, $ccbaPoss, $ccbaCndt, $image, $content]);
        go("/cultures","무형문화재가 등록되었습니다.");
    }

    function modCultureProccess($id){
        extract($_POST);
        $data = DB::fetch("SELECT * FROM cultures WHERE id = ?",[$id]);
        $image = $data->image;
        if($_FILES['image'] !== []) $image = image_upload($_FILES['image']);
        else $image = $image;
        if(isset($imageDel) &&$imageDel == "on") $image = "";
        $sql = "UPDATE `cultures` SET `sn`=?,`no`=?,`ccmaName`=?,`crltsnoNm`=?,`ccbaMnm1`=?,`ccbaMnm2`=?,`ccbaCtcdNm`=?,`ccsiName`=?,`ccbaAdmin`=?,`ccbaKdcd`=?,`ccbaCtcd`=?,`ccbaAsno`=?,`ccbaCncl`=?,`ccbaCpno`=?,`longitude`=?,`latitude`=?,`gcodeName`=?,`bcodeName`=?,`mcodeName`=?,`scodeName`=?,`ccbaQuan`=?,`ccbaAsdt`=?,`ccbaLcad`=?,`ccceName`=?,`ccbaPoss`=?,`ccbaCndt`=?,`image`=?,`content`=? WHERE id = ?";
        DB::query($sql,[$sn, $no, $ccmaName, $crltsnoNm, $ccbaMnm1, $ccbaMnm2, $ccbaCtcdNm, $ccsiName, $ccbaAdmin, $ccbaKdcd, $ccbaCtcd, $ccbaAsno, $ccbaCncl, $ccbaCpno, $longitude, $latitude, $gcodeName, $bcodeName, $mcodeName, $scodeName, $ccbaQuan, $ccbaAsdt, $ccbaLcad, $ccceName, $ccbaPoss, $ccbaCndt, $image, $content,$id]);
        go("/cultures","무형문화재가 수정되었습니다.");
    }

    function delCultureProccess($id){
        $sql = "DELETE FROM cultures WHERE id = ?";
        DB::query($sql,[$id]);
        go("/cultures","무형문화재가 삭제되었습니다.");
    }

    function addShowProccess(){
        extract($_POST);
        $sql = "INSERT INTO shows() VALUES()";
        DB::query($sql,[]);
        DBback("공연일정이 등록되었습니다.");
    }

    function modShowProccess($id){
        extract($_POST);
        $sql = "INSERT INTO shows() VALUES()";
        DB::query($sql,[]);
        DBback("공연일정이 수정되었습니다.");
    }

    function delShowProccess($id){
        $sql = "DELETE FROM shows WHERE showUid = ?";
        DB::query($sql,[$id]);
        DBback("공연일정이 삭제되었습니다.");
    }

    function imageLoad(){
        $name = $_GET['name'];
        $path = IMAGE . DIRECTORY_SEPARATOR . $name;
        if(!file_exists($path)) return exit;
        header('Content-Description:application/octet-stream');
        header("Content-Disposition:attachment;filename=$name");
        header("Content-Length:".filesize($path));
        readfile($path);   
    }
}