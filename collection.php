<?php

$app->on('collections.save.before', function($collectionName, &$entry, $isUpdate) use ($app) {

    $collection = $app->module('collections')->collection($collectionName);
    $key = "auto-increment";
    $options = $this->storage->getKey("cockpit/options", $key, null);

    foreach ($collection['fields'] as $field){
        if($field['type'] == 'repeater' && $entry[$field['name']] == '') {                                    
            $entry[$field['name']] = null;            
        }
    }
});