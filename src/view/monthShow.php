
<!-- 콘텐츠 -->
<div id="content">
            <div class="container">
                <div class="content_wrap">
                    <div class="content_title" id="monthShow">
                        <h2>월간 공연 일정 <span>공연 <i class="fas fa-angle-right"></i> 월간 공연 일정</span></h2>
                    </div>
                    <div class="content_box">
                        <div id="calendar_header" class="position-relative">
                            <button class="page_btn" data-href="<?=$calendar['prevQ']?>"><i class="fas fa-angle-left"></i></button>
                            <h5><?=$year?>.<?=$month?></h5>
                            <button class="page_btn" data-href="<?=$calendar['nextQ']?>"><i class="fas fa-angle-right"></i></button>
                            <button class="button" id="calendar_add">등록</button>
                        </div>
                        <div id="calendar_body">
                            <table id="calendar">
                                <thead>
                                    <tr>
                                        <th>Sun</th>
                                        <th>Mon</th>
                                        <th>Tue</th>
                                        <th>Web</th>
                                        <th>Thr</th>
                                        <th>Fri</th>
                                        <th>Sat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $day = $calendar['start'];?>
                                    <?php while($day <= $calendar["end"]):?>
                                    <?php if(date("w",$day) == 0):?>
                                    <tr>
                                    <?php endif;?>
                                        <td class="<?= ($day < $calendar['first']) || ($day > $calendar['last']) ? "hide" : "" ?>">
                                            <p class="calendar_title"><?=date("d",$day)?></p>
                                            <div class="calendar_list"></div>
                                        </td>
                                    <?php if(date("w",$day) == 6):?>
                                    </tr>
                                    <?php endif;?>
                                    
                                    <?php $day = strtotime(date("Y-m-d",$day)."+1 day");?>
                                    <?php endwhile;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /콘텐츠 -->

        <script>
            document.querySelectorAll(".page_btn").forEach(x=>{x.addEventListener("click",e=>{location.href=e.currentTarget.dataset.href;})})
        </script>