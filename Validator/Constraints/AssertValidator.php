<?php

namespace Habibun\RespectValidationBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Habibun\RespectValidationBundle\Validator\ConstraintValidator;

/**
 * @Annotation
 */
class AssertValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {   
        foreach($constraint->options as $rule => $parameters) {
            try {
                call_user_func_array(
                    array($this->validator, $rule), $parameters
                )->assert($value);
            } catch(\InvalidArgumentException $e) {
                $messages = $e->findMessages(array($rule));
            
                foreach($messages as $message) {
                    $this->context->addViolation($message, array('{{ value }}' => $value));
                }
            }    
        }        
    }
}