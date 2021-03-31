
<!-- 콘텐츠 -->
<div id="content">
            <div class="container">
                <div class="content_wrap" id="cultures">
                    <div class="content_title">
                        <h2>공연 일정 조회 <span>공개데이터 <i class="fas fa-angle-right"></i> 공연 일정 조회</span></h2>
                    </div>
                    <div class="content_box">
                        <div class="openHeader">
                            <h5>주소 : /openAPI/showList.php</h5>
                        </div>
                        <div class="openBody">
                            <div class="openItem">
                                <h5 class="openTitle">요청 전문 명세서</h5>
                                <table class="style_table">
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
                                            <td>searchType</td>
                                            <td>조회 구분</td>
                                            <td>필수</td>
                                            <td>M</td>
                                            <td>M:월별,Y:년도별</td>
                                        </tr>
                                        <tr>
                                            <td>year</td>
                                            <td>년도</td>
                                            <td>필수</td>
                                            <td>2021</td>
                                            <td>4자리 년도</td>
                                        </tr>
                                        <tr>
                                            <td>month</td>
                                            <td>월</td>
                                            <td>가변</td>
                                            <td>4</td>
                                            <td>월별 조회 시 필수(1~12)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="openItem">
                                <h5 class="openTitle">응답 전문 명세서</h5>
                                <table class="style_table">
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
                                            <td>showType</td>
                                            <td>공연 종류</td>
                                            <td>필수</td>
                                            <td>M</td>
                                            <td>요청 공연 종류</td>
                                        </tr>
                                        <tr>
                                            <td>year</td>
                                            <td>년도</td>
                                            <td>필수</td>
                                            <td>2021</td>
                                            <td>요청년도</td>
                                        </tr>
                                        <tr>
                                            <td>month</td>
                                            <td>월</td>
                                            <td>가변</td>
                                            <td>4</td>
                                            <td>요청 월</td>
                                        </tr>
                                        <tr>
                                            <td>totalCount</td>
                                            <td>항목수</td>
                                            <td>필수</td>
                                            <td>17</td>
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
                                            <td>showUid</td>
                                            <td>공연 고유번호</td>
                                            <td>필수</td>
                                            <td>1</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>showName</td>
                                            <td>공연명</td>
                                            <td>필수</td>
                                            <td>신노이</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>showDt</td>
                                            <td>공연일시</td>
                                            <td>필수</td>
                                            <td>2020-02-13 22:11:11</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>필수</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>필수</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>필수</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>필수</td>
                                            <td></td>
                                            <td></td>
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