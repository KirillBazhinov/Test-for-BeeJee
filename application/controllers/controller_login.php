<?php

class Controller_Login extends Controller
{
	
	function action_index()
	{
		$data['Title']='Введите логин/пароль';
		session_start();
		//Проверяем есть ли корректная сессия
		if ($_SESSION['admin']==md5('admin'.'123')){
			//Перенаправляем на страницу администрирования
			header('Location:/admin');
		}
		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			
			/*
			Авторизацию упростил.
			*/
			if($login=="admin" && $password=="123")
			{
				$data["login_status"] = "ok";
				$_SESSION['admin'] = md5('admin'.'123');
				header('Location:/admin');
			}
			else
			{
				$data["login_status"] = "Необходимые поля не заполнены или введены не корректно";
			}
		}
		
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}
	
}
