<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function dtu_theme_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  dtu_theme_preprocess_html($variables, $hook);
  dtu_theme_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function dtu_theme_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function dtu_theme_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function dtu_theme_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // dtu_theme_preprocess_node_page() or dtu_theme_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function dtu_theme_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function dtu_theme_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function dtu_theme_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

function dtu_theme_form_islandora_solr_simple_search_form_alter(&$form, &$form_state, $form_id) {
  $link = array(
    '#markup' => l(t("Search tips"), "node/7", array('attributes' => array('class' => array('adv_search')))),
  );
  $form['simple']['advanced_link'] = $link;
}

/*
 *    Custom Login form
 */

function dtu_theme_form_alter(&$form, &$form_state, $form_id) {

    if ( TRUE === in_array( $form_id, array( 'user_login', 'user_login_block') ) ) {

        // Javascript placeholders for Username and Password (old browsers)
        // Almost all browsers support HTML5 nowadays
        // If you don't want it remove it : )
        $form['name']['#title_display']['onblur'] = "if (this.value == '') {this.value = 'Username';}";
        $form['name']['#title_display']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
        $form['pass']['#title_display']['onblur'] = "if (this.value == '') {this.value = 'Password';}";
        $form['pass']['#title_display']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";

        // "Login" form (no label, no description and with HTML5 placeholder)
        $form['name']['#title_display'] = "invisible";
        $form['pass']['#title_display'] = "invisible";
        $form['name']['#attributes']['placeholder'] = t( 'Username' );
        $form['pass']['#attributes']['placeholder'] = t( 'Password' );
        $form['name']['#description'] = t('');
        $form['pass']['#description'] = t('');
    }

    if ($form_id == 'user_pass') {

        // Javascript placeholders for Request Password page (old browsers)
        // Almost all browsers support HTML5 nowadays
        // If you don't want it remove it : )
        $form['name']['#title_display']['onblur'] = "if (this.value == '') {this.value = 'Type your username or e-mail address';}";
        $form['name']['#title_display']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";

        // "Request new password" form (no label and with HTML5 placeholder)
        $form['name']['#title_display'] = "invisible";
        $form['name']['#attributes']['placeholder'] = t( 'Type your username or e-mail address' );
    }

}