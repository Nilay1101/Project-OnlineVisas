<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Document
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: Highlight.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * Class representing a highlight annotation
 *
 * See PDF 32000-1:2008 - 12.5.6.10
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Document
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_Core_Document_Page_Annotation_Highlight
extends SetaPDF_Core_Document_Page_Annotation_TextMarkup
{
    /**
     * Creates a highlight annotation dictionary.
     *
     * @param SetaPDF_Core_DataStructure_Rectangle|array $rect
     * @return SetaPDF_Core_Type_Dictionary
     * @throws InvalidArgumentException
     */
    static public function createAnnotationDictionary($rect)
    {
        return parent::_createAnnotationDictionary($rect, SetaPDF_Core_Document_Page_Annotation::TYPE_HIGHLIGHT);
    }

    /**
     * The constructor.
     *
     * @param array|SetaPDF_Core_DataStructure_Rectangle|SetaPDF_Core_Type_AbstractType|SetaPDF_Core_Type_Dictionary|SetaPDF_Core_Type_IndirectObjectInterface $objectOrDictionary
     * @throws InvalidArgumentException
     */
    public function __construct($objectOrDictionary)
    {
        $dictionary = $objectOrDictionary instanceof SetaPDF_Core_Type_AbstractType
            ? $objectOrDictionary->ensure(true)
            : $objectOrDictionary;

        if (!($dictionary instanceof SetaPDF_Core_Type_Dictionary)) {
            $args = func_get_args();
            $objectOrDictionary = $dictionary = call_user_func_array(
                array('SetaPDF_Core_Document_Page_Annotation_Highlight', 'createAnnotationDictionary'),
                $args
            );
            unset($args);
        }

        if (!SetaPDF_Core_Type_Dictionary_Helper::keyHasValue($dictionary, 'Subtype', SetaPDF_Core_Document_Page_Annotation::TYPE_HIGHLIGHT)) {
            throw new InvalidArgumentException('The Subtype entry in a highlight annotation shall be "Highlight".');
        }

        parent::__construct($objectOrDictionary);
    }
}