Activate plugin
Add assign images to the page in Pages management
Add <?php echo ipSlot('pageImage'); ?> code to your theme to display images
Use \Plugin\PageImage\Service::pageImages($pageId = null) to get all images assigned to the page.
