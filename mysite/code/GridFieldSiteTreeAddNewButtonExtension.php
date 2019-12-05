<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\ORM\DataExtension;

class GridFieldSiteTreeAddNewButtonExtension extends DataExtension {

	public function getAllowedChildren(SiteTree $parent) {
		$allowedChildren = $parent->allowedChildren();
		if (empty($allowedChildren)) {
			return array();
		}

		$children = array();
		foreach ($allowedChildren as $class) {
			$children[$class] = Injector::inst()->create($class)->i18n_singular_name();
		}
		return $children;
	}

}
