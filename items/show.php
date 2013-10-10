<?php queue_js_url('//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-525629892de15af0'); ?>
<?php queue_js_string("
  addthis.layers({
    'theme' : 'transparent',
    'share' : {
      'position' : 'left',
      'numPreferredServices' : 5
    }   
  });
"); ?>
<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>

<div role="main">

<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

<aside>
    <?php if (metadata('item', 'has files')): ?>
    <?php $itemFiles = $item->Files; ?>
    <div class="images">
    <?php foreach ($itemFiles as $itemFile): ?>
        <a href="<?php echo file_display_url($itemFile, 'original'); ?>"><?php echo file_image('fullsize', array(), $itemFile); ?></a>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>
    
    <div id="item-citation" class="element">
        <h3><?php echo __('Citation'); ?></h3>
        <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
    </div>


    <div id="item-output-formats" class="element">
        <h3><?php echo __('Output Formats'); ?></h3>
        <div class="element-text"><?php echo output_format_list(); ?></div>
    </div>
    
</aside>

<?php echo all_element_texts('item'); ?>

<div id="mobile-content">
    
    <?php if ($description = metadata($item, array('Dublin Core', 'Description'))): ?>
    <h3>Description</h3>
    <?php echo $description; ?>
    <?php endif; ?>

    <?php if ($creator = metadata($item, array('Dublin Core', 'Creator'))): ?>
    <h3>Creator</h3>
    <?php echo $creator; ?>
    <?php endif; ?>    
    
    <?php if ($coverage = metadata($item, array('Dublin Core', 'Coverage'))): ?>
    <h3>Coverage</h3>
    <?php echo $coverage; ?>
    <?php endif; ?>    
    
    <?php if ($source = metadata($item, array('Dublin Core', 'Source'))): ?>
    <h3>Source</h3>
    <?php echo $source; ?>
    <?php endif; ?>

</div>

<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

</div>

<?php echo foot(); ?>
