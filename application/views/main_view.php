<h1>Добро пожаловать!</h1>
<? //echo '<pre>'.print_r($_POST,true).'</pre>';?>
<?//$_POST['sorting'],$_POST['page']?>
<div class="base">
<?if($data['UpdateMess']) echo '<p style="color:#207a09;margin:20px 0;">'.$data['UpdateMess'].'</p>';?>
	<form action="" method="post" class="form_main">
		<div>
		<span>Сортировка:&nbsp;&nbsp;</span>
			<select name="sorting" id="sorting">
				<option value="0" <?if($data['currentSort']==0)echo selected;?>>Имя (возр.)</option>
				<option value="1" <?if($data['currentSort']==1)echo selected;?>>Имя (убыв.)</option>
				<option value="2" <?if($data['currentSort']==2)echo selected;?>>Email (возр.)</option>
				<option value="3" <?if($data['currentSort']==3)echo selected;?>>Email (убыв.)</option>
				<option value="4" <?if($data['currentSort']==4)echo selected;?>>Статус (возр.)</option>
				<option value="5" <?if($data['currentSort']==5)echo selected;?>>Статус (убыв.)</option>
			</select>
		</div>
		<a href="/admin" class="buttonA">Авторизация</a>
		<div class="buttonA" onclick="show()">Добавить запись</div>
		<div>
		<? if(!empty($data['quantityPages']) and $data['quantityPages']>0){ ?>
		<span>Страница:&nbsp;&nbsp;</span>
			<select name="page" id="page">
			<? 
			for($i=0;$i<$data['quantityPages'];$i++){ ?>
				<option value="<?=$i?>" <?if($data['currentPage']==$i)echo selected;?>><?=$i+1?></option>
			<? } ?>
			</select>
		<? } ?>
		</div>
		
	</form>
	<form action="" method="post" class="base" id="addForm">
		<div class="main_item">
			<div>
				<input type="hidden" name="sorting" value="<?=$data['currentSort']?>">
				<input type="hidden" name="page" value="<?=$data['currentPage']?>">
				<p><b>Имя:&nbsp;&nbsp;&nbsp;</b> 
				<input type="text" id="name" name="name" required minlength="2" maxlength="15" size="10"></p>
				<p><b>Email:&nbsp;</b> 
				<input type="email" id="email" name="email" required size="10"></p>
				<input type="submit" value="Добавить" name="addTask" class="button">
			</div>
			<fieldset class="frame"> 
				<legend class="frame_header">Задача</legend>
				<textarea name="Text" id="Text_<?=$value['ID']?>"><?=$value['Text']?></textarea>
			</fieldset>
		</div>
	</form>
	<? foreach($data['Items'] as $value){?>
	<div class="main_item">
		<div>
			<p><b>Имя:</b> <?=$value['Name']?></p>
			<p><b>Email:</b> <?=$value['Email']?></p>
			<?if($value['Completed']) echo '<p style="color:green;">Задача выполнена</p>';?>
			<?if($value['Edited']) echo '<p style="color:#2100ff;">Ред. администратором</p>';?>
		</div>
		<fieldset class="frame"> 
			<legend class="frame_header">Задача</legend>
				<p><?=$value['Text']?></p>
		</fieldset>
	</div>
	<? } ?>
</div>
