<?php

class Model
{
	public $errorDB;
	function __construct()
	{
		$this->$mysqli = new mysqli('localhost', 'f0309877_new', '3rwimfwi', 'f0309877_test');
		if ($this->$mysqli->connect_error)
		{
			$this->errorDB = $this->$mysqli->connect_error;
		}
	}
	// Выбираем данные по сортировке
	public function get_data($sorting=0,$page=0)
	{
		//Возвращаем сообщение о ошибке подключения к бд
		if ($this->errorDB)
		{
			return array(
			"Error"=>$this->errorDB,
			);
		}
		//Массив с возможными вариантами сортировки
		$arSorting = array(
			0=>'`Name`',
			1=>'`Name` DESC',
			2=>'`Email`',
			3=>'`Email` DESC',
			4=>'`Completed`',
			5=>'`Completed` DESC',
		);
		//Проверяем на существование сортировки
		if (!isset($arSorting[$sorting])) $sorting = 0;
		//Узнаём количество строк в таблице
		$count = $this->$mysqli->query('SELECT count(*) FROM `Tasks`');
		$count = ($count->fetch_row())[0];
		//Количество страниц
		$quantityPages = ceil($count/3);
		//Записей на последней странице
		$quantityLastPage = $count%3;
		//Проверяем на корректность текущей страницы
		if(empty($page) or $page>($quantityPages-1) or $page<0)$page=0;
		//Осуществляем выборку 3 записей   
		$result = $this->$mysqli->query('SELECT * FROM (SELECT * FROM `Tasks` ORDER BY '.$arSorting[$sorting].') a LIMIT 3 OFFSET '.($page * 3));
		$result = $result->fetch_all(MYSQLI_ASSOC);
		return array(
			'Items'=>$result,
			'currentPage'=>$page,
			'currentSort'=>$sorting,
			'Количество строк '=>$count,
			'quantityPages'=>$quantityPages,
			'Кол. записей на посл странице'=>$quantityLastPage,
			);
	}
	public function add_data($name,$email,$text)
	{	
		//Возвращаем сообщение о ошибке подключения к бд
		if ($this->errorDB)
		{
			return array(
			"Error"=>$this->errorDB,
			);
		}
		$name=$this->$mysqli->real_escape_string($name);
		$email=$this->$mysqli->real_escape_string($email);
		$text=$this->$mysqli->real_escape_string($text);
		//Осуществляем выборку 3 записей 
		$result = $this->$mysqli->query("INSERT INTO `Tasks` values(NULL,'$name', '$email','$text',0,0)");
		return $result;
		
	}
}