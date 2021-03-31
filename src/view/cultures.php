
<!-- 콘텐츠 -->
<div id="content">
            <div class="container">
                <div class="content_wrap" id="cultures">
                    <div class="content_title">
                        <h2>무형문화재현황 <span>무형문화재현황</span></h2>
                    </div>
                    <div class="content_box list">
                        <div id="cultures_header">
                            <h5 id="cultures_page_info">총 <span id="all_count"><?=$data['count']?></span>건 <span id="now_page"><?=$data['page']?></span>p / <span id="all_page"><?=$totalPage?></span>p</h5>
                            <div id="cultures_list_type">
                                <button class="button mr-4" id="cultures_add">등록</button>
                                <button data-href="/cultures?type=list<?=$data['bcode'] == "" ? "" : "&bcode=".$data['bcode']?>" class="type_btn button full <?=$type == "list" ? "select" : ""?>">목록</button>
                                <button data-href="/cultures?type=album<?=$data['bcode'] == "" ? "" : "&bcode=".$data['bcode']?>" class="type_btn button full <?=$type == "album" ? "select" : ""?>">앨범</button>
                            </div>
                        </div>
                        <!-- 리스트 -->
                        <div id="cultures_body" class="<?=$type?>">
                        <?php if($type == "list"):?>
                            <table id="cultures_list" class="style_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>종목</th>
                                        <th>명칭</th>
                                        <th>소재지</th>
                                        <th>관리자(단체)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data["items"] as $item):?>
                                <tr data-href="/modCulture/<?=$item->id?>" class="items">
                                    <td><?=$item->id?></td>
                                    <td><?=$item->ccmaName?></td>
                                    <td><?=$item->ccbaMnm1?></td>
                                    <td><?=$item->ccbaCtcdNm?></td>
                                    <td><?=$item->ccbaLcad?></td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        <?php else:?>
                            <?php foreach($data['items'] as $item):?>
                            <div class="items cultures_item card_items" data-href="/modCulture/<?=$item->id?>">
                                <div class="img_box">
                                <?php if($item->image == ""):?>
                                    no Image
                                <?php else:?>
                                <img src="<?=base64_upload($item->image);?>" alt="image" title="image">
                                <?php endif;?>
                                </div>
                                <h5 class="img_title"><?= $item->ccbaMnm1 ?></h5>
                            </div>
                            <?php endforeach;?>
                        <?php endif;?>
                        </div>
                        <!-- /리스트 -->
                        <!-- 페이지네이션 -->
                        <div id="cultures_footer">
                            <?php if($data['prev_block']):?>
                            <button class="page_btn" id="page_block_prev" data-href="/cultures?page=<?=$data['start']-1?><?=$data['bcode'] == "" ? "" : "&bcode=".$data['bcode'] ?><?="&type=".$type?>"><i class="fas fa-angle-double-left"></i></button>
                            <?php endif;?>
                            <?php if($data['prev']):?>
                            <button class="page_btn" id="page_prev" data-href="/cultures?page=<?=$data['page']-1?><?=$data['bcode'] == "" ? "" : "&bcode=".$data['bcode'] ?><?="&type=".$type?>"><i class="fas fa-angle-left"></i></button>
                            <?php endif;?>
                            <div id="page_buttons">
                                <?php for($i = $data['start']; $i <= $data['end']; $i++):?>
                                <button class="page_btn <?=$data['page'] == $i ? "select" : ""?>" data-href="/cultures?page=<?=$i?><?=$data['bcode'] == "" ? "" : "&bcode=".$data['bcode'] ?><?="&type=".$type?>"><?=$i ?></button>
                                <?php endfor;?>
                            </div>
                            <?php if($data['next']):?>
                            <button class="page_btn" id="page_next" data-href="/cultures?page=<?=$data['page']+1?><?=$data['bcode'] == "" ? "" : "&bcode=".$data['bcode'] ?><?="&type=".$type?>"><i class="fas fa-angle-right"></i></button>
                            <?php endif;?>
                            <?php if($data["next_block"]):?>
                            <button class="page_btn" id="page_block_next" data-href="/cultures?page=<?=$data['end']+1?><?=$data['bcode'] == "" ? "" : "&bcode=".$data['bcode'] ?><?="&type=".$type?>"><i class="fas fa-angle-double-right"></i></button>
                            <?php endif;?>
                        </div>
                        <!-- 페이지네이션 -->                        
                    </div>
                    <!-- <script src="/resource/js/cultures.js"></script> -->
                </div>
            </div>
        </div>
        <!-- /콘텐츠 -->

        <script>
            document.querySelectorAll(".page_btn").forEach(x=>{
                x.addEventListener("click",e=>{location.href=e.target.dataset.href;});
            });

            document.querySelectorAll(".type_btn").forEach(x=>{
                x.addEventListener("click",e=>{location.href=e.target.dataset.href;});
            });

            document.querySelector("#cultures_add").addEventListener("click",()=>{location.href='/addCulture'});
            document.querySelectorAll(".items").forEach(x=>{
                x.addEventListener("click",e=>{location.href=e.currentTarget.dataset.href});
            })
        </script>