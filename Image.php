<?php declare(strict_types=1);

namespace Jh\ImageAdapter;

use Jh\ImageAdapter\Image\Adapter\Mock;
use Magento\Framework\Image as OriginalImage;

/**
 * Extended to not die with no image when using the mock adapter.
 *
 * @author Max Bucknell <max@wearejh.com>
 */
class Image extends OriginalImage
{
    /**
     * Opens an image and creates image handle
     *
     * @access public
     * @return void
     * @throws \Exception
     */
    public function open()
    {
        $this->_adapter->checkDependencies();

        if (!file_exists($this->_fileName) && !($this->_adapter instanceof Mock)) {
            throw new \Exception("File '{$this->_fileName}' does not exists.");
        }

        $this->_adapter->open($this->_fileName);
    }

    /**
     * Adds watermark to our image.
     *
     * @param string $watermarkImage Absolute path to watermark image.
     * @param int $positionX Watermark X position.
     * @param int $positionY Watermark Y position.
     * @param int $watermarkImageOpacity Watermark image opacity.
     * @param bool $repeat Enable or disable watermark brick.
     * @access public
     * @throws \Exception
     * @return void
     */
    public function watermark(
        $watermarkImage,
        $positionX = 0,
        $positionY = 0,
        $watermarkImageOpacity = 30,
        $repeat = false
    ) {
        if (!file_exists($watermarkImage) && !($this->_adapter instanceof Mock)) {
            throw new \Exception("Required file '{$watermarkImage}' does not exists.");
        }
        $this->_adapter->watermark($watermarkImage, $positionX, $positionY, $watermarkImageOpacity, $repeat);
    }
}
