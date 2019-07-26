/**
 * 管理画面
 */


/**
 * クリップボードコピー関数
 * 入力値をクリップボードへコピーする
 * [引数]   data: 入力値
 * [返却値] true: 成功　false: 失敗
 */
function copyToClipboard(data){


	// テキストエリアを用意する
	var copyFrom = document.createElement("textarea");
	// テキストエリアへ値をセット
	copyFrom.textContent = data;

	// bodyタグの要素を取得
	var bodyElm = document.getElementsByTagName("body")[0];
	// 子要素にテキストエリアを配置
	bodyElm.appendChild(copyFrom);

	// テキストエリアの値を選択
	copyFrom.select();
	// コピーコマンド発行
	var retVal = document.execCommand('copy');
	// 追加テキストエリアを削除
	bodyElm.removeChild(copyFrom);

	$('[data-toggle="tooltip"]').tooltip();
	$('#sampleTooltip').title("コピーしました");

	// 処理結果を返却
	return retVal;
}


//ポップオーバー
$(function () {
	$('[data-toggle="tooltip"]').tooltip();
	$('#sampleTooltip').on('hidden.bs.tooltip', function () {
		$('#sampleTooltip').title("コピーしました");
	});
});