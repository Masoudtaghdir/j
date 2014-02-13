<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем библиотеку представления Joomla.
jimport('joomla.application.component.view');
/**
 * HTML представление сообщения компонента Categoriya.
 */ 
class CategoriyaViewStatilist extends JViewLegacy
{
	/**
	 * Сообщение.
	 *
	 * @var  string
	 */
	protected $items;
    protected $Categoriya;
	/**
	 * Параметры.
	 *
	 * @var  object
	 */
	//protected $params;

	/**
	 * Переопределяем метод display класса JViewLegacy.
	 *
	 * @param   string  $tpl  Имя файла шаблона.
	 *
	 * @return  void
	 */


	public function display($tpl=NULL)
	{
		try
		{
          $catid = Jrequest::getvar('catid');
         // var_dump($catid);
		  if($catid==null) {
             $tpl='catlist';
          }

			// Получаем сообщение из модели.
			$this->items = $this->get('Items');
           	$this->Categoriya= $this->get('Categoriya');
			// Получаем параметры приложения.


			// Отображаем представление.
			parent::display($tpl );
		}
    	catch (Exception $e)
		{
			JFactory::getApplication()->enqueueMessage(JText::_('COM_CATEGORIYA_ERROR_OCCURRED'), 'error');
			JLog::add($e->getMessage(), JLog::ERROR, 'com_categoriya');
		}
	}

	/**
	 * Подготавливает документ.
	 *
	 * @return  void
	 */

}
