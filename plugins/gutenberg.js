var wp = window.wp;
wp.domReady(function () {

  // Remove core/button block style variations
  // https://www.billerickson.net/block-styles-in-gutenberg/
  if (window.luuptekGutenbergSettings.disableButtonStyles) {
    wp.blocks.unregisterBlockStyle("core/button", [
      "default",
      "outline",
      "squared",
      "fill"
    ]);
  }

  // Remove core/quote block style variations
  if (window.luuptekGutenbergSettings.disableQuoteStyles) {
    wp.blocks.unregisterBlockStyle("core/quote", ["default", "plain"]);
  }

  // Remove core/pullquote block style variations
  if (window.luuptekGutenbergSettings.disablePullQuoteStyles) {
    wp.blocks.unregisterBlockStyle("core/pullquote", [
      "default",
      "solid-color"
    ]);
  }

  // Remove text-color format option, if we have disabled color palette
  // https://wordpress.stackexchange.com/questions/386364/how-to-remove-buttons-from-gutenberg-toolbar
  if (window.luuptekGutenbergSettings.disableTextColor) {
    wp.richText.unregisterFormatType("core/text-color");
  }

  // Add spacer block variations
  wp.blocks.registerBlockStyle('core/spacer', {
    name: 'responsive-large',
    label: 'Iso',
  });

  wp.blocks.registerBlockStyle('core/spacer', {
    name: 'responsive-medium',
    label: 'Keskikokoinen',
    isDefault: true
  });

  wp.blocks.registerBlockStyle('core/spacer', {
    name: 'responsive-small',
    label: 'Pieni',
  });
});
