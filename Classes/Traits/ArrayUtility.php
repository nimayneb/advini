<?php declare(strict_types=1);

namespace JBR\Advini\Traits {

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

    /**
     *
     */
    trait ArrayUtility
    {
        /**
         * Extract multi named keys like "key1/key2".
         *
         * @param array $source
         * @param string $separator
         *
         * @return void
         */
        protected function extractKeys(array &$source, string $separator): void
        {
            foreach ($source as $key => &$value) {
                if (true === is_array($value)) {
                    $this->extractKeys($value, $separator);
                }

                if (false !== strpos($key, $separator)) {
                    $keyArr = explode($separator, $key);
                    $lastKey = array_pop($keyArr);
                    $currentElement = &$source;

                    foreach ($keyArr as $key_step) {
                        if (false === isset($currentElement[$key_step])) {
                            $currentElement[$key_step] = [];
                        }
                        $currentElement = &$currentElement[$key_step];
                    }

                    $currentElement[$lastKey] = $value;
                    unset($source[$key]);
                }
            }
        }
    }
}
