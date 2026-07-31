# Installing explayouts_standard

## Requirements

- Exponential Legacy / Exponential 6, PHP 8.1+
- `extension/explayouts` (defines `expLayoutsBlockHandlerInterface` and reads the block definitions from `explayouts.ini`)

## 1. Put the extension in place

```
extension/explayouts_standard
```

## 2. Activate

Add it to the active extensions in `settings/override/site.ini.append.php`:

```ini
[ExtensionSettings]
ActiveExtensions[]=explayouts_standard
```

(or `ActiveAccessExtensions[]` in a siteaccess `site.ini.append.php`).

The extension ships no INI settings, modules or templates of its own — only handler classes plus an `autoloads/explayouts_standard_autoload.php` class map. Handlers become usable once referenced from `explayouts.ini` block definitions (see doc/USAGE.md).

## 3. Regenerate autoloads and clear caches

```bash
php bin/php/ezpgenerateautoloads.php -e
php bin/php/ezcache.php --clear-all --purge --allow-root-user
```
