<?php

class Controller_Main extends Controller
{

	function action_index()
	{	
		//Добавление новой записи
		if (isset($_POST['addTask'])){
			$name = htmlspecialchars(($_POST['name']), ENT_QUOTES, 'UTF-8');
			$text = htmlspecialchars(($_POST['Text']), ENT_QUOTES, 'UTF-8');
			$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
			if (!empty($name) and !empty($text) and $email){
				$result = $this->model->add_data($name,$email,$text);
				if (!$result){
					$result = "Ошибка при записи";
				}else{
					$result = "Добавлена новая задача";
				}
			}else{
				$result = "Пустые или некоректные данные";
			}
		}
		$data = $this->model->get_data((int)$_POST['sorting'],(int)$_POST['page']);
		$data['Title']='Главная';
		$data['UpdateMess']=$result;
		$this->view->generate('main_view.php', 'template_view.php',$data);
	}
}