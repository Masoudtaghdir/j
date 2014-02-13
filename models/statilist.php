<?php
/**
 * @component  com_carousel
 * @author-company seon.com.ua
 * @copyright Copyright (c) 2013 seon.com.ua
 * @license  GNU/GPL, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */
defined('_JEXEC') or die('');

jimport('joomla.application.component.modelitem');


class CategoriyaModelStatiList extends JModelItem {

   	public function getItems($id = null)
	{
	  $id = intval(Jrequest::getvar('catid'));
	   	$db = JFactory::getDBO();
		$query = $db->getQuery(true);
               	$query = $db->getQuery(true)
			->select(array('i.*', 'c.cat_name'))
			->from('#__categoriya AS i')
			->join('left', "#__categoriya_stati AS c ON c.id = i.catid")
            ->Where("i.catid=$id");
		$db->setQuery($query);
		return $db->loadObjectList();
	}

          public function getCategoriya(){
          $db = JFactory::getDBO();
           $query = $db->getQuery(true);
             $query-> select('*')
             ->from('#__categoriya_stati');
		$db->setQuery($query);
		$messages = $db->loadAssocList();

		return $messages;
        }

}
