<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Document
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: Png.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * Class representing an PNG image
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Image
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_Core_Image_Png extends SetaPDF_Core_Image
{
    /**
     * Palette data
     *
     * @var string
     */
    protected $_palette = '';

    /**
     * Transparency data
     *
     * @var array
     */
    protected $_transparency = array();

    /**
     * Image data
     *
     * @var string
     */
    protected $_imageData = '';

    /**
     * Processes the image data so all needed information is available.
     */
    protected function _process()
    {
        $this->_binaryReader->reset(8, 4);

        $dataLength = $this->_binaryReader->readUInt32();
        if (13 !== $dataLength) {
        	throw new SetaPDF_Core_Image_Exception(sprintf('Invalid IHDR chunk length (%s).', $dataLength));
        }

        $chunkName = $this->_binaryReader->readBytes(4);
        if ('IHDR' !== $chunkName) {
            throw new SetaPDF_Core_Image_Exception(sprintf('Invalid chunk name (%s).', $chunkName));
        }

        $this->_width = $this->_binaryReader->readUInt32();
        $this->_height = $this->_binaryReader->readUInt32();
        $this->_bitsPerComponent = $this->_binaryReader->readUInt8();
        $this->_colorSpace = $this->_binaryReader->readUInt8();

        if (0 !== $this->_binaryReader->readUInt8()) {
            throw new SetaPDF_Core_Image_Exception('Unknown compression method.');
        }

        if (0 !== $this->_binaryReader->readUInt8()) {
        	throw new SetaPDF_Core_Image_Exception('Unknown filter method.');
        }

        if (0 !== $this->_binaryReader->readUInt8()) {
            throw new SetaPDF_Core_Image_Exception('Interlaced PNG images are not supported.');
        }

        $this->_binaryReader->skip(4);

        do {
        	$dataLength = $this->_binaryReader->readUInt32();
        	$chunkName = $this->_binaryReader->readBytes(4);

    		switch($chunkName) {
    			case 'PLTE':
                    $this->_palette = $this->_binaryReader->readBytes($dataLength);
        			$this->_binaryReader->skip(4);
        			break;

    			case 'tRNS':
        			$transparency = $this->_binaryReader->readBytes($dataLength);

                    if ($this->_colorSpace === 0) { // Grayscale
        				$this->_transparency = array(ord($transparency[1]), ord($transparency[1]));
        			} elseif ($this->_colorSpace == 2) { // RGB
                        $this->_transparency = array(ord($transparency[1]), ord($transparency[1]), ord($transparency[3]), ord($transparency[3]), ord($transparency[5]), ord($transparency[5]));
        			} elseif ($this->_colorSpace == 3) { // Palette
                        // check for only on/off values
                        $singleAlphaChannel = true;
                        for ($byte = 0, $length = strlen($transparency); $byte < $length; $byte++) {
                            if ($transparency[$byte] !== "\x00" && $transparency[$byte] !== "\xFF") {
                                $singleAlphaChannel = false;
                            }
                        }

                        if ($singleAlphaChannel) {
                            $pos = strpos($transparency, "\x00");
                            if (false !== $pos)
                                $this->_transparency = array($pos, $pos);
                        } else {
                            $this->_transparency = $transparency;
                        }

                    }
                    $this->_binaryReader->skip(4);
                    break;

                case 'IDAT':
                    $this->_imageData .= $this->_binaryReader->readBytes($dataLength);
                    $this->_binaryReader->skip(4);
                    break;

                case 'pHYs':
                    $densityX = $this->_binaryReader->readUInt32();
                    $densityY = $this->_binaryReader->readUInt32();
                    $units = $this->_binaryReader->readUInt8();

                    // units per meter
                    if (1 === $units) {
                        $this->_dpiX = $densityX * 0.0254;
                        $this->_dpiY = $densityY * 0.0254;
                    }

                    // else it is a ratio

                    $this->_binaryReader->skip(4);
                    break;

                case 'IEND':
                    break;

                default:
                    $this->_binaryReader->skip($dataLength + 4);
            }

        } while($dataLength);
    }

    /**
     * Converts the PNG image to an external object.
     *
     * @see SetaPDF_Core_Image::toXObject()
     * @param SetaPDF_Core_Document $document
     * @return SetaPDF_Core_XObject_Image
     * @throws SetaPDF_Core_Image_Exception
     */
    public function toXObject(SetaPDF_Core_Document $document)
    {
        $bitsPerComponent = $this->getBitsPerComponent();
        if ($bitsPerComponent > 8) {
            throw new SetaPDF_Core_Image_Exception('16-bit depth for PNG images is not supported.');
        }

        $colorSpace = $this->getColorSpace();
        switch ($colorSpace) {
            case 0:
            case 4:
                $colorSpace = 'DeviceGray';
                break;
            case 2:
            case 6:
                $colorSpace = 'DeviceRGB';
                break;
            case 3:
                $colorSpace = 'Indexed';
                if ('' === $this->_palette) {
                    throw new SetaPDF_Core_Image_Exception('Palette missing in PNG image.');
                }
                break;
            default:
                throw new SetaPDF_Core_Image_Exception('Unknown color type: ' . $colorSpace);
        }


        $decodeParameters = new SetaPDF_Core_Type_Dictionary();
        $decodeParameters->offsetSet('Predictor', new SetaPDF_Core_Type_Numeric(15));
        $decodeParameters->offsetSet('Colors', new SetaPDF_Core_Type_Numeric($colorSpace == 'DeviceRGB' ? 3 : 1));
        $decodeParameters->offsetSet('BitsPerComponent', new SetaPDF_Core_Type_Numeric($bitsPerComponent));
        $decodeParameters->offsetSet('Columns', new SetaPDF_Core_Type_Numeric($this->getWidth()));

        // temp var needed because of a bug in zend_guard 5.3 otherwise there will be a segmentation fault
        $imageData = $this->_extractAlphaChannel($decodeParameters->toPhp());
        list($colorImageData, $alphaImageData) = $imageData;
        unset($imageData);

        $dictionary = new SetaPDF_Core_Type_Dictionary();
        $dictionary->offsetSet('Type', new SetaPDF_Core_Type_Name('XObject', true));
        $dictionary->offsetSet('Subtype', new SetaPDF_Core_Type_Name('Image', true));
        $dictionary->offsetSet('Width', new SetaPDF_Core_Type_Numeric($this->getWidth()));
        $dictionary->offsetSet('Height', new SetaPDF_Core_Type_Numeric($this->getHeight()));
        $dictionary->offsetSet('BitsPerComponent', new SetaPDF_Core_Type_Numeric($bitsPerComponent));
        $dictionary->offsetSet('DecodeParms', $decodeParameters);
        $dictionary->offsetSet('Filter', new SetaPDF_Core_Type_Name('FlateDecode', true));

        if (is_array($this->_transparency) && count($this->_transparency) > 0) {
            $mask = new SetaPDF_Core_Type_Array();
            foreach ($this->_transparency AS $value) {
                $mask->offsetSet(null, new SetaPDF_Core_Type_Numeric($value));
            }

            $dictionary->offsetSet('Mask', $mask);
        }

        if (false !== $alphaImageData) {
            $sMask = new self();
            $sMask->_bitsPerComponent = 8;
            $sMask->_colorSpace = 0;
            $sMask->_width = $this->getWidth();
            $sMask->_height = $this->getHeight();
            $sMask->_imageData = $alphaImageData;

            $sMaskObject = $sMask->toXObject($document)->getIndirectObject();
            $dictionary->offsetSet('SMask', $sMaskObject);
        }

        if ('Indexed' === $colorSpace) {
            $palette = new SetaPDF_Core_Type_Stream(
                new SetaPDF_Core_Type_Dictionary(array(
                    'Filter' => new SetaPDF_Core_Type_Name('FlateDecode', true)
                ))
            );

            $palette->setStream($this->_palette);
            $paletteObject = $document->createNewObject($palette);

            $colorSpaceArray = new SetaPDF_Core_Type_Array(array(
                new SetaPDF_Core_Type_Name('Indexed', true),
                new SetaPDF_Core_Type_Name('DeviceRGB', true),
                new SetaPDF_Core_Type_Numeric(strlen($this->_palette) / 3 - 1),
                $paletteObject
            ));
            $dictionary->offsetSet('ColorSpace', $colorSpaceArray);

        } else {
            $dictionary->offsetSet('ColorSpace', new SetaPDF_Core_Type_Name($colorSpace, true));
            if ($colorSpace === 'DeviceCMYK') {
            	$dictionary->offsetSet('Decode', new SetaPDF_Core_Type_Array(array(
        			new SetaPDF_Core_Type_Numeric(1),
        			new SetaPDF_Core_Type_Numeric(0),
        			new SetaPDF_Core_Type_Numeric(1),
        			new SetaPDF_Core_Type_Numeric(0),
        			new SetaPDF_Core_Type_Numeric(1),
        			new SetaPDF_Core_Type_Numeric(0)
            	)));
            }
        }

    	$stream = new SetaPDF_Core_Type_Stream($dictionary, $colorImageData);
    	$object = $document->createNewObject($stream);

    	return new SetaPDF_Core_XObject_Image($object);
    }

    /**
     * Extracts the alpha channel from the image data.
     *
     * @param array $decodeParameters
     * @return array
     */
    protected function _extractAlphaChannel($decodeParameters)
    {
        $colorSpace = $this->getColorSpace();

        if ($colorSpace < 3) {
        	return array($this->_imageData, false);
        }

        $colorImageData = $alphaImageData = '';

        // palette
        if ($colorSpace === 3) {
            if (is_array($this->_transparency)) {
                return array($this->_imageData, false);
            }

            $colorImageData = gzuncompress($this->_imageData);

            $predictor = new SetaPDF_Core_Filter_Predictor($decodeParameters['Predictor'], $decodeParameters['Colors'], $decodeParameters['BitsPerComponent'], $decodeParameters['Columns']);
            $rawImageData = $predictor->decode($colorImageData);

            $bitsPerComponent = $this->getBitsPerComponent();

            /* Normalize to an 8-bits per component version to match entries in tRNS chunk             *
             */
            if ($bitsPerComponent != 8) {

                $output = '';
                $length = $this->getWidth() * $this->getHeight();
                $width = $this->getWidth();

                $max = (1 << $bitsPerComponent) - 1;
                $bits = 0;
                $current = 0;
                $pos = 0;

                for ($i = 0; $i < $length; ++$i) {
                    if (($i % $width) === 0) {
                        $current = 0;
                        $bits = 0;
                    }

                    while ($bits < $bitsPerComponent) {
                        $current = ($current << 8) | ord($rawImageData[$pos++]);
                        $bits += 8;
                    }

                    $remainingBits = $bits - $bitsPerComponent;
                    $value = $current >> $remainingBits;
                    $output .= chr($value < 0 ? 0 : ($value > $max ? $max : $value));
                    $current = $current & ((1 << $remainingBits) - 1);
                    $bits = $remainingBits;
                }

                $rawImageData = $output;
            }


            for ($byteNo = 0, $length = strlen($rawImageData); $byteNo < $length; $byteNo++) {
                $offset = ord($rawImageData[$byteNo]);
                $alphaImageData .= isset($this->_transparency[$offset]) ? $this->_transparency[$offset] : "\xFF";
            }

            $predictor = new SetaPDF_Core_Filter_Predictor(15, 1, 8, $this->getWidth());
            $alphaImageData = $predictor->encode($alphaImageData);

        // gray
        } elseif ($colorSpace === 4) {
            $imageData = gzuncompress($this->_imageData);

            $length = 2 * $this->getWidth();
            for ($i = 0, $h = $this->getHeight(); $i < $h; $i++) {
            	$offset = ($length + 1) * $i;

            	$colorImageData .= $imageData[$offset];
            	$alphaImageData .= $imageData[$offset];

            	$segments = str_split(substr($imageData, $offset + 1, $length), 2);
            	foreach ($segments AS $segment) {
            		$colorImageData .= $segment[0];
            		$alphaImageData .= $segment[1];
            	}
            }
        // rgb
        } elseif ($colorSpace === 6) {
            $imageData = gzuncompress($this->_imageData);

            $length = 4 * $this->getWidth();
            for ($i = 0, $h = $this->getHeight(); $i < $h; $i++) {
                $offset = ($length + 1) * $i;

                $colorImageData .= $imageData[$offset];
                $alphaImageData .= $imageData[$offset];

                $segments = str_split(substr($imageData, $offset + 1, $length), 4);
                foreach ($segments AS $segment) {
                    $colorImageData .= substr($segment, 0, 3);
                    $alphaImageData .= substr($segment, 3);
                }
            }
        }
        unset($imageData);

        return array(gzcompress($colorImageData), gzcompress($alphaImageData));
    }
}