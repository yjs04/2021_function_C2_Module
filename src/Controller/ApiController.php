<?php

namespace Controller;

use App\DB;

class ApiController{
    function nihList(){
        if(!(isset($_GET['pageNo']) && isset($_GET['numOfRows']))) return exit;
        $pageNo = $_GET['pageNo'];
        $numOfRows = $_GET['numOfRows'];
        $bcodeName = isset($_GET['bcodeName']) ? $_GET['bcodeName'] : "";

        $start = $pageNo * $numOfRows - 1;

        if($bcodeName == ""){
            $sql = "SELECT ccbaKdcd,ccbaAsno,ccbaCtcd,ccbaCpno,ccmaName,ccbaMnm1,ccbaMnm2,gcodeName,bcodeName,mcodeName,scodeName,ccbaQuan,ccbaAsdt,ccbaCtcdNm,ccsiName,ccbaLcad,ccceName,ccbaPoss,ccbaCncl,ccbaCndt,`image`,content FROM cultures LIMIT $start, $numOfRows";
            $items = DB::fetchAll($sql);
        }else{
            $sql = "SELECT ccbaKdcd,ccbaAsno,ccbaCtcd,ccbaCpno,ccmaName,ccbaMnm1,ccbaMnm2,gcodeName,bcodeName,mcodeName,scodeName,ccbaQuan,ccbaAsdt,ccbaCtcdNm,ccsiName,ccbaLcad,ccceName,ccbaPoss,ccbaCncl,ccbaCndt,`image`,content FROM cultures WHERE bcodeName = ? LIMIT $start, $numOfRows";
            $items = DB::fetchAll($sql,[$bcodeName]);
        }

        for($i = 0; $i < count($items); $i++){
            $items[$i]->image = base64_upload($items[$i]->image);
        }

        $result = [];
        $result['numOfRows'] = $numOfRows;
        $result['pageNo'] = $pageNo;
        $result['totalCount'] = count($items);
        $result['items'] = $items;

        echo json_encode($result,JSON_UNESCAPED_UNICODE);
    }
}