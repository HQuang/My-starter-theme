function addToCart(itemId)
{
        $.ajax({
		type	:	'POST',
        url		:	'http://giaydanang.com/cart.php',
        //url		:	'http://vn11giaydanang/cart.php',
		data	:	{ id : itemId},
		success	:	function(qq)
		{ 
			if (qq.length)
			{
				var kq=qq.split('$$$$');
				$("#totalAmount").html(kq[0]);
				alert("Đã thêm vào giỏ hàng");
			}
		}
	});  
}
/*Giỏ hàng 1*/
function addToCart1(itemId,soluong,size)
{
        $.ajax({
		type	:	'POST',
		//url		:	'http://vn11giaydanang/cart1.php',
        url		:	'http://giaydanang.com/cart1.php',
		data	:	{ id : itemId,so_luong : soluong,size:size},
		success	:	function(qq)
		{ 
			if (qq.length)
			{
				var kq=qq.split('$$$$');
				$("#totalAmount").html(kq[0]);
				alert("Đã thêm vào giỏ hàng");
			}
		}
	}); 
}
/*Giỏ hàng 2*/
function addToCart2(itemId,soluong,size)
{
        $.ajax({
		type	:	'POST',
		//url		:	'http://vn11giaydanang/cart1.php',
        url		:	'http://giaydanang.com/cart1.php',
		data	:	{ id : itemId,so_luong : soluong,size:size},
		success	:	function(qq)
		{ 
			if (qq.length)
			{
				var kq=qq.split('$$$$');
				$("#totalAmount").html(kq[0]);
				//alert("Đã thêm vào giỏ hàng");
                location = "http://giaydanang.com/gio-hang/";
                //location = "http://giaydanang.com/gio-hang/";
			}
		}
	}); 
}
/*Giỏ hàng 1*/
$("input[name$='payment']").change(function() {
    var test = $(this).val();
    $("div.active_bank").hide();
    $("#payment_bank" + test).show();
});
/*Check thanh toan*/


$(document).on("click","a.botton").on("click","a.botton",function(event){
    event.preventDefault();
    addToCart1($(this).attr('rel'),document.frm3.so_luong.value,document.frm3.size.value);
});


function FormatNumber(str){
var strTemp = GetNumber(str);
if(strTemp.length <= 200)
    return strTemp;
strResult = "";
for(var i =0; i< strTemp.length; i++)
    strTemp = strTemp.replace(",", "");
    strTemp = strTemp.replace(".", "");

for(var i = strTemp.length; i>=0; i--)
{
    if(strResult.length >0 && (strTemp.length - i -1) % 3 == 0)
        strResult = "," + strResult;
    strResult = strTemp.substring(i, i + 1) + strResult;
}	
return strResult;
}
function GetNumber(str)
{
    for(var i = 0; i < str.length; i++)
    {	
        var temp = str.substring(i, i + 1);		
        if(!(temp == "," || temp == "." || (temp >= 0 && temp <=9)))
        {
            alert("Chỉ được nhập vào là số");
            return str.substring(0, i);
        }
        if(temp == " ")
            return str.substring(0, i);
    }
    return str;
}
function IsNumberInt(str)
{
    for(var i = 0; i < str.length; i++)
    {	
        var temp = str.substring(i, i + 1);		
        if(!(temp == "," || temp == "." || (temp >= 0 && temp <=9)))
        {
            alert("Chỉ được nhập vào là số");
            return str.substring(0, i);
        }
        if(temp == " " || temp == "," || temp == ".")
            return str.substring(0, i);
    }
    return str;
}
function IsNumberFloat(str)
{
    for(var i = 0; i < str.length; i++)
    {	
        var temp = str.substring(i, i + 1);		
        if(!(temp == "," || temp == "." || (temp >= 0 && temp <=9)))
        {
            alert("Chỉ được nhập vào là số");
            return str.substring(0, i);
        }
        if(temp == " " || temp == ",")
            return str.substring(0, i);
    }
    return str;
}