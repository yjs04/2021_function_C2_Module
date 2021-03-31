
<!-- 콘텐츠 -->
<div id="content">
            <div class="container">
                <div class="content_wrap" id="cultures">
                    <div class="content_title">
                        <h2>무형문화재현황 <span>무형문화재현황 <i class="fas fa-angle-right"></i> 무형문화재 수정</span></h2>
                    </div>
                    <div class="content_box">
                        <form action="/modCultureProccess/<?=$data->id?>" id="modCultureForm" method="post"  enctype="multipart/form-data" >
                            <div class="form-group">
                                <label for="sn" class="form-label"><span class="text-danger mr-1">(*)</span>순번</label>
                                <input type="number" id="sn" name="sn" class="form-control" required value="<?=$data->sn?>">
                            </div>
                            <div class="form-group">
                                <label for="no" class="form-label"><span class="text-danger mr-1">(*)</span>고유키값</label>
                                <input type="text" id="no" name="no" class="form-control" required value="<?=$data->no?>">
                            </div>
                            <div class="form-group">
                                <label for="ccmaName" class="form-label"><span class="text-danger mr-1">(*)</span>문화재종목</label>
                                <input type="text" id="ccmaName" name="ccmaName" class="form-control" required value="<?=$data->ccmaName?>">
                            </div>
                            <div class="form-group">
                                <label for="crltsnoNm" class="form-label"><span class="text-danger mr-1">(*)</span>지정호수</label>
                                <input type="text" id="crltsnoNm" name="crltsnoNm" class="form-control" required value="<?=$data->crltsnoNm?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaMnm1" class="form-label"><span class="text-danger mr-1">(*)</span>문화재명</label>
                                <input type="text" id="ccbaMnm1" name="ccbaMnm1" class="form-control" required value="<?=$data->ccbaMnm1?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaMnm2" class="form-label">문화재명(한자)</label>
                                <input type="text" id="ccbaMnm2" name="ccbaMnm2" class="form-control" value="<?=$data->ccbaMnm2?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaCtcdNm" class="form-label">시도명</label>
                                <input type="text" id="ccbaCtcdNm" name="ccbaCtcdNm" class="form-control" value="<?=$data->ccbaCtcdNm?>">
                            </div>
                            <div class="form-group">
                                <label for="ccsiName" class="form-label">시군구명</label>
                                <input type="text" id="ccsiName" name="ccsiName" class="form-control" value="<?=$data->ccsiName?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaAdmin" class="form-label">관리자</label>
                                <input type="text" id="ccbaAdmin" name="ccbaAdmin" class="form-control" value="<?=$data->ccbaAdmin?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaKdcd" class="form-label"><span class="text-danger mr-1">(*)</span>종목코드</label>
                                <input type="text" id="ccbaKdcd" name="ccbaKdcd" class="form-control" required value="<?=$data->ccbaKdcd?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaCtcd" class="form-label"><span class="text-danger mr-1">(*)</span>시도코드</label>
                                <input type="text" id="ccbaCtcd" name="ccbaCtcd" class="form-control" required value="<?=$data->ccbaCtcd?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaAsno" class="form-label"><span class="text-danger mr-1">(*)</span>지정번호</label>
                                <input type="text" id="ccbaAsno" name="ccbaAsno" class="form-control" required value="<?=$data->ccbaAsno?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaCncl" class="form-label">지정해제여부</label>
                                <input type="text" id="ccbaCncl" name="ccbaCncl" class="form-control" value="<?=$data->ccbaCncl?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaCpno" class="form-label">문화재연계번호</label>
                                <input type="text" id="ccbaCpno" name="ccbaCpno" class="form-control" value="<?=$data->ccbaCpno?>">
                            </div>
                            <div class="form-group">
                                <label for="longitude" class="form-label">경도</label>
                                <input type="text" id="longitude" name="longitude" class="form-control" value="<?=$data->longitude?>">
                            </div>
                            <div class="form-group">
                                <label for="latitude" class="form-label">위도</label>
                                <input type="text" id="latitude" name="latitude" class="form-control" value="<?=$data->latitude?>">
                            </div>
                            <div class="form-group">
                                <label for="gcodeName" class="form-label">문화재분류</label>
                                <input type="text" id="gcodeName" name="gcodeName" class="form-control" value="<?=$data->gcodeName?>">
                            </div>
                            <div class="form-group">
                                <label for="bcodeName" class="form-label">문화재분류2(종류)</label>
                                <input type="text" id="bcodeName" name="bcodeName" class="form-control" value="<?=$data->bcodeName?>">
                            </div>
                            <div class="form-group">
                                <label for="mcodeName" class="form-label">문화재분류3</label>
                                <input type="text" id="mcodeName" name="mcodeName" class="form-control" value="<?=$data->mcodeName?>">
                            </div>
                            <div class="form-group">
                                <label for="scodeName" class="form-label">문화재분류4</label>
                                <input type="text" id="scodeName" name="scodeName" class="form-control" value="<?=$data->scodeName?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaQuan" class="form-label">수량</label>
                                <input type="text" id="ccbaQuan" name="ccbaQuan" class="form-control" value="<?=$data->ccbaQuan?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaAsdt" class="form-label">지정(등록일)</label>
                                <input type="date" id="ccbaAsdt" name="ccbaAsdt" class="form-control" value="<?=$data->ccbaAsdt?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaLcad" class="form-label">소재지 상세</label>
                                <input type="text" id="ccbaLcad" name="ccbaLcad" class="form-control" value="<?=$data->ccbaLcad?>">
                            </div>
                            <div class="form-group">
                                <label for="ccceName" class="form-label">시대</label>
                                <input type="text" id="ccceName" name="ccceName" class="form-control" value="<?=$data->ccceName?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaPoss" class="form-label">소유자</label>
                                <input type="text" id="ccbaPoss" name="ccbaPoss" class="form-control" value="<?=$data->ccbaPoss?>">
                            </div>
                            <div class="form-group">
                                <label for="ccbaCndt" class="form-label">지정해제일</label>
                                <input type="date" id="ccbaCndt" name="ccbaCndt" class="form-control" value="<?=$data->ccbaCndt?>">
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">이미지</label>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                            <?php if($data->image !== ""):?>
                            <div class="form-group">
                                <label for="imageDel" class="form-label">이미지제거</label>
                                <input type="checkbox" name="imageDel" id="imageDel">
                            </div>
                            <?php endif;?>
                            <div class="form-group">
                                <label for="content" class="form-label">설명</label>
                                <textarea name="content" id="content" cols="30" rows="10" class="p-0 form-control"><?=$data->content?></textarea>
                            </div>
                            <button class="button full red float-right" type="button" id="del_btn">삭제하기</button>
                            <button class="button full float-right" id="modCultureBtn">수정하기</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /콘텐츠 -->

        <script>
            document.querySelector("#del_btn").addEventListener("click",e=>{location.href="/delCultureProccess/<?=$data->id?>"});
        </script>