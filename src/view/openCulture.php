
<!-- 콘텐츠 -->
<div id="content">
            <div class="container">
                <div class="content_wrap" id="cultures">
                    <div class="content_title">
                        <h2>무형문화재현황 조회 <span>공개데이터 <i class="fas fa-angle-right"></i> 무형문화재현황 조회</span></h2>
                    </div>
                    <div class="content_box">
                        <div class="openHeader">
                            <h5>주소 : /openAPI/nihList.php</h5>
                        </div>
                        <div class="openBody">
                            <div class="openItem">
                                <h5 class="openTitle">요청 전문 명세서</h5>
                                <table class="openTable style_table">
                                    <thead>
                                        <tr>
                                            <th>항목명</th>
                                            <th>국문명</th>
                                            <th>필수</th>
                                            <th>샘플</th>
                                            <th>항목설명</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>pageNo</td>
                                            <td>페이지 번호</td>
                                            <td>필수</td>
                                            <td>1</td>
                                            <td>요청 페이지 번호</td>
                                        </tr>
                                        <tr>
                                            <td>numOfRows</td>
                                            <td>페이지당 항목수</td>
                                            <td>필수</td>
                                            <td>3</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>bcodeName</td>
                                            <td>무형문화 종류</td>
                                            <td>-</td>
                                            <td>전통 공연</td>
                                            <td>포함(LIKE 검색)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="openItem">
                                <h5 class="openTitle">응답 전문 명세서</h5>
                                <table class="openTable style_table">
                                    <thead>
                                        <tr>
                                            <th>항목명</th>
                                            <th>국문명</th>
                                            <th>필수</th>
                                            <th>샘플</th>
                                            <th>항목설명</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>numOfRows</td>
                                            <td>페이지당 항목수</td>
                                            <td>필수</td>
                                            <td>3</td>
                                            <td>요청 항목 수</td>
                                        </tr>
                                        <tr>
                                            <td>pageNo</td>
                                            <td>페이지</td>
                                            <td>필수</td>
                                            <td>1</td>
                                            <td>요청 페이지 번호</td>
                                        </tr>
                                        <tr>
                                            <td>totalCount</td>
                                            <td>모든 항목수</td>
                                            <td>필수</td>
                                            <td>11</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>items</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>ccbaKdcd</td>
                                            <td>종목코드</td>
                                            <td>필수</td>
                                            <td>17</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccbaAsno</td>
                                            <td>지정번호</td>
                                            <td>필수</td>
                                            <td>170000</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccbaCtcd</td>
                                            <td>시도코드</td>
                                            <td>필수</td>
                                            <td>11</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccbaCpno</td>
                                            <td>연계번호</td>
                                            <td>-</td>
                                            <td>1270001100</td>
                                            <td>문화재연계번호</td>
                                        </tr>
                                        <tr>
                                            <td>ccmaName</td>
                                            <td>문화재종목</td>
                                            <td>필수</td>
                                            <td>국가무형문화재</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccbaMnm1</td>
                                            <td>문화재명(국문)</td>
                                            <td>필수</td>
                                            <td>봉산탈춤</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccbaMnm2</td>
                                            <td>문화재명(한자)</td>
                                            <td>-</td>
                                            <td>鳳山탈춤</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>gcodeName</td>
                                            <td>문화재분류</td>
                                            <td>-</td>
                                            <td>무형문화재</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>bcodeName</td>
                                            <td>문화재분류2(종류)</td>
                                            <td>-</td>
                                            <td>전통 공연·예술</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>mcdoeName</td>
                                            <td>문화재분류3</td>
                                            <td>연희</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>scodeName</td>
                                            <td>문화재분류4</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccbaQuan</td>
                                            <td>수량</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccbaAsdt</td>
                                            <td>지정(등록일)</td>
                                            <td>-</td>
                                            <td>1967-06-16</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccbaCtcdNm</td>
                                            <td>시도명</td>
                                            <td>-</td>
                                            <td>서울특별시</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccsiName</td>
                                            <td>시군구명</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccbaLcad</td>
                                            <td>소재지 상세</td>
                                            <td>-</td>
                                            <td>서울특별시</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccceName</td>
                                            <td>시대</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccbaPoss</td>
                                            <td>소유자</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccbaAdmin</td>
                                            <td>관리자</td>
                                            <td>-</td>
                                            <td>(사)봉산탈춤...</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccbaCncl</td>
                                            <td>지정해제여부</td>
                                            <td>-</td>
                                            <td>N</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>ccbaCndt</td>
                                            <td>지정해제일</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>image</td>
                                            <td>이미지</td>
                                            <td>-</td>
                                            <td>data:image/...</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>content</td>
                                            <td>설명</td>
                                            <td>-</td>
                                            <td>탈춤이란..</td>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /콘텐츠 -->