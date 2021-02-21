<?php

namespace Habibun\RespectValidationBundle\Validator\Constraints;

use Habibun\RespectValidationBundle\Validator\Constraint;

/**
 * @Annotation
 */
class Assert extends Constraint
{
    public $options;
    
    public function getDefaultOption()
    {
        return 'options';
    }
}