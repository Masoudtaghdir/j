
 <table>
 <tr>
   <td>выбор категории</td>
 </tr>
     <?php foreach ($this->Categoriya as $item) : ?>
   <tr>
      <td><a href="<?php echo JRoute::_('index.php?&catid=' . (int) $item['id']); ?>"><?php echo $item['cat_name']; ?></a>
   </td></tr>
<?php endforeach; ?>
     <tr>
      <td><a href="<?php echo JRoute::_('index.php?&catid=0'); ?>">Без категории</a>
   </td></tr>
</table>
  <pre>
  <form method="get" >
<select id="cat">
<?php
foreach ($this->Categoriya as $item) {?>
  <option name="id" value="<?php echo $item['id'];?>"><?php echo $item['cat_name']; ?></option>
<?php
}
?>
</select>
</form>  </pre>

<div id="ajax_res"> </div> 