# Page Image

This plugin provides an interface in Pages management to add unlimited number of files to any page.

1. Activate plugin
2. Add assign images to the page in Pages management
3. Add <?php echo ipSlot('pageImage'); ?> code to your theme to display images, or add Add <?php echo ipSlot('bkgImage'); ?> inside an HTML element to add a background image via style attribute, e.g. `<div <?php echo ipSlot('bkgImage'); ?> >`
4. Use \Plugin\PageImage\Service::pageImages($pageId = null) to get all images assigned to the page.
