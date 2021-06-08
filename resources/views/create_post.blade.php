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
	<title>Написать новость</title>
	<style>
		.mwidth{
			width: 70%;
			margin-left: 15%;
			margin-right: 15%;
		}
	</style>
</head>

<body>
	<!-- НАЧАЛО: Навигация -->
	@if (Route::has('login'))
		<nav class="uk-navbar-container" uk-navbar>
			<div class="uk-navbar-left">
				<a class="uk-navbar-item uk-logo" href="/">Social123</a>
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
	<!-- КОНЕЦ: Навигация -->
	
	<!-- НАЧАЛО: Основное содержимое страницы -->
	<main class="mwidth">
		<h3>Вы вошли в аккаунт </h3>
		<div>

			<h1>Написать новость</h1>
			<hr>

			<form method="POST">
				<div class="form-group">
					<legend class="uk-legend">Заголовок</legend>
					<input class="uk-input" type="text" class="form-control" name="title">
				</div>
				<div class="form-group">
					<legend class="uk-legend">Текст описания</legend>
					<textarea class="uk-textarea" rows="5" name="text"></textarea>
				</div>
				{{csrf_field()}}
				<button type="submit" class="uk-button uk-button-primary" style="margin-top: 20px">Опубликовать</button>
			</form>

		</div>
	</main>
	<!-- КОНЕЦ: Основное содержимое страницы -->

</body>

</html>
