<?php

defined('_JEXEC') or die('Restricted access');
?>

<table class="table" border="2" style="height:auto; ">
<tbody>
<tr>

	<th>
		<?php echo JText::_('текст сообщения'); ?>
	</th>
	<th width="1%" class="nowrap">
		<?php echo JText::_('Картинка'); ?>
       </th>
    	<th width="1%" class="nowrap">
		<?php echo JText::_('категория'); ?>
	</th>
    <th>
   <?php echo JText::_('редактирование'); ?>
    </th>
</tr>
	<?php foreach ($this->items as $item) : ?>

    <tr>
        <td width="5%" height="30" align=center>
            <?php echo $item->greeting; ?>
        </td>

         <td width="20%" height="30" align=center>
 <?php if ($item->image):?>
				<img style="width: 150px;" src="<?php echo JURI::root(true).'/'.$item->image; ?>">
  <?

  endif?>
         </td>

            <td width="20%" height="30" align=center>
			<?php echo $item->cat_name; ?>

         </td>
         <td width="20%" height="30" align=center>

           	<a href="<?php echo JRoute::_('index.php?option=com_categoriya&view=stati&layout=edit&id='.$item->id) ;?>">изменить</a>
         </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
