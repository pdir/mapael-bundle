<?php

use Pdir\MapaelBundle\Element\MapaelElement;

/**
* Backend Modules
*/
array_insert($GLOBALS['BE_MOD'], 1, array('pdir' => array()));

$GLOBALS['BE_MOD']['pdir']['mapael'] = [
    'tables' => ['tl_mapael']
];

/**
 * Insert the Mapael Category
 */
array_insert($GLOBALS['TL_CTE'], 1, array('mapael' => array()));

/**
 * Content Elements
 */
$GLOBALS['TL_CTE']['pdir']['mapaelElement'] = MapaelElement::class;

/**
 * Miscellaneous
 */
$GLOBALS['TL_CONFIG']['mapsFiles'] = 'js';