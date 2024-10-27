<?php

declare(strict_types=1);

namespace App\Images\Modifiers;

use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Interfaces\ModifierInterface;

final readonly class BlurModifier implements ModifierInterface
{
    public function __construct(
        private int $intensity,
    ) {}

    public function apply(ImageInterface $image): ImageInterface
    {
        return $image->blur($this->intensity);
    }
}
