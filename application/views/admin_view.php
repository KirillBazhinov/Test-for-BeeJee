<form action="" method="post" class="base">
	<div class="form_main">
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
		<a href="/" class="button">На главную</a>
		<input type="submit" value="Выйти" name="ExitSession" class="button">
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
	</div>
</form>
<? foreach($data['Items'] as $value){?>
<form action="" method="post" class="base">
	<div class="main_item">
		<div>
			<input type="hidden" name="ID" value="<?=$value['ID']?>">
			<input type="hidden" name="sorting" value="<?=$data['currentSort']?>">
			<input type="hidden" name="page" value="<?=$data['currentPage']?>">
			<p><b>Имя:&nbsp;</b> <?=$value['Name']?></p>
			<p><b>Email:&nbsp;</b> <?=$value['Email']?></p>
			<label><input type="checkbox" <?if($value['Completed']) echo "checked";?> name="Completed" value="Completed">&nbsp;Задача выполнена</label>
			<?if($value['Edited']) echo '<p style="color:#2100ff;">Ред. администратором</p>';?>
			<input type="submit" value="Обновить" name="Update" class="button">
			<?if($value['Update']) echo '<p style="color:#207a09;">Изменения сохранены</p>';?>
		</div>
		<fieldset class="frame"> 
			<legend class="frame_header">Задача</legend>
			<textarea name="Text" id="Text_<?=$value['ID']?>"><?=$value['Text']?></textarea>
		</fieldset>
	</div>
</form>
<? } ?>