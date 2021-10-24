<?php

class Model_Admin extends Model
{
	public function update_data($id,$text,$chekCompleted)
	{	
		//Возвращаем сообщение о ошибке подключения к бд
		if ($this->errorDB)
		{
			return array(
			"Error"=>$this->errorDB,
			);
		}
		$id = (int)$id;
		$chekCompleted = (int)$chekCompleted;
		$text=$this->$mysqli->real_escape_string($text);
		//Узнаём изменился ли текст
		$oldText = $this->$mysqli->query("SELECT `Text` FROM `Tasks` WHERE `ID` = '$id'");
		$oldText = ($oldText->fetch_all(MYSQLI_ASSOC))[0]['Text'];
		if ($oldText==$text){
			$edited = 0;
		}else{
			$edited = 1;
		}
		$result = $this->$mysqli->query("UPDATE `Tasks` SET `Text` = '$text', `Completed` = '$chekCompleted', `Edited` = '$edited' WHERE `ID` = '$id'");
		return $result;
	}

}
