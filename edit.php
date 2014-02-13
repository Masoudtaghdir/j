<?php
define('_JEXEC', 1);
define('JPATH_BASE', preg_replace('|\Scomponents\Scom_.*?\Sedit.php|i', '', __FILE__));
define('DS', DIRECTORY_SEPARATOR);

require_once JPATH_BASE.'/includes/defines.php';
require_once JPATH_BASE.'/includes/framework.php';

    $cat = intval(JRequest::getVar('id'));
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__categoriya');
    $query->where("catid=$cat");
    $db->setQuery($query);
foreach($db->loadAssocList() as $row)
{

    $item[] = array(
    'img' => $row['image'],
    'greeting' => $row['greeting'],
    'category_id' => $row['catid'],
    'id' => $row['id']);
}
$result = array('type'=>'success', 'item'=>$item);
// var_dump($row['id']);
echo json_encode($result);
//test