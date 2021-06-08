<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<!-- Стили -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/css/uikit.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/js/uikit-icons.min.js"></script>
	<link rel="stylesheet" href="styles.css" />
	<!-- Заголовок вкладки -->
	<title>Social123 </title>
</head>

<body>

<header>
@if (Route::has('login'))
	<nav class="uk-navbar-container" uk-navbar>
		<div class="uk-navbar-left">
			<a class="uk-navbar-item uk-logo" href="#">Social123</a>
			<ul class="uk-navbar-nav">
				@auth
					<li class=""><a href="{{ url('/home') }}"><span uk-icon="icon: home"></span>Home</a></li>
				@else
					<li class=""><a href="{{ route('login') }}"><span uk-icon="icon: sign-in"></span>Log in</a></li>
					@if (Route::has('register'))
						<li class=""><a href="{{ route('register') }}"><span uk-icon="icon: chevron-double-right"></span>Register</a></li>
					@endif
				@endauth
			</ul>
		</div>
	</nav>
@endif
</header>
	<!-- НАЧАЛО: Основное содержимое страницы -->
	<main class="mwidth">
		<div class="" style="margin-top: 20px">
			<h1>Лента</h1>



			@if (Route::has('login'))
				@auth
					<a class="uk-button uk-button-default" href="/post/create"><span uk-icon="icon: file-edit"> Написать новость</a>
				@else
					Чтобы создать запись<a href="{{ route('login') }}"><b> войдите </b></a> или <a href="{{ route('register') }}"><b>зарегистрируйтесь</b></a>
				@endauth
			@endif



			
			<hr>
			@foreach($posts as $post)
			<!-- НАЧАЛО: Карточка post ------------------------------------->
			<div class="uk-card" style="margin-top: 20px">
				<!-- НАЧАЛО: Шапка карточки -->
				<h3 class="">
					<a href="#">
						{{$post->title}}
					</a>
				</h3>
				<b><i>{{$post->author}}</i></b>
				<!-- КОНЕЦ: Шапка карточки -->
				<!-- НАЧАЛО: Тело карточки -->
				<div>
					<!-- Текст описания -->
					<p class="">
						{{$post->text}}
					</p>
					<!-- Кнопки + - -->
					<div class="uk-button-group">
						<a href="/post/positive_inc/{{$post->id}}" class="uk-button uk-button-default">
							<span uk-icon="icon: plus"></span>
							@if($post->positive > 0)
								{{$post->positive}}
							@endif
						</a>
						<a href="/post/negative_inc/{{$post->id}}" class="uk-button uk-button-default">
							<span uk-icon="icon: minus"></span>
<!-- 							@if($post->negative > 0)
								%
							@endif -->
						</a>
						<a href="" class="uk-button uk-button-default">
							<span uk-icon="icon: commenting"></span>
						</a>
					</div><p>
					@if($post->positive > 0)
						 {{$post->positive}} человек({{round($post->positive / (($post->positive + $post->negative) / 100) , 0, PHP_ROUND_HALF_EVEN) }}%) поставили <span uk-icon="icon: plus"></span>
					@endif
					@if($post->negative > 0)
						
						 <br>{{round($post->negative / (($post->positive + $post->negative) / 100) , 0, PHP_ROUND_HALF_EVEN) }}% не понравилась эта запись <span uk-icon="icon: minus"></span>
					@endif
					</p>
				</div>
				<hr>
				<!-- КОНЕЦ: Тело карточки -->
			</div>
			@endforeach
			<!-- КОНЕЦ: Карточка голосования -------------------------------------->
			<div class="uk-button-group">
			<div style="margin-top: 20px"></div>
			<a href="{{$posts->url(1)}}"><button type="button" class="uk-button uk-button-default uk-button-small"><<</button></a>
			@if($posts->onFirstPage())
				<button type="button" class="uk-button uk-button-default uk-button-small"><</button>
			@else
				<a href="{{$posts->previousPageUrl()}}"><button type="button" class="uk-button uk-button-default uk-button-small"><</button></a>
			@endif
			@for($i = 0; $i < $posts->lastPage(); $i += 1)
				@if($posts->currentPage()-1 == $i)
					<a href="{{$posts->url($i+1)}}"><button type="button" class="uk-button uk-button-default uk-button-small">{{$i + 1}}</button></a>
				@else
					<a href="{{$posts->url($i+1)}}"><button type="button" class="uk-button uk-button-default uk-button-small">{{$i + 1}}</button></a>
				@endif
			
			@endfor
			@if($posts->lastPage() == $posts->currentPage())
				<button type="button" class="uk-button uk-button-default uk-button-small">></button>
			@else
				<a href="{{$posts->nextPageUrl()}}"><button type="button" class="uk-button uk-button-default uk-button-small" >></button></a>
			@endif
			<a href="{{$posts->url($posts->lastPage())}}"><button type="button" class="uk-button uk-button-default uk-button-small">>></button></a>
			</div>
		</div>
	</main>
	<!-- КОНЕЦ: Основное содержимое страницы -->
</body>
</html>