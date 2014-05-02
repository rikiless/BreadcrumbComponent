<?php

namespace Rikiless\BreadcrumbComponent;
use Nette\Application\UI;

/**
 * Basic component rendering responsive breadcrumb
 *
 * @author Richard Tekel <richardtekel@me.com>
 */
class Control extends UI\Control
{

	/** @var array */
	private $homepage = [];

	/** @var array */
	private $items = [];



	public function setHomepage($name = '', $link = '')
	{
		$this->homepage = [
			'name' => $name,
			'link' => $link
		];
	}



	public function add($name = '', $link = '')
	{
		$this->items[] = [
			'name' => $name,
			'link' => $link
		];
		return $this;
	}



	public function render()
	{
		$this->template->homepage = !empty($this->homepage) ? $this->homepage : [
			'name' => 'Home',
			'link' => $this->presenter->link('Homepage:default')
		];
		$this->template->items = $this->items;
		$this->template->backLink = (count($this->items) >= 2 and !empty($this->items[count($this->items)-2]['link'])) ? $this->items[count($this->items)-2] : FALSE;
		$this->template->setFile(__DIR__. '/templates/breadcrumb.latte');
		$this->template->render();
	}

}
