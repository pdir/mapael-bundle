<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['mapaelElement'] = '{type_legend},type;{pdir_mapael_legend},pdir_mapael_map;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['pdir_mapael_map'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['pdir_mapael_map'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('tl_mapael_content', 'getMapaelMaps'),
    'eval'                    => array('tl_class'=>'w50'),
    'reference'               => &$GLOBALS['TL_LANG']['tl_content'],
    'sql'                     => "varchar(32) NOT NULL default ''"
);

class tl_mapael_content extends Backend
{
    /**
     * Return all content elements as array
     *
     * @return array
     */
    public function getMapaelMaps()
    {
        $values = array();
        $sources = $this->Database->prepare("SELECT id, pdir_mapael_name FROM tl_mapael")->execute();
        if ($sources->numRows < 1)
        {
            return $values;
        }

        //Array erzeugen
        while($sources->next())
        {
            $values[$sources->id] = $sources->pdir_mapael_name;
        }

        return $values;
    }
}