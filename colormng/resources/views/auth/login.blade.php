@extends('layouts.app')

@section('content')

<!-- タイトル -->
<div class="login-top">
    <div class="container">
    	<div class="row justify-content-center" style="height: 160px">
    		<div class="col-md-6" style="background-color: #ffffff; text-align: center">
    			<br>
    			<h1 style="text-align: center">
        			<span style="color: #303C7B">Manage</span>
                    <span style="color: #2d764e">Your</span>
                    <span style="color: #d00404">C</span><span style="color: #cba400">o</span><span style="color: #0767ba">l</span><span style="color: #29ad4d">o</span><span style="color: #9f3ccb">r</span><span style="color: #de4297">s</span>
    			</h1>
    			<p style="text-align: center">― Webクリエイター向けの配色管理システム ―</p>
    			<a href="#" id="show">Manage Your Colorについて</a>
    		</div>
    	</div>
    </div>
    <br>

    <!-- ログインフォーム -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">{{ __('ログイン') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('ログインしたままにする') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ログイン') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('パスワードをお忘れですか?') }}
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 会社情報のviewをインクルード -->
    @include('map_movie')



    <!-- ポップアップのコード -->

    <!-- レイヤー -->
    <div id="layer"></div>
    <!-- ポップアップ -->
    <div id="popup">

    	<!-- ×ボタン -->
    	<div style="text-align: right;">
       		<input type="button" id="close" value="×" class="btn btn-light">
        </div>
    	<br>

    	<!-- 見出しと説明 -->
        <div>
             <h5 style="line-height: 168%"><span style="font-size: 30px">
                 <span style="color: #303C7B">Manage</span>
                 <span style="color: #2d764e">Your</span>
                 <span style="color: #d00404">C</span><span style="color: #cba400">o</span><span style="color: #0767ba">l</span><span style="color: #29ad4d">o</span><span style="color: #9f3ccb">r</span><span style="color: #de4297">s</span>
             </span>
             は<br>配色の作成、管理ができる
             Webクリエイター向けのコンテンツです。</h5>
        </div><br><br><br>

        <div align=center>
        	<h5  style=" width:200px;border-bottom: solid 2px #d00404;">配色の作成</h5>
        </div><br>
            <img alt="" src="../images/makeColor.png" width="70%" style="box-shadow: 1px 1px 5px -2px rgba(0,0,0,0.6);"><p>　</p>
            <p>最大６色の配色を作成することが可能です。
            また、作成した配色に合わせたカテゴリーを選択できます。</p>
        <br><br><br>

        <div align=center>
        	<h5  style=" width:200px;border-bottom: solid 2px #29ad4d;">配色を管理</h5>
        </div><br>
    		<img alt="" src="../images/colorList.png" width="70%" style="box-shadow: 1px 1px 5px -2px rgba(0,0,0,0.6);"><p>　</p>
    		<p>作成した配色をリスト表示で管理します。<br>
    		カラーコードを記録できるため、CSSなどカラーを指定する際活躍するでしょう。</p>

    </div>



</div>

@endsection
