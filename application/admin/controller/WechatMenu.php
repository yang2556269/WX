<?php

namespace app\admin\controller;
use org\Menu;

class WechatMenu {
	/**
	 * 获得菜单
	 * @AuthorHTL
	 * @DateTime  2016-09-13T12:48:56+0800
	 * @return    [type]                   [description]
	 */
	public function getMenu()
	{
		$menu_list=Menu::getMenu();
		var_dump($menu_list);
	}
}