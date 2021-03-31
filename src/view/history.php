<!-- 콘텐츠 -->
<div id="content">
            <div class="container">
                <div class="content_wrap" id="history">
                    <div class="content_title">
                        <h2>연혁 <span>무형문화재관리원 <i class="fas fa-angle-right"></i> 일반현황 <i class="fas fa-angle-right"></i> 연혁</span></h2>
                    </div>
                    <div class="content_box">
                        <button class="button" id="history_add_open" data-target="#add_popup" data-toggle="modal">연혁 등록</button>
                        <div id="history_nav">
                            <div class="history_nav_item select">2021</div>
                            <div class="history_nav_item">2020</div>
                        </div>
                        <div id="history_body">
                            <h5 id="history_title"></h5>
                            <div id="history_list">
                            </div>
                        </div>
                    </div>

                    <!-- add popup -->
                    <div class="modal popup fade" id="add_popup">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">연혁 등록</h5>
                                    <button class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form id="add_form">
                                        <div class="form-group">
                                            <label for="add_title" class="form-label"><span class="text-danger mr-2">(*)</span>연혁내용</label>
                                            <input type="text" id="add_title" name="add_title" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="add_date" class="form-label"><span class="text-danger mr-2">(*)</span>연혁일자</label>
                                            <input type="date" id="add_date" name="add_date" class="form-control">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="button full gray" id="add_close" data-dismiss="modal">닫기</button>
                                    <button class="button full" id="add_proccess">저장</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /add popup -->

                    <!-- mod popup -->
                    <div class="modal popup fade" id="mod_popup">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">연혁 수정</h5>
                                    <button class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form id="mod_form">
                                        <div class="form-group">
                                            <label for="mod_title" class="form-label"><span class="text-danger mr-2">(*)</span>연혁내용</label>
                                            <input type="text" id="mod_title" name="mod_title" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="mod_date" class="form-label"><span class="text-danger mr-2">(*)</span>연혁일자</label>
                                            <input type="date" id="mod_date" name="mod_date" class="form-control">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="button full gray" id="mod_close" data-dismiss="modal">닫기</button>
                                    <button class="button full" id="mod_proccess">저장</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /mod popup -->

                    <script src="/resource/js/history.js"></script>
                </div>
            </div>
        </div>
        <!-- /콘텐츠 -->