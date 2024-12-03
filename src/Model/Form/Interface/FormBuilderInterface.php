<?php

namespace App\Model\Form\Interface;

interface FormBuilderInterface
{
    public function setAction(string $action): self;
    public function setMethod(string $method): self;
    public function addField(string $name, string $type, string $label, ?string $value = null): self;
    public function addButton(string $label, string $type = 'submit', string $class = 'btn btn-primary'): self;
    public function getForm(): string;
}
