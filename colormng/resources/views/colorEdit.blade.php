@extends('layouts.app')

@section('content')


<!-- 編集フォーム -->

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<br>
			<div class="col-md-12" style="background-color: #ffffff"><br>
    			@if($job == 1)
    			    <h2 style="text-align: center;">
    			    	<span style="color: #303C7B">Make</span>
          			    <span style="color: #2d764e">Your</span>
                    	<span style="color: #d00404">C</span><span style="color: #cba400">o</span><span style="color: #0767ba">l</span><span style="color: #29ad4d">o</span><span style="color: #9f3ccb">r</span><span style="color: #de4297">s</span>
    				    <span style="font-size: 15px;">{{ $sub}}</span>
    			    </h2>
    		  　　
    			@elseif($job == 2)
    				 <h2 style="text-align: center;">
    				 	<span style="color: #303C7B">Edit</span>
          			    <span style="color: #2d764e">Your</span>
                    	<span style="color: #d00404">C</span><span style="color: #cba400">o</span><span style="color: #0767ba">l</span><span style="color: #29ad4d">o</span><span style="color: #9f3ccb">r</span><span style="color: #de4297">s</span>
    			  		<span style="font-size: 15px;">{{ $sub}}</span>
    			    </h2><br>
    			@endif()
			</div><br>
			@include('common.errors')
			<div class="card">
				<div class="card-header">{{ $title }}</div>
				<div class="card-body">
					<form name="frm" action="" method="post">
					{{ csrf_field() }}
                		<table class="table table-condensed">
							<tr>
                    			<th><label for="div2">分割数を選択</label></th>
                    			<td>
                    				@for($i = 2; $i <= 6; $i++)
                    					@if($division == $i)
                    					<input type="radio" class="division" name="division" id="div{{ $i }}" value="{{ $i }}" checked="checked">{{ $i }} &nbsp;&nbsp;
                    					@else
                    					<input type="radio" class="division" name="division" id="div{{ $i }}" value="{{ $i }}">{{ $i }} &nbsp;&nbsp;
                    					@endif
                    				@endfor
                    			</td>
                    			<th></th>
                    			<td></td>
            				</tr>
                    		<tr>
                    			<th>クリックして色を選択</th>
            					<td colspan="3">
        							<div class="c color2">
        								<input type="color" value="{{ $color1 }}" class="c2 color1 " id="color1" name="color1" onChange="change();" />
        							</div>
            						<div class="c color2">
                    					<input type="color" value="{{ $color2 }}" class="c2 color2" id="color2" name="color2" onChange="change();" />
                    				</div>
                    				<div class="c color3">
                						<input type="color" value="{{ $color3 }}" class="c2 color3" id="color3" name="color3" onChange="change();" />
                					</div>
                					<div class="c color4">
                						<input type="color" value="{{ $color4 }}" class="c2color4" id="color4" name="color4" onChange="change();" />
                					</div>
                					<div class="c color5">
                						<input type="color" value="{{ $color5 }}" class="c2color5" id="color5" name="color5" onChange="change();" />
                					</div>
                					<div class="c color6">
                						<input type="color" value="{{ $color6 }}" class="c2 color6" id="color6" name="color6" onChange="change();" />
                					</div>
                				</td>
                				<th></th>
                    			<td></td>
            				</tr>
            				<tr>
            					<th><label for="color11">カラーコードを入力して作成</label></th>
            					<td  colspan="3">
                    				<div class="c color2">
                    					<input type="text" value="{{ $color1 }}" class="form-control" id="color11" name="color_code1" onkeyup="inputColorCode();" />
                    				</div>
                    				<div class="c color2">
                    					<input type="text" value="{{ $color2 }}" class="form-control" id="color22" name="color_code2" onkeyup="inputColorCode();" />
                    				</div>
                    				<div class="c color3">
                    					<input type="text" value="{{ $color3 }}" class="form-control" id="color33" name="color_code3" onkeyup="inputColorCode();" />
                    				</div>
                    				<div class="c color4">
                    					<input type="text" value="{{ $color4 }}" class="form-control" id="color44" name="color_code4" onkeyup="inputColorCode();" />
                    				</div>
                    				<div class="c color5">
                    					<input type="text" value="{{ $color5 }}" class="form-control" id="color55" name="color_code5" onkeyup="inputColorCode();" />
                    				</div>
                    				<div class="c color6">
                    					<input type="text" value="{{ $color6 }}" class="form-control" id="color66" name="color_code6" onkeyup="inputColorCode();" />
                    				</div>
                    			</td>
                    			<th></th>
                    			<td></td>
            				</tr>
                			<tr>
                				<th><label for="color_name">Color Name</label></th>
                				<td>
                					<input type="text" id="color_name" name="color_name" value="{{ $color_name }}" placeholder="作成する配色の名前" class="form-control" style="width: 200px">
                					<input type="hidden" id="color_name2" name="color_name2" value="{{ $color_name2 }}">
                				</td>
                				<th></th>
                    			<td></td>
                			</tr>
                			<tr>
                				<th><label for="image_div">イメージ</label></th>
                				<td>
                					<select id="image_div" class="form-control" name="image_div" style="width: 200px">
                						<option value="">--色のイメージを選択--</option>
                						@foreach($images as $image)
                							@if($image_div == $image->image_div)
                								<option value="{{ $image->image_div }}" selected>{{ $image->image_word }}</option>
                							@else
                								<option value="{{ $image->image_div }}">{{ $image->image_word }}</option>
                							@endif
                						@endforeach
                					</select>&nbsp;&nbsp;&nbsp;&nbsp;
                				</td>
                				<th><label for="hue_div">色相</label></th>
                				<td>
                					<select id="hue_div" class="form-control" name="hue_div" style="width: 100%">
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
                				<th><label for="gradation">グラデーション</label></th>
                				<td>
                					<input type="checkbox" name="gradation" id="gradation" {{ $checked }}>
                				</td>
                				<th><label for="memo">memo</label></th>
                				<td>
                					<textarea rows="" cols="" name="memo" id="memo" class="form-control">{{ $memo }}</textarea>
                				</td>
    						</tr>
                		</table>
                		<div class="button1">
                			<button  formaction="{{ $action }}" class="btn btn-success" style="width: 200px">{{ $button }}</button>&nbsp;&nbsp;&nbsp;
    						<button type="button" onclick="cancel()" class="btn btn-default" style="width: 200px">キャンセル</button>
						</div>
					</form>
            	</div>
			</div>
		</div>
	</div>
</div>
<br>
@endsection