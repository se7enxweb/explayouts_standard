Exponential Layouts Standard
============================

General description
-------------------

Exponential Layouts Standard (`explayouts_standard`) is the standard block handler set for Exponential Layouts on Exponential 6 / Exponential Legacy. It provides 22 self-contained block handlers (`expLayoutsStandard*BlockHandler`), each implementing `expLayoutsBlockHandlerInterface` from the `explayouts` extension with `getParameters()` (parameter definitions for the editing UI) and `getValues( $block )` (values for the view template).

It is an Exponential Legacy port inspired by the `netgen/layouts-standard` package. Note that the `explayouts` extension also ships its own built-in handler set (`expLayouts*BlockHandler`); the default `explayouts.ini` wires those built-ins, and this extension offers a parallel, standalone set that can be wired per block definition.

This extension provides the following capabilities:

- Content blocks - Text, Title, Markdown-like text, raw HTML snippet and Quote handlers for editorial content.
- Media blocks - Image, Gallery, Carousel, Map and Video handlers for media-driven blocks.
- Content listing blocks - List, Single item, Card and Grid handlers for presenting Exponential content.
- Interactive blocks - Accordion and Tabs handlers for collapsible/tabbed presentation.
- UI element blocks - Button, Alert, Badge, Progress bar, Divider and Spacer handlers for page furniture.
- Drop-in wiring - Any handler can be attached to a new block identifier or swapped in for a shipped block through a plain `explayouts.ini` override, with no code changes.

Features
--------

The following features are provided by the Exponential Layouts Standard extension:

- 22 self-contained handlers - Every handler is a single stateless class with no dependencies beyond `expLayoutsBlockHandlerInterface`; handlers are instantiated per call by `expLayoutsBlockHandlerFactory`.
- Uniform handler contract - `getParameters()` returns the parameter definitions that drive the block edit form (name, type: text/textarea/select/checkbox, default, options); `getValues( $block )` receives the prepared block array (with a `parameters` hash) and returns the variables for the block view template.
- INI-only wiring - Handlers become usable once referenced from `explayouts.ini` block definitions (`BlockDefinition_<identifier>` with `Handler=`); you can add new block identifiers or swap the handler of a shipped block (e.g. `[BlockDefinition_text] Handler=expLayoutsStandardTextBlockHandler`).
- View type mapping - Each `BlockDefinition_<identifier>` lists its `ViewTypes[]`; the view type selected on a block decides which view template renders it. All standard handlers ship with the `default` view type; more can be added per definition with matching templates in your design.
- Dependency-free Markdown - `expLayoutsStandardMarkdownBlockHandler` escapes the content (`htmlspecialchars`), converts newlines to `<br>`, and — when `use_emphasis` is enabled — converts `**bold**` and `*italic*` markers to `<strong>`/`<em>`. It deliberately does not require a CommonMark library.
- No configuration of its own - The extension ships no INI settings, modules or templates — only handler classes plus an `autoloads/explayouts_standard_autoload.php` class map.
- Extendable bases - The handlers are convenient base classes: subclass one in your own extension and override only `getValues()` to change rendering data.

The full handler set:

| Class | Block |
|-------|-------|
| `expLayoutsStandardTextBlockHandler` | Text (textarea content) |
| `expLayoutsStandardTitleBlockHandler` | Title (heading level, optional link) |
| `expLayoutsStandardMarkdownBlockHandler` | Markdown-like text (escaped, line breaks, optional emphasis) |
| `expLayoutsStandardHtmlSnippetBlockHandler` | Raw HTML snippet |
| `expLayoutsStandardImageBlockHandler` | Image |
| `expLayoutsStandardButtonBlockHandler` | Button / call to action |
| `expLayoutsStandardListBlockHandler` | Content list |
| `expLayoutsStandardSingleBlockHandler` | Single content item |
| `expLayoutsStandardCardBlockHandler` | Card |
| `expLayoutsStandardGridBlockHandler` | Grid |
| `expLayoutsStandardGalleryBlockHandler` | Gallery |
| `expLayoutsStandardCarouselBlockHandler` | Carousel |
| `expLayoutsStandardAccordionBlockHandler` | Accordion |
| `expLayoutsStandardTabsBlockHandler` | Tabs |
| `expLayoutsStandardQuoteBlockHandler` | Quote |
| `expLayoutsStandardAlertBlockHandler` | Alert |
| `expLayoutsStandardBadgeBlockHandler` | Badge |
| `expLayoutsStandardProgressBlockHandler` | Progress bar |
| `expLayoutsStandardDividerBlockHandler` | Divider |
| `expLayoutsStandardSpacerBlockHandler` | Spacer |
| `expLayoutsStandardMapBlockHandler` | Map |
| `expLayoutsStandardVideoBlockHandler` | Video |

