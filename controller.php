<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем библиотеку контроллера Joomla.
jimport('joomla.application.component.controller');

/**
 * Контроллер компонента Categoriya.
 */
class CategoriyaController extends JControllerLegacy
{
 function display($cachable = false)
        {

            JRequest::setVar('view', JRequest::getCmd('view', 'statlist'));
            // вызываем родительский метод
             parent::display($cachable);
        }
}
