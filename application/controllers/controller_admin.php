<?php

class Controller_Admin extends Controller
{
	public $modelAdmin;
	
	function __construct()
	{
		$this->model = new Model();
		$this->modelAdmin = new Model_Admin();
		$this->view = new View();
	}
	
	function action_index()
	{
		session_start();
		//Кнопка выход
		if(isset($_POST['ExitSession'])){
			unset($_SESSION['admin']);
		}
		//Проверяем есть ли корректная сессия
		if ($_SESSION['admin']!=md5('admin'.'123')){
			//Перенаправляем на страницу администрирования
			header('Location:/login');
		}
		//Обновляем запись
		if (isset($_POST['Update'])){
			$text = htmlspecialchars($_POST['Text'], ENT_QUOTES, 'UTF-8');
			$id = (int)$_POST['ID'];
			$chekCompleted=0;
			if ($_POST['Completed']=='Completed')$chekCompleted=1;
			$responseUpdate = $this->modelAdmin->update_data($id,$text,$chekCompleted);
		}
		$data = $this->model->get_data((int)$_POST['sorting'],(int)$_POST['page']);
		if (isset($_POST['Update']) and $responseUpdate){
			//Делаем отметку о обновлении
			foreach($data['Items'] as $key=>$value){
				if ($value['ID']==$id) {
					$data['Items'][$key]['Update']=$responseUpdate;
				}
			}
		}
		$data['Title']='Администрирование';
		$this->view->generate('admin_view.php', 'template_view.php', $data);
	}
}
