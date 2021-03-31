<?php

namespace Controller;

use App\DB;

class ViewController{
    function index(){view("index");}
    function phone(){view("phone");}
    function history(){view("history");}
    function cultures(){
        $bcodeList = ["전통 공연·예술","전통기술","전통지식","구전 전통 및 표현","전통 생활관습","의례·의식","전통 놀이·무예"];
        $type = isset($_GET['type']) ? $_GET['type'] : "list";
        $bcode = isset($_GET['bcode']) ? $_GET['bcode'] : "";
        $bcodeName = $bcode !== "" ? $bcodeList[$bcode] : "";

        if($bcodeName !== ""){
            $sql = "SELECT * FROM cultures WHERE bcodeName = ? ORDER BY `id` DESC";
            $data = DB::fetchAll($sql,[$bcodeName]);
        }else {
            $sql = "SELECT * FROM cultures ORDER BY id DESC";
            $data = DB::fetchAll($sql);
        }

        $list = pagination($data,$type,$bcode);
        view("cultures",$list);
    }

    function addCulture(){view("addCulture");}
    function modCulture($id){
        $data = DB::fetch("SELECT * FROM cultures WHERE id = ?",[$id]);
        view("modCulture",compact("data"));
    }

    function monthShow(){
        $year = isset($_GET["year"]) ? $_GET['year'] : date("Y");
        $month = isset($_GET['month']) ? $_GET['month'] : date("m");

        $calendar = calendar($year,$month);
        $sql = "SELECT * FROM shows WHERE `showDate` >= ? AND `showDate` <= ? ORDER BY `showDate` ASC";
        $data = DB::fetchAll($sql,[date("Y-m-d",$calendar['first']),date("Y-m-d",$calendar['last'])]);
        view("monthShow",compact("calendar","data","year","month"));
    }

    function yearShow(){
        $year = isset($_GET["year"]) ? $_GET['year'] : date("Y");
        $first = date("Y-m-d",strtotime("{$year}-01-01"));
        $last = date("Y-m-d",strtotime("{$year}-12-31"));
        $sql = "SELECT * FROM shows WHERE `showDate` >= ? AND `showDate` <= ? ORDER BY `showDate` ASC";
        $data = DB::fetchAll($sql,[$first,$last]);
        view("yearShow",$data);
    }

    function addShow(){view("addShow");}
    function modShow($id){
        $sql = "SELECT * FROM shows WHERE showUid = ?";
        $data = DB::fetch($sql,[$id]);
        view("modShow",$data);
    }

    function openCulture(){view("openCulture");}
    function openShow(){view("openShow");}
}