# Jh_ImageAdapter

A friendly mock image adapter so that your local environment doesn't fall on its sword if you haven't pulled down a
media directory.

## Installation

```
composer require --dev wearejh/m2-module-image-adapter
```

## What does it do?

The principle piece is a new Image Adapter (a class that both implements
`Magento\Framework\Image\Adapter\AdapterInterface` and extends from `Magento\Framework\Image\Adapter\AbstractAdapter`).
This stubs out all the methods that use image handling functions or do things. You won't get meaningful data, but they
also won't fail.

The second part is some light wrapping around the `Magento\Framework\Image` class and its factory. It checks for
exceptions when opening an image, and catches it and retries with the Mock adapter in that case.
