# explayouts_standard TODO

- The handlers are not wired by default: shipped `explayouts.ini` block definitions point at the `expLayouts*` built-ins. Decide whether this set should replace the built-ins or provide an INI preset that activates it.
- Markdown handler supports only emphasis and line breaks; integrate a real CommonMark parser if one becomes available on the stack.
- Only the `default` view type is defined for each block; upstream `netgen/layouts-standard` offers multiple view types per block.
- No automated tests for `getParameters()`/`getValues()` behavior.
