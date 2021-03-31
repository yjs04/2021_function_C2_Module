class Phone{
    constructor(){
        this.phoneNav = document.querySelector("#phone_nav_area");
        this.phoneNavList = [];
        this.phoneArea = document.querySelector("#phone_area");
        this.phoneList = {};
        this.selNav = "전체"; 
        this.setting();
    }

    // 페이지 처음 세팅
    async setting(){
        let {statusCd,items,statusMsg,totalCount} = await this.getPhone();
       
        // 상태코드 200 아님
        if(statusCd !== "200"){
            document.querySelector("#wrap").innerHTML = statusMsg;
            alert(statusMsg);
            location.href= "/index.html";
        }else{
        // 상태코드 200임
            this.phoneNavList.push("전체");
            items.forEach(x=>{
                if(this.phoneNavList.findIndex(item=>item == x.deptNm) == -1){
                    this.phoneNavList.push(x.deptNm);
                    this.phoneList[x.deptNm] = [];
                }
                this.phoneList[x.deptNm].push(x);
            });

            this.setPage();
        }
    }

    // 페이지 목록 다시 넣기
    setPage(){
        this.phoneArea.innerHTML = "";
        this.phoneNav.innerHTML = "";

        this.phoneNavList.forEach(x=>{this.makeNavItem(x);});
        this.makePhoneList(this.selNav);
    }

    // 전화번호 리스트 넣기
    makePhoneList(title){
        let list = title == "전체" ? this.phoneList : this.phoneList[title];
        // 전체인경우
        if(title == "전체"){
            this.phoneNavList.forEach(x=>{
                if(x == "전체") return false;
                let item = this.phoneList[x];
                let dom = document.createElement("div");
                dom.innerHTML = `<div class="phone_list">
                                    <h5 class="phone_list_title">${x}</h5>
                                    <div class="phone_items">
                                    </div>
                                </div>`;
                if(item.length) item.forEach(x=>{dom.querySelector(".phone_items").innerHTML += `<div class="phone_item"><span>${x.name}</span><span>|</span><span>${x.telNo}</span></div>`});
                else document.querySelector(".phone_items").innerHTML = "<p class='p-4'>관련 정보가 없습니다.</p>";
                this.phoneArea.appendChild(dom.firstChild);
            });
        // 전체 아닌경우
        }else{
            let dom = document.createElement("div");
            dom.innerHTML = `<div class="phone_list">
                                <h5 class="phone_list_title">${title}</h5>
                                <div class="phone_items">
                                </div>
                            </div>`;
            if(list.length) list.forEach(x=>{dom.querySelector(".phone_items").innerHTML += `<div class="phone_item"><span>${x.name}</span><span>|</span><span>${x.telNo}</span></div>`});
            else document.querySelector(".phone_items").innerHTML = "<p class='p-4'>관련 정보가 없습니다.</p>";
            this.phoneArea.appendChild(dom.firstChild);
        }
    }

    // 목록 생성
    makeNavItem(title){
        let flag = this.selNav == title ? "select" : "";
        let dom = document.createElement("div");
        dom.innerHTML = `<div class="phone_nav_item ${flag}">${title}</div>`;
        dom.querySelector(".phone_nav_item").addEventListener("click",e=>{
            let target = e.target.innerHTML;
            this.selNav = target;
            this.setPage();
        });
        this.phoneNav.appendChild(dom.firstChild);
    }

    // restAPI가져오기
    getPhone(){return fetch("../restAPI/phone.php").then(res=>res.json())}
}

let phone = new Phone();