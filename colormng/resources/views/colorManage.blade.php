@extends('layouts.app')

@section('content')

<br>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6"><br>
    		<div style="text-align: center;">
        		<form action="" method="post">
        			@csrf
        			<button formaction="/edit" id="button1" class="btn btn-success btn-lg" style="width: 200px; height: 100px;">配色を作成する</button>

                    <button type="button" id="button2" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#sampleModal" style="width: 200px; height: 100px;">
                    	作成した配色を検索
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>

<!-- 検索フォーム -->
<!-- モーダル・ダイアログ -->
<div class="modal" id="sampleModal" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
    		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
			</div>
            <div class="container">
            	<div class="row justify-content-center">
            		<div class="col-md-11"><br><br>
            			<h2 style="text-align: center;">
                			<span style="color: #303C7B">Search</span>
                		    <span style="color: #2d764e">Your</span>
                        	<span style="color: #d00404">C</span><span style="color: #cba400">o</span><span style="color: #0767ba">l</span><span style="color: #29ad4d">o</span><span style="color: #9f3ccb">r</span><span style="color: #de4297">s</span>
                			<span style="font-size: 15px;">　― 作成した配色を検索 ―</span>
            			</h2><br>
            			<div class="card">
            				<div class="card-header">配色を検索</div>
            				<div class="card-body">
                            	<form action="/search" method="post">
                            		@csrf
                                	<div class="kensaku-area">
                                		<table class="table table-condensed">
                                			<tr>
                                				<th><label for="color_name">Color Name</label></th>
                                				<td>
                                					<input type="text" name="color_name" value="{{ $color_name }}" id="color_name" class="form-control" placeholder="作成した配色の名前">
                                				</td>
                                				<th><label for="date_from">登録日</label></th>
                                				<td>
                                					<input type="date" id="date_from" name="date_from" class="form-control" value="{{ $date_from }}" ><div style="text-align: center;">～</div>
                                					<input type="date" id="date_to" name="date_to" class="form-control" value="{{ $date_to }}">
                                				</td>
                                			</tr>
                                			<tr>
                                				<th><label for="image_div">イメージ</label></th>
                                				<td>
                                					<select id="image_div" class="form-control" name="image_div">
                                						<option value="">--イメージを選択--</option>
                                						@foreach($images as $image)
                                    							@if($image_div == $image->image_div)
                                    								<option value="{{ $image->image_div }}" selected>{{ $image->image_word }}</option>
                                    							@else
                                    								<option value="{{ $image->image_div }}">{{ $image->image_word }}</option>
                                    							@endif
                                						@endforeach
                                					</select>
                                				</td>
                                				<th><label for="hue_div">色相</label></th>
                                				<td>
                                					<select id="hue_div" class="form-control" name="hue_div">
                                						<option value="">--色相を選択--</option>
                                						@foreach($hues as $hue)
                                    							@if($hue_div == $hue->hue_div)
                                    								<option value="{{ $hue->hue_div }}" selected>{{ $hue->hue_word }}</option>
                                    							@else
                                    								<option value="{{ $hue->hue_div }}">{{ $hue->hue_word }}</option>
                                    							@endif
                                						@endforeach
                                					</select>
                                				</td>
                                			</tr>
                                			<tr>
                                				<th><label for="div2">分割数</label></th>
                                				<td>
                                					@for($i = 2; $i <= 6; $i++)
                                        					@if($division == $i)
                                        					<input type="radio" class="division" name="division" id="div{{ $i }}" value="{{ $i }}" checked="checked">
                                        					<label for="div{{ $i }}">{{ $i }}</label> &nbsp;
                                        					@else
                                        					<input type="radio" class="division" name="division" id="div{{ $i }}" value="{{ $i }}">
                                        					<label for="div{{ $i }}">{{ $i }}</label> &nbsp;
                                        					@endif
                                    				@endfor
                                				</td>
                                				<th><label for="color_code">カラーコード</label></th>
                                				<td>
                                					<input type="text" name="color_code" value="{{ $color_code }}" id="color_code" placeholder="#000000" class="form-control">
                                				</td>
                                			</tr>
                                			<tr>
                                				<th><label for="gradation">グラデーション</label></th>
                                				<td>
                                					<input type="checkbox" name="gradation" id="gradation" {{ $checked }}>
                                				</td>
                                				<th></th>
                                    			<td></td>
                                			</tr>
                                		</table>
                                		<div class="button1">
                                			<button formaction="/edit" class="btn btn-success" style="width: 200px">新規作成</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                			<button type="submit" class="btn btn-primary" style="width: 200px">検索</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                			<button formaction="/reset" class="btn btn-default" style="width: 80px">リセット</button>
                                		</div>
                                	</div>
                            	</form>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
			<br><br>
        </div>
    </div>
</div>

<!-- リスト表示 -->

<br>
<br>

@if(count($color_list) > 0)

