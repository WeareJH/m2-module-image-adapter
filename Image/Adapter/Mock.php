<?php declare(strict_types=1);

// phpcs:disable PSR2.Methods.MethodDeclaration.Underscore

namespace Jh\ImageAdapter\Image\Adapter;

use Magento\Framework\Image\Adapter\AbstractAdapter;
use Magento\Framework\Image\Adapter\AdapterInterface;

/**
 * A mock image adapter that stubs out basically everything.
 *
 * @author Max Bucknell <max@wearejh.com>
 */
class Mock extends AbstractAdapter implements AdapterInterface
{
    /**
     * @param int $x
     * @param int $y
     * @return array|void
     */
    public function getColorAt($x, $y)
    {
        return [
            'red' => 0,
            'green' => 0,
            'blue' => 0,
            'alpha' => 0
        ];
    }

    /**
     * @return string|void
     */
    public function getImage()
    {
        return '';
    }

    /**
     * @param string $imagePath
     * @param int $positionX
     * @param int $positionY
     * @param int $opacity
     * @param bool $tile
     */
    public function watermark($imagePath, $positionX = 0, $positionY = 0, $opacity = 30, $tile = false)
    {
        // stubbed
    }

    /**
     * Reassign image dimensions
     *
     * @return void
     */
    public function refreshImageDimensions()
    {
        // stubbed
    }

    /**
     * Checks required dependencies
     *
     * @return void
     * @throws \Exception If some of dependencies are missing
     */
    public function checkDependencies()
    {
        // stubbed
    }

    /**
     * @param string $text
     * @param string $font
     * @return \Magento\Framework\Image\Adapter\AbstractAdapter|void
     */
    public function createPngFromString($text, $font = '')
    {
        return $this;
    }

    /**
     * @param string $filename
     */
    public function open($filename)
    {
        // stubbed
    }

    /**
     * @param null $frameWidth
     * @param null $frameHeight
     */
    public function resize($frameWidth = null, $frameHeight = null)
    {
        // stubbed
    }

    /**
     * @param int $top
     * @param int $left
     * @param int $right
     * @param int $bottom
     * @return bool|void
     */
    public function crop($top = 0, $left = 0, $right = 0, $bottom = 0)
    {
        // stubbed
    }

    /**
     * @param null $destination
     * @param null $newName
     */
    public function save($destination = null, $newName = null)
    {
        // stubbed
    }

    /**
     * @param int $angle
     */
    public function rotate($angle)
    {
        // stubbed
    }

    /**
     * Mock constructor.
     */
    public function __construct()
    {
        // stubbed
    }

    /**
     * Assign image width, height, fileMimeType to object properties
     *
     * @return string|null
     */
    public function getMimeType()
    {
        return 'image/jpeg';
    }

    /**
     * Assign image width, height, fileType to object properties.
     *
     * @return int|null
     */
    public function getImageType()
    {
        if ($this->_fileType) {
            return $this->_fileType;
        } else {
            list($this->_imageSrcWidth, $this->_imageSrcHeight, $this->_fileType) = [100, 100, 'jpeg'];
            return $this->_fileType;
        }
    }

    /**
     * Assign file dirname and basename to object properties
     *
     * @return void
     */
    protected function _getFileAttributes()
    {
        $pathinfo = pathinfo($this->_fileName);

        $this->_fileSrcPath = $pathinfo['dirname'];
        $this->_fileSrcName = $pathinfo['basename'];
    }

    /**
     * Adapt resize values based on image configuration
     *
     * @param int $frameWidth
     * @param int $frameHeight
     * @return array
     * @throws \Exception
     */
    protected function _adaptResizeValues($frameWidth, $frameHeight)
    {
        // stubbed

        return [
            'src' => ['x' => 0, 'y' => 0],
            'dst' => ['x' => 0, 'y' => 0, 'width' => 100, 'height' => 100],
            // size for new image
            'frame' => ['width' => 100, 'height' => 100]
        ];
    }

    /**
     * Check aspect ratio
     *
     * @param int $frameWidth
     * @param int $frameHeight
     * @return int[]
     */
    protected function _checkAspectRatio($frameWidth, $frameHeight)
    {
        return [1, 1];
    }

    /**
     * Return false if source width or height is empty
     *
     * @return bool
     */
    protected function _checkSrcDimensions()
    {
        return !empty($this->_imageSrcWidth) && !empty($this->_imageSrcHeight);
    }

    /**
     * Return information about image using getimagesize function
     *
     * @param string $filePath
     * @return array
     */
    protected function _getImageOptions($filePath)
    {
        return [0, 0, 'jpeg', ''];
    }

    /**
     * Return supported image formats
     *
     * @return string[]
     */
    public function getSupportedFormats()
    {
        return ['gif', 'jpeg', 'jpg', 'png'];
    }

    /**
     * Create destination folder if not exists and return full file path
     *
     * @param string $destination
     * @param string $newName
     * @return string
     * @throws \Exception
     */
    protected function _prepareDestination($destination = null, $newName = null)
    {
        $fileName = $destination . '/' . $newFileName;
        return $fileName;
    }

    /**
     * Checks is adapter can work with image
     *
     * @return bool
     */
    protected function _canProcess()
    {
        return true;
    }

    /**
     * Check - is this file an image
     *
     * @param string $filePath
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function validateUploadFile($filePath)
    {
        return true;
    }
}
