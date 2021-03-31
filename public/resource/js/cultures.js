class Cultures{
    constructor(){
        this.totalPage = 1;
        this.totalCouht = 1;
        this.page = 1;
        this.start = 1;
        this.end = 1;
        this.blockLength = 10;
        this.listLength = 8;
        this.next = true;
        this.nextBlock = true;
        this.prev = true;
        this.prevBlock = true;

        this.listArea = document.querySelector("#cultures_body");
        this.buttonsArea = document.querySelector("#page_buttons");
        this.AllitemList = [];
        this.itemList = [];
        
        this.setting();
    }

    // xml & page buttons event 달기
    async setting(){
        this.AllitemList = await this.getXML();
        this.setPagination();
        document.querySelector("#page_prev").addEventListener("click",e=>{this.page-=1;this.setPagination()});
        document.querySelector("#page_block_prev").addEventListener("click",e=>{this.page = this.start-1;this.setPagination()});
        document.querySelector("#page_next").addEventListener("click",e=>{this.page+=1;this.setPagination()});
        document.querySelector("#page_block_next").addEventListener("click",e=>{this.page = this.end+1;this.setPagination()});
    }

    // 페이지네이션 적용
    setPagination(){
        this.next = true;
        this.nextBlock = true;
        this.prev = true;
        this.prevBlock = true;
        this.totalCouht = this.AllitemList.length;
        this.totalPage = Math.ceil(this.totalCouht / this.listLength);
        let block = Math.ceil(this.page / this.blockLength);
        this.end = block * this.blockLength;
        this.start = this.end - this.blockLength + 1;
        console.log(this.start, this.end);

        if(this.end >= this.totalPage){
            this.nextBlock = false;
            this.end = this.totalPage;
        }

        if(this.start <= 1){
            this.prevBlock = false;
            this.start = 1;
        }

        this.next = this.page + 1 > this.totalPage ? false : true;
        this.prev = this.page - 1 < 1 ? false : true;

        this.buttonsArea.innerHTML = "";

        if(this.next) $("#page_next").css({"display":"block"});
        else $("#page_next").css({"display":"none"});
        if(this.nextBlock) $("#page_block_next").css({"display":"block"});
        else $("#page_block_next").css({"display":"none"});
        if(this.prevBlock) $("#page_block_prev").css({"display":"block"});
        else $("#page_block_prev").css({"display":"none"});
        if(this.prev) $("#page_prev").css({"display":"block"});
        else $("#page_prev").css({"display":"none"});

        for(let i = this.start; i <= this.end; i++){
            let flag = this.page == i ? "select" : "";
            this.buttonsArea.innerHTML += `<button class="page_btn ${flag}">${i}</button>`;
        }

        document.querySelectorAll("#page_buttons .page_btn").forEach(x=>{
            x.addEventListener("click",e=>{
                let idx = e.target.innerHTML;
                this.page = idx;
                this.setPagination();
            })
        });

        this.itemList = this.AllitemList.slice((this.page - 1) * this.listLength,(this.page - 1) * this.listLength + this.listLength);
        this.setPage();
    }

    // 페이지만들기
    setPage(){
        document.querySelector("#all_count").innerHTML = this.totalCouht;
        document.querySelector("#all_page").innerHTML = this.totalPage;
        document.querySelector("#now_page").innerHTML = this.page;

        this.listArea.innerHTML = "";
        this.itemList.forEach(x=>{this.makeItem(x)});
    }

    // 페이지 아이템 만들기
    makeItem({ccbamnm1,image}){
        let dom = document.createElement("div");
        dom.innerHTML = `<div class="cultures_item card_items">
                            <div class="img_box">
                            </div>
                            <h5 class="img_title">${ccbamnm1}</h5>
                        </div>`;
        if(image == "") dom.querySelector(".img_box").innerHTML = "no Image";
        else dom.querySelector(".img_box").innerHTML = `<img src="../xml/nihcImage/${image}">`;
        this.listArea.appendChild(dom.firstChild);
    }

    // XML가져오기
    getXML(){
        return fetch("../xml/nihList.xml")
                .then(res => res.text())
                .then(async textXML =>{
                    let parser = new DOMParser();
                    let xml = parser.parseFromString(textXML,"text/html");
                    let list = xml.querySelectorAll("item");
                    let totalCnt = xml.querySelector("totalcnt").innerHTML;
                    let result = [];
                    for(let i = 0; i < totalCnt; i++){
                        let item = list[i];
                        let data = {};
                        data.ccbakdcd = item.querySelector("ccbakdcd").innerHTML;
                        data.ccbaasno = item.querySelector("ccbaasno").innerHTML;
                        data.ccbactcd = item.querySelector("ccbactcd").innerHTML;
                        data.ccbamnm1 = item.querySelector("ccbamnm1").innerHTML;
                        data.ccbamnm1 = data.ccbamnm1.replace(/<!--\[CDATA\[/g,"");
                        data.ccbamnm1 = data.ccbamnm1.replace(/\]\]-->/g,"");
                        data.image = await this.getImage(`../xml/detail/${data.ccbakdcd}_${data.ccbactcd}_${data.ccbaasno}.xml`);
                        result.push(data);
                    } 

                    return result;
                });
    }

    // image가져오기
    getImage(link){
        return fetch(link)
                .then(res=> res.text())
                .then(txtXML =>{
                    let parser = new DOMParser();
                    let xml = parser.parseFromString(txtXML,"text/html");
                    let image = xml.querySelector("imageUrl").innerHTML;
                    return image;
                });
    }
}

let cultures = new Cultures();