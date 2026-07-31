# Using explayouts_standard

## How handlers are wired

Block definitions live in `explayouts.ini` (owned by the `explayouts` extension). A block identifier maps to a handler class via the `Handler=` setting; `expLayoutsBlockHandlerFactory::get( $identifier )` instantiates it. To use a handler from this extension, point a block definition at it in an INI override:

```ini
[BlockSettings]
AvailableBlocks[]=markdown
AvailableBlocks[]=html_snippet

[BlockDefinition_markdown]
Name=Markdown
Handler=expLayoutsStandardMarkdownBlockHandler
ViewTypes[]=default

[BlockDefinition_html_snippet]
Name=HTML snippet
Handler=expLayoutsStandardHtmlSnippetBlockHandler
ViewTypes[]=default
```

You can also swap a shipped block to the standard implementation without adding a new identifier:

```ini
[BlockDefinition_text]
Handler=expLayoutsStandardTextBlockHandler
```

## Handler contract

Every handler implements `expLayoutsBlockHandlerInterface` from `explayouts`:

```php
<?php
$handler = new expLayoutsStandardTitleBlockHandler();

// Parameter definitions drive the block edit form
// (name, type: text/textarea/select/checkbox, default, options)
$definitions = $handler->getParameters();

// Values for the view template, computed from the stored block parameters
$values = $handler->getValues( array(
    'parameters' => array(
        'title' => 'Welcome',
        'level' => '2',
    ),
) );
```

`getValues()` receives the prepared block array (with a `parameters` hash) and returns the variables the block view template can use.

## How view types map

Each `BlockDefinition_<identifier>` lists its `ViewTypes[]`. The view type selected on a block decides which view template renders it in the frontend design (see the block templates under `extension/explayouts/design/standard/templates/explayouts/`). All standard handlers ship with the `default` view type; add more view types in the INI override and provide a matching template in your design to offer alternative renderings of the same block data.

## Example: Markdown handler behavior

`expLayoutsStandardMarkdownBlockHandler` escapes the content (`htmlspecialchars`), converts newlines to `<br>`, and — when `use_emphasis` is enabled — converts `**bold**` and `*italic*` markers to `<strong>`/`<em>`. It deliberately does not require a CommonMark library.

## Customization

### Settings layer (INI cascade)

This extension has no INI files; all wiring happens in `explayouts.ini`, resolved through the standard cascade: `extension/explayouts/settings/` defaults, then `settings/siteaccess/<siteaccess>/`, then siteaccess settings shipped in active extensions, then `settings/override/`. Put the `BlockDefinition_*` overrides shown above in `settings/override/explayouts.ini.append.php` (site-wide) or a siteaccess variant (per site).

### Template layer (design override cascade)

Handlers only compute values; markup comes from the block view templates in the active design. Override a block's rendering by shipping the same-relative-path template in your own design extension (e.g. `extension/mytheme/design/mydesign/templates/explayouts/...`), which wins over `design/standard` via the design cascade.

### PHP layer (safe extension points)

- Write your own handler implementing `expLayoutsBlockHandlerInterface` in your extension; these classes are also convenient bases to extend (e.g. `class myTitleBlockHandler extends expLayoutsStandardTitleBlockHandler` overriding only `getValues()`).
- Handlers are stateless and instantiated per call by `expLayoutsBlockHandlerFactory`; keep them side-effect free.
