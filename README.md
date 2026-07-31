# explayouts_standard

Standard block handler set for Exponential Layouts on Exponential Legacy / Exponential 6. It provides 22 self-contained block handlers (`expLayoutsStandard*BlockHandler`), each implementing `expLayoutsBlockHandlerInterface` from the `explayouts` extension with `getParameters()` (parameter definitions for the editing UI) and `getValues( $block )` (values for the view template).

Exponential Legacy port inspired by the `netgen/layouts-standard` package. Note that the `explayouts` extension also ships its own built-in handler set (`expLayouts*BlockHandler`); the default `explayouts.ini` wires those built-ins, and this extension offers a parallel, standalone set that can be wired per block definition.

## Block handlers

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

## Documentation

- [INSTALL.md](INSTALL.md) — activation
- [doc/USAGE.md](doc/USAGE.md) — wiring handlers and view types, customization
- [doc/FAQ.md](doc/FAQ.md) — common questions
- [doc/TODO.md](doc/TODO.md) — known gaps
- [doc/SUPPORT.md](doc/SUPPORT.md) — how to get help
