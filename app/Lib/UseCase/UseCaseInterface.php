<?php

namespace App\Lib\UseCase;

interface UseCaseInterface
{
    function convertLinksToIds(array $links): array;
    function convertLinkToServer($link): string;
}
