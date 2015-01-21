<?php

namespace app\interfaces;

interface Ivalidate{
    public function typeObjectValidation($objectValidation);
    public function validUniqueness();
    public function createErrorsValidateUniqueness($attributes);
}