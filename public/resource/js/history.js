class History{
    constructor(){
        this.since = this.getLocal("since") == null ? 2021 : this.getLocal("since");
        this.navList = this.getLocal("navList") == null ? [] : this.getLocal("navList");
        this.sinceList = this.getLocal(this.since) == null ? [] : this.getLocal(this.since);

        this.navArea = document.querySelector("#history_nav");
        this.historyList = document.querySelector("#history_list");
        this.historyTitle = document.querySelector("#history_title");
        this.setPage();
        this.setEvent();
    }

    // 로컬스토리지 관련 함수
    getLocal(table){ return JSON.parse(localStorage.getItem(table))}
    setLocal(table,data){localStorage.setItem(table,JSON.stringify(data))}
    removeLocal(table){localStorage.removeItem(table)}

    // 이벤트 설정
    setEvent(){
        document.querySelector("#add_proccess").addEventListener("click",()=>{this.add_proccess()});
        document.querySelector("#mod_proccess").addEventListener("click",(e)=>{this.mod_proccess(e.target.dataset.idx)});
    }

    // 망할 정렬^^
    dateSort(list){
        let temp;
        list = JSON.parse(JSON.stringify(list));
        for(let i = 0; i < list.length; i++){
            for(let j = 0; j < i; j++){
                if(Date.parse(list[j].date) > Date.parse(list[j+1].date)){
                    temp = (list[j]);
                    list[j] = list[j+1];
                    list[j+1] = temp;
                }
            }
        }
        return list;
    }

    // 망할 정렬^^
    NavSort(list){
        let temp;
        for(let i = 0; i < list.length; i++){
            for(let j = 0; j < list.length; j++){
                if(list[j] < list[j+1]){
                    temp = (list[j]);
                    list[j] = list[j+1];
                    list[j+1] = temp;
                }
            }
        }
        return list;
    }

    // 페이지설정
    setPage(){
        this.navArea.innerHTML = "";
        this.historyList.innerHTML = "";
        this.historyTitle.innerHTML = this.since;

        if(this.navList.length == 0) document.querySelector("#history_body").innerHTML = `<div class="noData p-3 mt-5">관련 정보가 없습니다.</div>`;
        else{
            this.navList = this.NavSort(this.navList);
            this.navList.forEach(x=>{this.makeNavItem(x)});
            this.sinceList = this.dateSort(this.sinceList);
            this.sinceList.forEach((x,idx)=>{this.makeHistoryItem(idx,x.date,x.title);});
        }
    }

    // 연혁 추가
    add_proccess(){
        let form = document.querySelector("#add_form");
        let date = form.add_date.value,title = form.add_title.value;
        let year = date.substr(0,4),list = this.getLocal(year) == null ? [] : this.getLocal(year);

        this.since = year;
        this.setLocal("since",year);
        if(this.navList.find(x=>x==year)){
            list.push({"title":title,"date":date});
            list = this.dateSort(list);
            this.setLocal(year,list);
            this.sinceList = list;
        }else{
            list.push({"title":title,"date":date});
            this.setLocal(year,list);
            this.sinceList = list;
            this.navList.push(year);
            this.navList = this.NavSort(this.navList);
            this.setLocal("navList",this.navList);
        }

        document.querySelector("#add_close").click();
        form.add_date.value = "";
        form.add_title.value = "";
        alert("연혁이 등록되었습니다.");
        this.setPage();
        location.reload();
    }

    // 연혁 수정
    mod_proccess(idx){
        let last_data = this.sinceList[idx];
        let form = document.querySelector("#mod_form");
        let data = {"title":form.mod_title.value,"date":form.mod_date.value};
        let last_year = last_data.date.substr(0,4),year = data.date.substr(0,4);

        this.since = year;
        if(last_year == year){
            this.sinceList[idx] = data;
            this.sinceList = this.dateSort(this.sinceList);
            this.setLocal(year,this.sinceList);
        }else{
            let list = this.getLocal(last_year);
            list.splice(idx,1);
            if(list.length) this.setLocal(last_year,list);
            else{
                this.removeLocal(last_year);
                this.navList.splice(this.navList.findIndex(x => x == last_year),1);
                this.setLocal("navList",this.navList);
            }

            if(this.navList.findIndex(x=> x == year) !== -1){
                this.sinceList = this.getLocal(year);
                this.sinceList.push(data);
                list = this.dateSort(list);
                this.setLocal(year,this.sinceList);
            }else{
                this.navList.push(year);
                this.navList = this.NavSort(this.navList);
                this.setLocal("navList",this.navList);
                this.sinceList = [data];
                this.setLocal(year,this.sinceList);
            }
        }

        document.querySelector("#mod_close").click();
        alert("해당 연혁이 수정되었습니다.");
        this.setPage();
    }

    // 연혁 삭제
    del_proccess=e=>{
        let idx = e.target.dataset.idx;
        let year = this.sinceList[idx].date.substr(0,4);
        if(confirm("해당 연혁을 삭제하시겠습니까?")){
            this.sinceList.splice(idx,1);
            
            if(this.sinceList.length) this.setLocal(year,this.sinceList);
            else{
                this.removeLocal(year);
                this.navList.splice(this.navList.findIndex(x=>x == year),1);
                this.setLocal("navList",this.navList);
                this.since = this.navList.length ? this.navList[0] : "";
                this.setLocal("since",this.since);
                this.sinceList = this.getLocal(this.since);
            }

            alert("해당 연혁이 삭제되었습니다.");
            this.setPage();
        }
    }

    // 연혁 수정 팝업 설정
    mod_set=e=>{
        let idx = e.target.dataset.idx;
        let {title,date} = this.sinceList[idx];
        let form = document.querySelector("#mod_form");
        form.mod_title.value = title;
        form.mod_date.value = date;
        document.querySelector("#mod_proccess").setAttribute("data-idx",idx);
    }

    // 연혁 네비게이션 제작
    makeNavItem(title){
        let flag = title == this.since ? "select" : "";
        let dom = document.createElement("div");
        dom.innerHTML = `<div class="history_nav_item ${flag}">${title}</div>`;
        dom.querySelector(".history_nav_item").addEventListener("click",e=>{
            this.since = e.target.innerHTML;
            this.setLocal("since",e.target.innerHTML);
            this.sinceList = this.getLocal(this.since);
            this.setPage();
        });

        this.navArea.appendChild(dom.firstChild);
    }

    // 연혁 아이템 제작
    makeHistoryItem(idx,date,title){
        let month = date.split("-")[1]+"."+date.split("-")[2];
        let dom = document.createElement("div");
        dom.innerHTML = `<div class="history_item">
                            <div class="history_content">
                                <span class="history_date">${month}</span>
                                <p class="history_title">${title}</p>
                            </div>
                            <div class="history_buttons">
                                <button data-idx="${idx}" class="button full mod_btn" data-toggle="modal" data-target="#mod_popup">수정</button>
                                <button data-idx="${idx}" class="button full red del_btn">삭제</button>
                            </div>
                        </div>`;
        dom.querySelector(".mod_btn").addEventListener("click",this.mod_set);
        dom.querySelector(".del_btn").addEventListener("click",this.del_proccess);
        this.historyList.appendChild(dom.firstChild);
    }
}

let history = new History();