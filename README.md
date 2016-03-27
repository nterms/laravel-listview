# laravel-listview
List view blade extension for laravel 5.x.

## Roadmap

- Render a list of items in HTML format using a view file.
- Complatible with Eloquent result sets.
- Group by feature.
- Searching & Sorting
- Pagination
- Pjax compatibility


## Requirements

- Laravel 5.x

## Installation

The best way to install this is using [composer](http://getcomposer.org).

```
$ composer require nterms/laravel-listview
```

## Usage

List-view is a blade extension and has to be registered as a service provider 
use it in your blade templates.

Add folowing line to the `$providers` array in the `config/app.php` file.

```
Nterms\ListView\ListViewServicePorvider::class
```

Then, you may use the `@listview` blade directive with and array of items 
to render them in a list view similar to you do with `@each` blade directive.

```php
@listview('view.name', $items, 'item', 'view.empty', $options)
```


## Options

Options array may contain following options to customize the rendered output.

- `groupBy` - Group items by this attribute. (not implemented)


## License

MIT license. Please see [LICENSE](LICENSE) for more details.
