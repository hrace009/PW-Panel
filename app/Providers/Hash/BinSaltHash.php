<?php

namespace App\Providers\Hash;

use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Support\Facades\DB;

class BinSaltHash implements HasherContract
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
     * @return void
     */
    public function make($value, array $options = [])
    {
        dd(DB::raw(DB::select("select fn_varbintohexsubstring ( 1, ?, 1, 0 )", [$password])));
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
