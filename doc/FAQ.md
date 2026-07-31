# explayouts_standard FAQ

## How does this differ from netgen/layouts-standard?

`netgen/layouts-standard` provides Symfony-configured block definitions, plugins and Twig templates. This extension ports the block vocabulary to plain PHP handler classes implementing `expLayoutsBlockHandlerInterface`; definitions and view types are declared in `explayouts.ini` instead of YAML, and rendering templates come from the eZ design cascade.

## Are these handlers active by default?

No. The default `explayouts.ini` shipped with `explayouts` wires that extension's built-in `expLayouts*BlockHandler` classes. The `expLayoutsStandard*` handlers become active only where an INI override points a `BlockDefinition_*` `Handler=` at them.

## Why do both explayouts and explayouts_standard have a text/title/image handler?

`explayouts` ships built-ins so the page builder works standalone; this extension mirrors the upstream `netgen/layouts-standard` package layout so the standard set can evolve independently and be swapped in per block definition.

## Which database tables does it own?

None. Handlers only read the block parameter values that `explayouts` stores in `explayouts_block_parameter`.

## Does the Markdown handler support full CommonMark?

No. It intentionally supports only escaping, line breaks and `**bold**`/`*italic*` emphasis, because the legacy stack ships no CommonMark parser. See doc/TODO.md.
