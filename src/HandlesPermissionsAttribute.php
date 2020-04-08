<?php

namespace Permissions;

trait HandlesPermissionsAttribute
{
    /**
     * Get the permissions attribute.
     *
     * @param  string  $attribute
     * @return array
     */
    public function getPermissionsAttribute($attribute)
    {
        return explode(',', $attribute);
    }

    /**
     * Set the permissions attribute.
     *
     * @param  array  $attribute
     * @return void
     */
    public function setPermissionsAttribute(array $attribute)
    {
        $this->attributes['permissions'] = implode(',', $attribute);
    }
}