<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Market\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use DateTime;

class DayWeekMonth extends AbstractPlugin
{
	public function __invoke()
	{
    $datetime = new DateTime('tomorrow');
    $result = $datetime->format('Y-m-d');
    return $result;
	}
}
