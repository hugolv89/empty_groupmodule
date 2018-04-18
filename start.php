<?php
/**
 * Empty Group Module Plugin
 */

namespace HLV\empty_groupmodule;

const PLUGIN_ID = 'empty_groupmodule';

//register the plugin hook handler
elgg_register_event_handler('init', 'system', __NAMESPACE__.'\\init');

/**
 * plugin init function
 */
function init() {
	
	elgg_register_plugin_hook_handler('view', 'groups/profile/module',  __NAMESPACE__.'\\alter_group_module');

}

function alter_group_module($hook, $type, $returnvalue, $params) {
    // we only want to alter when viewtype is "default"
    if ($params['viewtype'] !== 'default') {
        return $returnvalue;
    }

	$content = $params['vars']['content'];
	
    // output nothing if the content doesn't have a single link
    if (false === strpos($content, '<a ')) {
        return '';
    }
	
    // returning nothing means "don't alter the returnvalue"
}
