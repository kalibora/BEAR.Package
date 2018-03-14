<?php
/**
 * This file is part of the BEAR.Package package.
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace BEAR\Package\Exception;

use BEAR\Resource\Exception\BadRequestException;

class InvalidRequestJsonException extends BadRequestException implements ExceptionInterface
{
}
