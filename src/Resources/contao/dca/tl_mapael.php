<?php

use Contao\CoreBundle\Config\ResourceFinder;

$GLOBALS['TL_DCA']['tl_mapael'] = [
    'config' => [
        'dataContainer' => 'Table',
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
            ],
        ],
    ],

    'list' => [
        'sorting' => [
            'mode' => 2,
            'fields' => ['pdir_mapael_name'],
            'flag' => 1,
            'panelLayout' => 'sort,search,limit',
        ],

        'label' => [
            'fields' => ['pdir_mapael_name'],
            'format' => '%s',
        ],

        'global_operations' => [
            'all' => [
                'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"',
            ],
        ],

        'operations' => [
            'edit' => [
                'label' => &$GLOBALS['TL_LANG']['tl_mapael']['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.gif',
            ],

            'delete' => [
                'label' => &$GLOBALS['TL_LANG']['tl_mapael']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\''.$GLOBALS['TL_LANG']['MSC']['deleteConfirm'].'\'))return false;Backend.getScrollOffset()"',
            ],

            'show' => [
                'label' => &$GLOBALS['TL_LANG']['tl_mapael']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif',
                'attributes' => 'style="margin-right: 3px"',
            ],
        ],
    ],

    'palettes' => [
        'default' => 'pdir_mapael_name,pdir_mapael_width',
    ],

    'fields' => [
        'id' => [
            'sql' => 'int(10) unsigned NOT NULL auto_increment',
        ],

        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ],

        'pdir_mapael_name' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mapael']['pdir_mapael_name'],
            'exclude' => true,
            'inputType' => 'select',
            'eval' => [
                'mandatory' => true,
                'maxlength' => 255,
            ],
            'sql' => "varchar(255) NOT NULL default ''",
            //'options' => array('world_countries' => 'Länder der Welt', 'usa_states' => 'USA Bundesstaaten', 'france_departments' => 'Frankreich Départements'),
            'options_callback' => array('tl_mapael','getAllMaps')
        ],

        'pdir_mapael_width' => [
            'label' => &$GLOBALS['TL_LANG']['tl_mapael']['pdir_mapael_width'],
            'exclude' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 255,
            ],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
    ],
];

class tl_mapael extends Backend {

    public function getAllMaps() {

        $arrAllTemplates = array();

        $mapDirs = \System::getContainer()->getParameter('contao.web_dir') . '/bundles/pdirmapael/js/maps';
        $i = 0;
		foreach (scan($mapDirs) as $mapDir)
		{
			//echo "<br>DIR:" . $mapDir;
            $arrAllTemplates[$mapDir] = array();

            $filesArr = array();
            $mapFiles = \System::getContainer()->getParameter('contao.web_dir') . '/bundles/pdirmapael/js/maps/' . $mapDir;
            foreach (scan($mapFiles) as $mapFile)
            {
                //echo "<br>FILE:" . $mapFile;
                $arrAllTemplates[$mapDir][$mapDir."/".$mapFile] = $mapFile;
            }
            $i++;
		}

        //echo "<pre>"; print_r($arrAllTemplates); echo "</pre>";

        return $arrAllTemplates;
    }
}