<div class="col-md-11" style="margin: auto;">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					{{ $color_list->links() }}
				</div>
			</div><br>
			<h3>&nbsp;
    			<span style="color: #2d764e">Your</span>
                <span style="color: #d00404">C</span><span style="color: #cba400">o</span><span style="color: #0767ba">l</span><span style="color: #29ad4d">o</span><span style="color: #9f3ccb">r</span><span style="color: #de4297">s</span>
    			<span style="color: #303C7B">List</span>
			</h3><br>
        	<table class="table table-hover">
            	<tr style="text-align: center;" bgcolor="#cccccc">
            		<th style="width: 25%">Color Name</th>
            		<th style="width: 37%">作成した配色</th>
            		<th style="width: 14%">イメージ</th>
            		<th style="width: 14%">色相</th>
            		<th style="width: 5%">編集</th>
            		<th style="width: 5%">削除</th>
            	</tr>
        		@foreach($color_list as $color)
            		<tr class="color_list" style="text-align: center;">

            			<td><div>{{ $color->color_name}}</div></td>

                		<td>
                			@if($color->division == 2)
                				<input type="color" value="{{ $color->color1 }}" class="c2 color1" id="color1" name="color1" disabled="disabled">
                				<input type="color" value="{{ $color->color2 }}" class="c2 color2" id="color2" name="color2" disabled="disabled">
    							<p><a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color1 }}')">{{ $color->color1 }}</a>&nbsp;
    								<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color2 }}')">{{ $color->color2 }}</a>
    							</p>
            				@elseif($color->division == 3)
            					<input type="color" value="{{ $color->color1 }}" class="c2 color1" id="color1" name="color1" disabled="disabled">
            					<input type="color" value="{{ $color->color2 }}" class="c2 color2" id="color2" name="color2" disabled="disabled">
            					<input type="color" value="{{ $color->color3 }}" class="c2 color3" id="color3" name="color3" disabled="disabled">
								<p><a href="javascript:void(0)"  data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color1 }}')">{{ $color->color1 }}</a>&nbsp;
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color2 }}')">{{ $color->color2 }}</a>&nbsp;
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color3 }}')">{{ $color->color3 }}</a>
								</p>
            				@elseif($color->division == 4)
                				<input type="color" value="{{ $color->color1 }}" class="c2 color1" id="color1" name="color1" disabled="disabled">
                				<input type="color" value="{{ $color->color2 }}" class="c2 color2" id="color2" name="color2" disabled="disabled">
            					<input type="color" value="{{ $color->color3 }}" class="c2 color3" id="color3" name="color3" disabled="disabled">
            					<input type="color" value="{{ $color->color4 }}" class="c2 color4" id="color4" name="color4" disabled="disabled">
								<p><a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color1 }}')">{{ $color->color1 }}</a>&nbsp;
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color2 }}')">{{ $color->color2 }}</a>&nbsp;
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color3 }}')">{{ $color->color3 }}</a>&nbsp;
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color4 }}')">{{ $color->color4 }}</a>
								</p>
            				@elseif($color->division == 5)
            					<input type="color" value="{{ $color->color1 }}" class="c2 color1" id="color1" name="color1" disabled="disabled">
            					<input type="color" value="{{ $color->color2 }}" class="c2 color2" id="color2" name="color2" disabled="disabled">
            					<input type="color" value="{{ $color->color3 }}" class="c2 color3" id="color3" name="color3" disabled="disabled">
            					<input type="color" value="{{ $color->color4 }}" class="c2 color4" id="color4" name="color4" disabled="disabled">
            					<input type="color" value="{{ $color->color5 }}" class="c2 color5" id="color5" name="color5" disabled="disabled">
								<p><a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color1 }}')">{{ $color->color1 }}</a>&nbsp;
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color2 }}')">{{ $color->color2 }}</a>&nbsp;
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color3 }}')">{{ $color->color3 }}</a>&nbsp;
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color4 }}')">{{ $color->color4 }}</a>&nbsp;
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color5 }}')">{{ $color->color5 }}</a>
								</p>
            				@elseif($color->division == 6)
            					<input type="color" value="{{ $color->color1 }}" class="c2 color1" id="color1" name="color1" disabled="disabled">
            					<input type="color" value="{{ $color->color2 }}" class="c2 color2" id="color2" name="color2" disabled="disabled">
            					<input type="color" value="{{ $color->color3 }}" class="c2 color3" id="color3" name="color3" disabled="disabled">
            					<input type="color" value="{{ $color->color4 }}" class="c2 color4" id="color4" name="color4" disabled="disabled">
            					<input type="color" value="{{ $color->color5 }}" class="c2 color5" id="color5" name="color5" disabled="disabled">
            					<input type="color" value="{{ $color->color6 }}" class="c2 color6" id="color6" name="color6" disabled="disabled">
            					<p><a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color1 }}')">{{ $color->color1 }}</a>
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color2 }}')">{{ $color->color2 }}</a>
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color3 }}')">{{ $color->color3 }}</a>
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color4 }}')">{{ $color->color4 }}</a>
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color5 }}')">{{ $color->color5 }}</a>
									<a href="javascript:void(0)" data-toggle="tooltip" title="クリックしてコピー" onclick="copyToClipboard('{{ $color->color6 }}')">{{ $color->color6 }}</a>
								</p>
            				@endif
            			</td>

            			<td>{{ $color->image_word }}</td>
            			<td> {{ $color->hue_word }} </td>
            			<td>
            				<form action="/dispupdatecolor" method="post">
            				{{ csrf_field() }}
            					<input type="hidden" value="{{ $color->color_id }}" name="color_id">
            					<input type="hidden" value="{{ $color->gradation }}" name="gradation">
								<button type="submit" class="btn btn-info" style="width: 70px">編集</button>
							</form>
						</td>
						<td>
            				<form name="delColor" action="/deletecolor" method="post" onsubmit="return deleteColor()">
            				{{ csrf_field() }}
            					<input type="hidden" value="{{ $color->color_id }}" name="color_id" id="color_id">
								<button type="submit"  class="btn btn-default" style="width: 70px">削除</button>
							</form>
						</td>
					</tr>
            	@endforeach
        	</table>
    	</div>
    </div>
</div>

@else
<!-- 検索結果がなかったら -->
<div style="text-align: center;">
	<h6>該当データがありませんでした</h6><br>
	<form action="">
		{{ csrf_field() }}
		<button formaction="/reset" class="btn btn-default" style="width: 200px">リストを表示</button>
	</form>
</div>
@endif

@endsection