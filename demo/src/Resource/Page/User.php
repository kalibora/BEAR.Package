<?php
/**
 * This file is part of the BEAR.Package package.
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace MyVendor\MyProject\Resource\Page;

use BEAR\Resource\Annotation\Embed;
use BEAR\Resource\ResourceObject;

class User extends ResourceObject
{
    /**
     * @Embed(rel="user", src="/api/user{?id}")
     */
    public function onGet($id)
    {
        return $this;
    }
}
