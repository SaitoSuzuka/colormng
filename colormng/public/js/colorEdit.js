/***
 * 編集画面
 */

//ロード時にカラーリストの読み込み
window.onload = function(){
	// ページ読み込み時に実行したい処理
	showColor();
}


//ラジオボタンが変更された時にカラーリストの読み込み
$(function() {
	$('[name="division"]:radio').change( function() {
    showColor();
	});
});


//input type="color"を出力する関数
function showColor(){
	if($('[id=div2]').prop('checked')){
	    $('.c').fadeOut(0);
	    $('.color1').fadeIn(0);
	    $('.color2').fadeIn(0);
	    $('.color3').style.display="block";
    } else if ($('[id=div3]').prop('checked')) {
	    $('.c').fadeOut(0);
	    $('.color2').fadeIn(0);
	    $('.color3').fadeIn(0);
    } else if ($('[id=div4]').prop('checked')) {
	    $('.c').fadeOut(0);
        $('.color2').fadeIn(0);
        $('.color3').fadeIn(0);
        $('.color4').fadeIn(0);
    } else if ($('[id=div5]').prop('checked')) {
    	$('.c').fadeOut(0);
        $('.color2').fadeIn(0);
        $('.color3').fadeIn(0);
        $('.color4').fadeIn(0);
        $('.color5').fadeIn(0);
    } else if ($('[id=div6]').prop('checked')) {
    	$('.c').fadeOut(0);
        $('.color2').fadeIn(0);
        $('.color3').fadeIn(0);
        $('.color4').fadeIn(0);
        $('.color5').fadeIn(0);
        $('.color6').fadeIn(0);
    }
}


//キャンセルボタン押下
function cancel() {
	if(window.confirm("一覧に戻ります。")){
		var form = document.frm;
		form.action = "/cancel";
		form.submit();
	}
}


//削除ボタン押下
function deleteColor(){
//	alert('delete??');
	if(window.confirm("削除しますか？")){
		return true;
	}
	return false;
}


//カラーピッカーの値を変更したら
function change(){
	var $a = document.getElementById( "color1" ).value;
	document.getElementById( "color1" ).value = $a;
	document.getElementById( "color11" ).value = $a;
	var $b = document.getElementById( "color2" ).value;
	document.getElementById( "color2" ).value = $b;
	document.getElementById( "color22" ).value = $b;
	var $c = document.getElementById( "color3" ).value;
	document.getElementById( "color3" ).value = $c;
	document.getElementById( "color33" ).value = $c;
	var $d = document.getElementById( "color4" ).value;
	document.getElementById( "color4" ).value = $d;
	document.getElementById( "color44" ).value = $d;
	var $e = document.getElementById( "color5" ).value;
	document.getElementById( "color5" ).value = $e;
	document.getElementById( "color55" ).value = $e;
	var $f = document.getElementById( "color6" ).value;
	document.getElementById( "color6" ).value = $f;
	document.getElementById( "color66" ).value = $f;

}


//textBoxにカラーコード直打ち→からピッカーの値が変わる
function inputColorCode() {
    var $color1 = document.getElementById( "color11" ).value;
    document.getElementById( "color1" ).value = $color1;
    var $color1 = document.getElementById( "color22" ).value;
    document.getElementById( "color2" ).value = $color1;
    var $color1 = document.getElementById( "color33" ).value;
    document.getElementById( "color3" ).value = $color1;
    var $color1 = document.getElementById( "color44" ).value;
    document.getElementById( "color4" ).value = $color1;
    var $color1 = document.getElementById( "color55" ).value;
    document.getElementById( "color5" ).value = $color1;
    var $color1 = document.getElementById( "color66" ).value;
    document.getElementById( "color6" ).value = $color1;
}


//カラーピッカーで色を変更後のイベント
var colorWell;
var defaultColor = "#0000ff";

window.addEventListener("load", startup, false);
function startup() {
	colorWell = document.querySelector("#color1");
	colorWell.addEventListener("input", updateFirst, false);
	colorWell.addEventListener("change", updateAll, false);
	colorWell.select();
}

function updateCode(event){
	var a = document.querySelector("#color2");
	if (a) {
	    a.value = event.target.value;
	}
}

function updateFirst(event) {
	var p = document.querySelector("p");

	if (p) {
    p.style.color = event.target.value;
    }
}

function updateAll(event) {
	document.querySelectorAll("p").forEach(function(p) {
    p.style.color = event.target.value;
    });
}

