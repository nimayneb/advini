<?php declare(strict_types=1); namespace JBR\Advini\Interfaces;

/************************************************************************************
 * Copyright (c) 2016, Jan Runte
 * All rights reserved.
 *
 * Redistribution and use in source and  binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * 1. Redistributions  of source code must retain the above copyright notice,  this
 * list of conditions and the following disclaimer.
 *
 * 2. Redistributions  in  binary  form  must  reproduce the above copyright notice,
 * this list of conditions and the following disclaimer in the documentation and/or
 * other materials provided with the distribution.
 *
 * THIS  SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY  EXPRESS OR IMPLIED WARRANTIES,  INCLUDING, BUT NOT LIMITED TO, THE  IMPLIED
 * WARRANTIES  OF  MERCHANTABILITY  AND   FITNESS  FOR  A  PARTICULAR  PURPOSE  ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR
 * ANY  DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL  DAMAGES
 * (INCLUDING,  BUT  NOT LIMITED TO,  PROCUREMENT OF SUBSTITUTE GOODS  OR  SERVICES;
 * LOSS  OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND  ON
 * ANY  THEORY  OF  LIABILITY,  WHETHER  IN  CONTRACT,  STRICT  LIABILITY,  OR TORT
 * (INCLUDING  NEGLIGENCE OR OTHERWISE)  ARISING IN ANY WAY OUT OF THE USE OF  THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 ************************************************************************************/

use JBR\Advini\AdviniAdapter;

/**
 *
 *
 */
interface Instructor
{
    /**
     * @return string
     */
    public function getProcessToken(): string;

    /**
     * @param mixed $key
     *
     * @return bool
     */
    public function canProcessKey($key): bool;

    /**
     * @param AdviniAdapter $adapter
     * @param array $configuration
     *
     * @return void
     */
    public function processKey(AdviniAdapter $adapter, array &$configuration): void;

    /**
     * @param int|string|array|float $value
     *
     * @return bool
     */
    public function canProcessValue($value): bool;

    /**
     * @param AdviniAdapter $adapter
     * @param string $value
     *
     * @return void
     */
    public function processValue(AdviniAdapter $adapter, string &$value): void;

    /**
     * @param int|string|array|float $key
     * @param int|string|array|float $value
     *
     * @return bool
     */
    public function canProcessKeyValue($key, $value): bool;

    /**
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public function processKeyValue(string $key, string $value): void;
}