Version
-------

- The current version of Exponential Layouts Standard is 1.0.0
- Last Major update: July 30, 2026

Copyright
---------

- Exponential Layouts Standard is copyright 1998 - 2026 7x
- See: [LICENSE.md](LICENSE.md) for more information on the terms of the copyright and license

License
-------

Exponential Layouts Standard is licensed under the GNU General Public License.

The complete license agreement is included in the [LICENSE.md](LICENSE.md) file.

Exponential Layouts Standard is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License or at your
option a later version.

Exponential Layouts Standard is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

The GNU GPL gives you the right to use, modify and redistribute
Exponential Layouts Standard under certain conditions. The GNU GPL license
is distributed with the software, see the file LICENSE.md.

It is also available at http://www.gnu.org/licenses/gpl.txt

You should have received a copy of the GNU General Public License
along with Exponential Layouts Standard in LICENSE.md. If not, see http://www.gnu.org/licenses/.

Using Exponential Layouts Standard under the terms of the GNU GPL is free (as in freedom).

For more information or questions please contact
info@se7enx.com

Requirements
------------

The following requirements exists for using the Exponential Layouts Standard extension:

Exponential version
- Make sure you use Exponential 6 / eZ Publish Legacy (required) or higher.

PHP version
- Make sure you have PHP 8.1 or higher.

Sibling extensions
- Required: `extension/explayouts` — it defines `expLayoutsBlockHandlerInterface` and reads the block definitions from `explayouts.ini`.

Installation
------------

In short: place the extension in `extension/explayouts_standard`, activate it via `site.ini` `[ExtensionSettings] ActiveExtensions[]` (or per siteaccess via `ActiveAccessExtensions[]`), then regenerate autoloads and clear all caches. The extension ships no INI settings, modules or templates of its own — only handler classes plus an `autoloads/explayouts_standard_autoload.php` class map. Handlers become usable once referenced from `explayouts.ini` block definitions.

See [INSTALL.md](INSTALL.md) for the full step-by-step installation instructions.

Usage
-----

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

Every handler implements the same contract:

```php
<?php
$handler = new expLayoutsStandardTitleBlockHandler();

$definitions = $handler->getParameters();            // drives the block edit form
$values = $handler->getValues( array(
    'parameters' => array( 'title' => 'Welcome', 'level' => '2' ),
) );                                                 // variables for the view template
```

See [doc/USAGE.md](doc/USAGE.md) for exhaustive scenarios: how handlers are wired, the handler contract, how view types map to templates, the Markdown handler behavior, and the full customization guide covering the settings layer (INI cascade — where to place `BlockDefinition_*` overrides), the template layer (design override cascade for block view templates) and the PHP layer (writing or subclassing handlers).

Documentation
-------------

| Document | Description |
|----------|-------------|
| [INSTALL.md](INSTALL.md) | Step-by-step installation: activation and autoloads |
| [doc/USAGE.md](doc/USAGE.md) | Wiring handlers and view types, handler contract, customization layers |
| [doc/FAQ.md](doc/FAQ.md) | Answers to the most common questions and problems |
| [doc/TODO.md](doc/TODO.md) | Known gaps and planned improvements |
| [doc/SUPPORT.md](doc/SUPPORT.md) | How and where to get help |
| [LICENSE.md](LICENSE.md) | The complete GNU General Public License agreement |

Troubleshooting
---------------

Read the FAQ
- Some problems are more common than others. The most common ones are listed in [doc/FAQ.md](doc/FAQ.md).

Use our support systems
- If you have questions not handled by this document or the FAQ, you can reach us via [7x : se7enx.com](https://se7enx.com).
- If you find a bug or defect, please report it to the [Exponential Layouts Standard: Issue Tracker](https://github.com/se7enxweb/explayouts_standard/issues).
