BreadcrumbComponent
===

Basic component rendering breadcrumb for websites using Nette Framework.

Included template is compatible with Bootstrap 3.2 *

Requirements
---

This package requires PHP 5.4.

- [nette/application](https://github.com/nette/application/)

Installation
---

The best way to install this package is using [Composer](https://getcomposer.org):

```sh
$ composer require "rikiless/breadcrumb-component:@dev"
```

And register the factory in ``config.neon``:

```neon
services:
    - Rikiless\BreadcrumbComponent\IControl
```

Use
---

Inject to presenter:

```php
class Presenter ... {

    /**
     * @var Rikiless\BreadcrumbComponent\IControl
     * @inject
     */
    public $breadcrumbControl;

    public function createComponentBreadcrumb()
    {
        return $this->breadcrumbControl->create();
    }

}
```

Render in template:

```latte
{control breadcrumb}
```

### Add items to breadcrumb

```php
class CatalogPresenter ... {

    public function actionEpisode($id)
    {
        //$episode = ...($id);

		$this['breadcrumb']
			->add('Series', $this->link('Homepage:genres'))
			->add($episode->show->name, $this->link('Homepage:show', $episode->show->url))
			->add('All episodes', $this->link('Homepage:episodes', $episode->show->url))
			->add($episode->show->name);
    }

}
```

Rendered examples:

![Example 1](http://github.rikiho.net/breadcrumb-component-1.png)

![Example 2](http://github.rikiho.net/breadcrumb-component-2.png)

\* In default template is use of classes ``.visible-sm`` mixed with ``.visible-lg`` and it seems to be [broken](https://github.com/twbs/bootstrap/issues/12015) in Bootstrap 3.1.
