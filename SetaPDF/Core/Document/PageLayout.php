<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Document
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: PageLayout.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * A class holding page layout properties
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Document
 * @license    http://www.setasign.com/ Commercial
 * @see SetaPDF_Core_Document::setPageLayout()
 */
class SetaPDF_Core_Document_PageLayout
{
    /**
     * Constant for page layout value
     *
     * Display one page at a time
     *
     * @var string
     */
    const SINGLE_PAGE = 'SinglePage';

    /**
     * Constant for page layout value
     *
     * Display the pages in one column
     *
     * @var string
     */
    const ONE_COLUMN = 'OneColumn';

    /**
     * Constant for page layout value
     *
     * Display the pages in two columns, with odd-numbered pages on the left
     *
     * @var string
     */
    const TWO_COLUMN_LEFT = 'TwoColumnLeft';

    /**
     * Constant for page layout value
     *
     * Display the pages in two columns, with odd-numbered pages on the right
     *
     * @var string
     */
    const TWO_COLUMN_RIGHT = 'TwoColumnRight';

    /**
     * Constant for page layout value
     *
     * (PDF 1.5) Display the pages two at a time, with odd-numbered pages on the left
     *
     * @var string
     */
    const TWO_PAGE_LEFT = 'TwoPageLeft';

    /**
     * Constant for page layout value
     *
     * (PDF 1.5) Display the pages two at a time, with odd-numbered pages on the right
     *
     * @var string
     */
    const TWO_PAGE_RIGHT = 'TwoPageRight';
}