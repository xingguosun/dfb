<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>后生上门洗车</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="/assets/css/template.css"/>
<link rel="stylesheet" href="/assets/css/base.css"/>
<link rel="stylesheet" href="/assets/css/washcar.css"/>
<script src="/assets/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="/assets/js/common.js" type="text/javascript"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=N9eiFDikvcAKMBa3cCUxcNwH"></script>
</head>
<body>
<div id="orderform">
	<div class="layer tip">
		预计今天<span id="estimateTime">--</span>点完成洗车
	</div>
	<div class="layer">
		<form action="/home/order" onsubmit="return checkOrder();" method="post" enctype="multipart/form-data">
			<input id="userid" name="userid" type="hidden" value="<?php echo $_SESSION['userid'];?>">
			<input id="fee" name="fee" type="hidden" value="1500">
			<ul class="input-field">
				<li class="input-field-item">
					<div class="field-icon">
						<img src="/assets/images/car/u136.png" width="18" height="32">
					</div>
					<div class="field-name">
						手机号
					</div>
					<div class="field-input">
						<input id="phone" name="phone" type="text" value="<?php echo $_SESSION['phone'];?>" disabled>
					</div>
				</li>
				<li class="input-field-item">
					<div class="field-icon">
						<img src="/assets/images/car/u138.png" width="24" height="24">
					</div>
					<div class="field-name">
						称呼
					</div>
					<div class="field-input">
						<input id="name" name="name" value="<?php echo $_SESSION['name'];?>" placeholder="请输入称呼" type="text">
					</div>
				</li>
				<li class="input-field-item">
					<div class="field-icon">
						<img src="/assets/images/car/u148.png" width="22" height="25">
						<p>牌</p>
					</div>
					<div class="field-name">
						车牌号
					</div>
					<div class="field-input">
						<input id="licensenumber" name="licensenumber" placeholder="请输入车牌号" type="text">
					</div>
				</li>
				<li class="input-field-item">
					<div class="field-icon">
						<img src="/assets/images/car/u144.png" width="26" height="23">
					</div>
					<div class="field-name">
						车型
					</div>
					<div class="field-input">
						<input id="type" name="type" placeholder="请输入车型" type="text">
					</div>
				</li>
				<li class="input-field-item">
					<div class="field-icon">
						<img src="/assets/images/car/u150.png" width="25" height="25">
						<p>色</p>
					</div>
					<div class="field-name">
						颜色
					</div>
					<div class="field-input">
						<input id="color" name="color" placeholder="请输入颜色" type="text">
					</div>
				</li>
				<li class="input-field-item">
					<div class="field-icon">
						<img src="/assets/images/car/u140.png" width="20" height="27">
					</div>
					<div class="field-name">
						位置
					</div>
					<div class="field-input">
						<input id="position" name="position" placeholder="请输入地址" type="text">
					</div>
				</li>
				<li class="input-field-item">
					<div class="field-icon">
						<img src="/assets/images/car/u144.png" width="26" height="23">
					</div>
					<div class="field-name">
						类型
					</div>
					<div class="field-input">
						<!--<label for="trim">车内简洗（需在车旁等待）</label><input id="trim" name="trim[]" value="has" type="checkbox">-->
						<select name="washtype">
							<option value="1">小车外洗10元</option>
							<option value="2">小车内外洗15元</option>
							<option value="3">越野外洗15元</option>
							<option value="4">越野内外洗20元</option>
							<option value="0">洗完付款</option>
						</select>
					</div>
				</li>
				<li class="input-field-item">
					<div class="field-icon">
						<img src="/assets/images/car/u142.png" width="25" height="25">
					</div>
					<div class="field-name">
						备注
					</div>
					<div class="field-input">
						<input id="note" name="note" placeholder="请输入备注" type="text">
					</div>
				</li>
			</ul>
			<input type="submit" value="立即下单" class="order-btn">
		</form>
	</div>
</div>
	<iframe id="allmap" src="/home/location" style="display:none;">
		
	</iframe>
</body>
<script type="text/javascript">
$(document).ready(function(){
	var myDate = new Date();
	$("#estimateTime").text(myDate.getHours()+3);
});
function checkOrder(){
	if($("#name").val().length<1){
		alert('请输入称呼！');
		return false;
	}
	if($("#licensenumber").val().length<1){
		alert('请输入车牌号！');
		return false;
	}
	if($("#position").val().length<1){
		alert('请输入地址！');
		return false;
	}
	return true;
	// var order = new Object();
	// order.infoType = 'order';
	// order.userid = $("#userid").val();
	// order.name = $("#name").val();
	// order.licensenumber = $("#licensenumber").val();
	// order.type = $("#type").val();
	// order.color = $("#color").val();
	// order.position = $("#position").val();
	// order.trim = $("#trim").prop('checked');
	// order.note = $("#note").val();
	// order.fee = $("#fee").val();
	// dataHandler("/home/wxpay",order,null,null,null,successOrder,false,true);

	// var url = '/home/order';
	// url+='?userid='+$("#userid").val();
	// url+='&name='+$("#name").val();
	// url+='&licensenumber='+$("#licensenumber").val();
	// url+='&type='+$("#type").val();
	// url+='&color='+$("#color").val();
	// url+='&position='+$("#position").val();
	// url+='&trim='+$("#trim").prop('checked');
	// url+='&note='+$("#note").val();
	// url+='&fee='+$("#fee").val();
	// location.href=url;
	// alert(url);
}
// function successOrder(data){
// 	alert('预约成功！');
// 	location.href="/home/wxpay?ordernumber="+data.ordernumber+"&fee="+data.fee;
// }
function chooseMap(){
	$('#orderform').hide();$('#allmap').show();
    // // 百度地图API功能
    // var map = new BMap.Map("allmap");
    // var point = new BMap.Point(116.331398,39.897445);
    // map.centerAndZoom(point,12);

    // var geolocation = new BMap.Geolocation();
    // geolocation.getCurrentPosition(function(r){
    //     if(this.getStatus() == BMAP_STATUS_SUCCESS){
    //         var mk = new BMap.Marker(r.point);
    //         map.addOverlay(mk);
    //         map.panTo(r.point);
    //         //alert('您的位置：'+r.point.lng+','+r.point.lat);
    //         var point = new BMap.Point(r.point.lng, r.point.lat);    // 创建点坐标
    //         //map.centerAndZoom(point,15);                     // 
    //         //map.enableScrollWheelZoom(); 
    //         var gc = new BMap.Geocoder();
    //         gc.getLocation(point, function(rs){
    //             var addComp = rs.addressComponents;
    //             var address=addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber;
    //             // for (var i in addComp){
    //             //     alert(i);            // 输出属性名：  attribute，method
    //             //    // alert(addComp[i])        // 输出属性的值：1和函数的内容
    //             // }
    //             //alert(address);
    //             //window.opener.document.getElementById('position').value=address;
    //             //window.close();
    //             //$('#orderform').show();$('#allmap').hide();
    //         });
    //     }
    //     else {
    //         alert('failed'+this.getStatus());
    //     }
    // },{enableHighAccuracy: true}) 
}
</script>
</html>