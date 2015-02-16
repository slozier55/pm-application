<?php

/**
 * @file
 * Display Suite ds configuration.
 */

function ds_ds() {
  return array(
    'label' => t('ds'),
    'regions' => array(
      'header' => t('Header'),
      'left' => t('Left'),
      'right' => t('Right'),
      'footer' => t('Footer'),
    ),
    // Uncomment if you want to include a CSS file for this layout (ds.css)
    'css' => TRUE,
    // Uncomment if you want to include a preview for this layout (ds.png)
    // 'image' => TRUE,
  );
}
