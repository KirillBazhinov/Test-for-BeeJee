<? if(isset($data)) { ?>
<p style="color:red"><?=$data['login_status']?></p>
<? } ?>
<a href="/"><h2>На главную</h2></a>
<form action="" method="post">
	<div class="login">
		<div>
			Логин:&nbsp;&nbsp;&nbsp;<input type="text" name="login">
		</div>
		<div>
			Пароль:&nbsp;<input type="password" name="password">
		</div>
		<input type="submit" value="Войти" name="btn" style="width: 150px; height: 30px;">
	</div>
</form>