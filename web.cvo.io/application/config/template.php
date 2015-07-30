<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Active template
|--------------------------------------------------------------------------
|
| The $template['active_template'] setting lets you choose which template
| group to make active.  By default there is only one group (the
| "default" group).
|
*/
$template['active_template'] = 'dashboard';

/*
|--------------------------------------------------------------------------
| Explaination of template group variables
|--------------------------------------------------------------------------
|
| ['template'] The filename of your dashboard template file in the Views folder.
|   Typically this file will contain a full XHTML skeleton that outputs your
|   full template or region per region. Include the file extension if other
|   than ".php"
| ['regions'] Places within the template where your content may land.
|   You may also include default markup, wrappers and attributes here
|   (though not recommended). Region keys must be translatable into variables
|   (no spaces or dashes, etc)
| ['parser'] The parser class/library to use for the parse_view() method
|   NOTE: See http://codeigniter.com/forums/viewthread/60050/P0/ for a good
|   Smarty Parser that works perfectly with Template
| ['parse_template'] FALSE (default) to treat dashboard template as a View. TRUE
|   to user parser (see above) on the dashboard template
|
| Region information can be extended by setting the following variables:
| ['content'] Must be an array! Use to set default region content
| ['name'] A string to identify the region beyond what it is defined by its key.
| ['wrapper'] An HTML element to wrap the region contents in. (We
|   recommend doing this in your template file.)
| ['attributes'] Multidimensional array defining HTML attributes of the
|   wrapper. (We recommend doing this in your template file.)
|
| Example:
| $template['default']['regions'] = array(
|    'header' => array(
|       'content' => array('<h1>Welcome</h1>','<p>Hello World</p>'),
|       'name' => 'Page Header',
|       'wrapper' => '<div>',
|       'attributes' => array('id' => 'header', 'class' => 'clearfix')
|    )
| );
|
*/

/*
|--------------------------------------------------------------------------
| Default Template Configuration (adjust this or create your own)
|--------------------------------------------------------------------------
*/
// Template for admin:
$template['dashboard']['template'] = 'template/dashboard_template';
$template['dashboard']['regions'] = array(
    'head',
    'header',
    'breadcrumb',
    'sidebar_menu',
    'profile',
    'content',
);
$template['dashboard']['parser'] = 'parser';
$template['dashboard']['parser_method'] = 'parse';
$template['dashboard']['parse_template'] = FALSE;


$template['authorize']['template'] = 'template/authorize_template';
$template['authorize']['regions'] = array(
    'head',
    'header',
    'breadcrumb',
    'content',
);
$template['authorize']['parser'] = 'parser';
$template['authorize']['parser_method'] = 'parse';
$template['authorize']['parse_template'] = FALSE;

$template['home']['template'] = 'template/home_template';
$template['home']['regions'] = array(
    'logo',
    'breadcrumb',
    'header',
    'content',
);
$template['home']['parser'] = 'parser';
$template['home']['parser_method'] = 'parse';
$template['home']['parse_template'] = FALSE;
/* End of file template.php */
/* Location: ./system/application/config/template.php */