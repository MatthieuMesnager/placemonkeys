<?php

declare(strict_types=1);

namespace App\Images\Modifiers;

use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Interfaces\ModifierInterface;

final class SepiaModifier implements ModifierInterface
{
    public function apply(ImageInterface $image): ImageInterface
    {
        return $image->greyscale()->colorize(25, 11);
    }
}
