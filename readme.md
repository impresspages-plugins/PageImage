# Activate plugin
1. Add assign images to the page in Pages management
2. Add <?php echo ipSlot('pageImage'); ?> code to your theme to display images
3. Use \Plugin\PageImage\Service::pageImages($pageId = null) to get all images assigned to the page.
