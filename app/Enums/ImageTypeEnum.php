<?php
namespace App\Enums;

use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;

enum ImageTypeEnum: string
{
    use Names;
    use Values;
    use Options;

    case Placeholder = 'Placeholder Image';
}
