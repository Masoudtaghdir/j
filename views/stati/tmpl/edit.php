<?php  /*
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Загружаем тултипы.
JHtml::_('behavior.tooltip');
?>
<form action="" method="post" name="save" id="save">
Сообшение: <input type="text"  name="greeting" value="<?php echo $this->edit['greeting'];?>" /><br /><br />

Категория: <select>
<?php
foreach ($this->categoriya as $item) {?>
  <option name="cat" selected="" value="<?php echo $item['id'];?>"><?php echo $item['cat_name']; ?></option>
<?php  var_dump($item['id']);

}
?>
</select><br /><br />

картинка: <input type="image" name='image' src="<?php echo $this->edit['image'];?>" style="width: 150px";/>
<br /><br /><input type="file" />
<input type="hidden" name="id" value="<?php echo $item['id'];?>"/>
<br /><br /><input type="submit" name="save" />
</form>*/


// Запрет прямого доступа.
defined('_JEXEC') or die;

// Загружаем тултипы.
JHtml::_('behavior.tooltip');
?>
<form action="" method="post" name="save" enctype="multipart/form-data">
Сообшение: <input type="text"  name="greeting" value='<?php echo $this->edit['greeting'];?>' /><br /><br />

Категория: <select name="cat">
<?php
foreach ($this->categoriya as $item) {?>
  <option  value="<?php echo $item['id'];?>" <?php if ($item['id'] == $this->edit['catid']){ ?> selected <?php } ?>><?php echo $item['cat_name']; ?></option>
<?php

}
?>
</select><br /><br />
 <?php if($this->edit['image']){ ?>
картинка: <input type="image" name='image' src="<?php echo $this->edit['image'];?>" style="width: 150px";/> <?}else{ echo 'нет изображения';}?>
<br /><br /><input type="file" name="image" />
<input type="hidden" name="id" value='<?php echo $this->edit['id'] ?>'/>
<br /><br /><input type="submit" name="save"  />
</form>