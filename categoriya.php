<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем логирование.
JLog::addLogger(
	array('text_file' => 'com_Categoriya.php'),
	JLog::ALL,
	array('com_categoriya')
);
   $doc = & JFactory::getDocument();

$doc->addScript(JURI::root(true) . "/components/com_categoriya/js/jquery-2.0.2.js");
$doc->addScript(JURI::root(true) . "/components/com_categoriya/js/statilist.js");

// Устанавливаем обработку ошибок в режим использования Exception.
JError::$legacy = false;

// Подключаем библиотеку контроллера Joomla.
jimport('joomla.application.component.controller');

// Получаем экземпляр контроллера с префиксом Categoriya.
$controller = JControllerLegacy::getInstance('Categoriya');

// Исполняем задачу task из Запроса.
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task', 'display'));

// Перенаправляем, если перенаправление установлено в контроллере.
$controller->redirect();
