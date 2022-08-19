<?php






/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Providers\Hash;

use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class MD5Hash implements HasherContract
{
    /**
     * @param string $hashedValue
     * @return void
     */
    public function info($hashedValue)
    {
        // Implement info() method.
    }

    /**
     * @param string $value
     * @param string $hashedValue
     * @param array $options
     * @return bool
     */
    public function check($value, $hashedValue, array $options = []): bool
    {
        if (strlen($hashedValue) === 0) {
            return false;
        }

        return $this->make($value) === $hashedValue;
    }

    /**
     * @param string $value
     * @param array $options
     * @return string
     */
    public function make($value, array $options = []): string
    {
        return '0x' . md5($value);
    }

    /**
     * @param string $hashedValue
     * @param array $options
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = []): bool
    {
        return false;
    }
}
