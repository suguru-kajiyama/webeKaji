//static hensu
var date = new Date();
var y = date.getFullYear();
var m = date.getMonth()+1;//0-11なので
var d = date.getDate();

let week =["sun","mon","thu","wed","thr","fri","sat",];
//namespace calender
var Calender = {
	//〜年〜月の表示
  show_ym: function() {
    let dom = `${y}年${m}月`;
    $("#date").text(dom);
  },
  //枠組みの表示
  show_cal_cell: function() {
    var mm =""+m;
      if(m<10){
      mm = "0"+m;
    }
    let dom = "";
    //各曜日の枠
    for(let i=0;i<7;i++){
    	dom += `<div class="head"id=day_${i}><h4>${week[i]}</h4></div>`;
    }
    let firdate = new Date(y,m-1,1);
    let lastdate = new Date(y,m,0);
    $("#cal_cell").html(dom);
    //ダミー
    let s = firdate.getDay();
    for(let i=0;i<s;i++){
    	$(`#day_${i}`).append("<div class='cell dummy'></div>");
    }//
    for(let i=1;i<=lastdate.getDate();i++){
      var dd= ""+i;
      if(i<10){
        dd=`0${i}`;
      }
    	let temp = `<div class="cell" id="day_${y}-${mm}-${dd}">`+
   						`<h5 class="d">${i}</h5>`+
              `<p class="in mon">0</p>`+
              `<p class="out mon">0</p>`+
              `<p class="total mon">0</p>`+
              `</div>`;
    	$(`#day_${s%7}`).append(temp);
      (s=(s+1)%7);
    }for(let i=s;i<7;i++){
      $(`#day_${i}`).append("<div class='cell dummy'></div>");
    }

  },
  //1月の 収支の表示
  set_in_out_total : function(date,inOut,money){
    money = parseInt(money);
    in_money =  parseInt( $(`#day_${date}`).find(".in").text() );
    out_money = parseInt( $(`#day_${date}`).find(".out").text() );
  	if(inOut == 1){
      $(`#day_${date}`).find(".in").text(money + in_money);
    }else if(inOut == -1){
      $(`#day_${date}`).find(".out").text(money + out_money);
    }
    console.log($(`#day_${date}`).find(".in").text());
    $(`#day_${date}`).find(".total").text(in_money-out_money + inOut*money);
  },//1日の収支
  //main
  main :function(){
    this.show_ym();
    this.show_cal_cell();
    //this.show_DailyBalance();
  }
}
function event() {
  $("#prev").on("click", function() {
    m--;
    if (m == 0) {
      m = 12;
      y--;
    }
    Calender.main();
    get_month("controller/balance.php",y,m);
  	//Calender.set_in_out_total(arr[0],arr[1],arr[2]);
  });
  $("#next").on("click", function() {
    m++;
    if (m == 13) {
      m = 1;
      y++;
    }
    Calender.main();
    get_month("controller/balance.php",y,m);
    //Calender.set_in_out_total(arr[0],arr[1],arr[2]);
  })
  $("#cal").on("click",".cell",function(){
    let dd = $(this).find(".d").text();
    get_day("view/daily_balance.php",y,m,dd);
    console.log($(this).find(".in").text());
    /*for(let i=0;i<ar.length;i++){
      Calender.set_in_out_money(ar[0],ar[1],ar[2]);
    }*/
  })
  $("#sub").on("click",function(){
    console.log("push");
  })
}
$(function() {
  Calender.main();
  get_month("controller/balance.php",y,m);
  get_day("view/daily_balance.php",y,m,d);
  event();
  //var arr= ajax.get_balance(y,m);
})
//
