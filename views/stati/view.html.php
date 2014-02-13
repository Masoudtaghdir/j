<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем библиотеку представления Joomla.
jimport('joomla.application.component.view');

/**
 * HTML представление редактирования сообщения.
 */
class CategoriyaViewStati extends JViewLegacy
{
    /**
     * Сообщение.
     *
     * @var  object
     */
    protected $item;
    protected $categoriya;
    /**
    /**
     * Объект формы.
     *
     * @var  array
     */
    protected $form;

    /**
     * Отображает представление.
     *
     * @param   string  $tpl  Имя файла шаблона.
     *
     * @return  void
     *
     * @throws  Exception
     */
    public function display($tpl = null)
    {
        try
        {  if (Jrequest::getvar('save')){
                $this->get('Save');   }
       
            // Получаем данные из модели.
            //$this->form = $this->get('Form');
            $this->item = $this->get('Item');
            $this->edit = $this->get('Edit');

            $this->categoriya=$this->get('Categoriya');
                 // Отображаем представление.
            parent::display($tpl);
        }
        catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Устанавливает панель инструментов.
     *
     * @return  void
     */

}