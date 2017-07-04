	$().ready(function(e) {
        $("#navigation").superfish();
		 $('#server-kwicks,#case-kwicks').kwicks({maxSize:650,spacing:0,defaultKwick:0,behavior:'menu',spacing :0,duration:1000,isVertical:false,easing:'easeOutSine',autoResize:true});
		 $("#submit").click(function(){
		 var a = $("<a href='http://www.baidu.com/s?si=www.0531kly.com&cl=3&ct=2097152&tn=baidulocal&word="+$("#key").val()+"' target='_blank'>baidu</a>").get(0);
		 var e = document.createEvent('MouseEvents');
		 e.initEvent( 'click', true, true );
		 a.dispatchEvent(e);
	});
	/* Add code here*/
    });