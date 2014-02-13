<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем библиотеку modeladmin Joomla.
jimport('joomla.application.component.modeladmin');

/**
 * Модель Categoriya.
 */
class CategoriyaModelStati extends JModelAdmin
{
  /**
     * Возвращает ссылку на объект таблицы, всегда его создавая.
     *
     * @param   string  $type    Тип таблицы для подключения.
     * @param   string  $prefix  Префикс класса таблицы. Необязателен.
     * @param   array   $config  Конфигурационный массив. Необязателен.
     *
     * @return  JTable  Объект JTable.
     */
    public function getTable($type = 'Categoriya', $prefix = 'CategoriyaTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Метод для получения формы.
     *
     * @param   array    $data      Данные для формы.
     * @param   boolean  $loadData  True, если форма загружает свои данные (по умолчанию), false если нет.
     *
     * @return  mixed  Объект JForm в случае успеха, в противном случае false.
     */
    public function getForm($data = array(), $loadData = true)
    {
        // Получаем форму.
        $form = $this->loadForm(
            $this->option . '.categoriya', 'categoriya', array('control' => 'jform', 'load_data' => $loadData)
        );

        if (empty($form))
        {
            return false;
        }

        return $form;
    }


// выборка данных из табл
    public function getItem(){
 // $id=intval(JRequest::getVar('id'));
   $id = intval(Jrequest::getvar('catid'));
 $db = JFactory::getDBO();
               	$query = $db->getQuery(true)
			->select(array('i.*', 'c.cat_name'))
			->from('#__categoriya AS i')
			->join('left', '#__categoriya_stati AS c ON c.id = i.catid')
            ->Where("i.id=$id");
   $db->setQuery($query);
$result = $db->loadAssoc();
		return $result;
        }

    public function getEdit(){
  $id=intval(JRequest::getVar('id'));
 $db = JFactory::getDBO();
               	$query = $db->getQuery(true)
			->select(array('i.*', 'c.cat_name'))
			->from('#__categoriya AS i')
			->join('left', '#__categoriya_stati AS c ON c.id = i.catid')
            ->Where("i.id=$id");
   $db->setQuery($query);
$result = $db->loadAssoc();
		return $result;
        }



                                    // выборка категорий для списка
        public function getCategoriya(){
          $db = JFactory::getDBO();
           $query = $db->getQuery(true);
             $query-> select('*')
             ->from('#__categoriya_stati');
		$db->setQuery($query);
		$messages = $db->loadAssocList();
		return $messages;
        }

//сохранение данных по ссылке редактировать
        public function getSave(){
     // Обновляемые поля
        $catid = Jrequest::getvar('cat');
       // var_dump($catid);

        $id =   Jrequest::getvar('id');
        $greeting = Jrequest::getvar('greeting');
       	$file_name = JPATH_SITE . DS .'/images/'.$_FILES['image']['name'];
   $db = JFactory::getDBO();
   $query = $db->getQuery(true);
$query->update('#__categoriya')
->set("catid = '$catid'")
->set("greeting = '$greeting'")
->where("#__categoriya.id = $id;");
  if ($_FILES['image']['name']) {

 		$imege = 'images/'.$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], $file_name);


$query->set("image = '$imege'");
}

$db->setQuery($query);
      //  var_dump($_REQUEST);

if(!$db->query())
        return false;
        return true;
        }
    /**
     * Метод для получения данных, которые должны быть загружены в форму.
     *
     * @return  mixed  Данные для формы.
     */
    protected function loadFormData()
    {
        // Проверка сессии на наличие ранее введеных в форму данных.
        $data = JFactory::getApplication()->getUserState($this->option . '.edit.categoriya.data', array());

        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }



}