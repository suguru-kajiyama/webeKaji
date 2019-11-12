//ajax通信
  //1か月分のデータ取得

  function get_month(url,y,m){
    $.ajax({
      url:url,
      type:'POST',
      data:{
        'kind':"month",
        'yyyy':y,
        'm':m
      }
    })
    .done( (data) => {
      let a = data.split(",");
      let ar =[];
      for(let i=0;i<a.length;i++){
        ar.push(a[i].split(" "));
      }for(let i=0;i<ar.length;i++){
        Calender.set_in_out_total(ar[i][0],ar[i][1],ar[i][2]);
      }console.log(data);
    })
    .fail( (data) =>{
      console.log("error");
    })
  }
  function get_day(url,y,m,d){
    $.ajax({
      url:url,
      type:'POST',
      data:{
        'kind':"month",
        'yyyy':y,
        'm':m,
        "d":d
      }
    })
    .done( (data) =>{
      $(".day").html(data);
    })
    .fail( (data) =>{
      console.log("error");
    })
  }
  //日毎のデータ取得
