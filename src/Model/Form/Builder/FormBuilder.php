<?php

namespace App\Model\Form\Builder;

use App\Model\Form\Interface\FormBuilderInterface;

class FormBuilder implements FormBuilderInterface
{
    private string $action = '';
    private string $method = 'POST';
    private array $fields = [];
    private array $buttons = [];

    public function setAction(string $action): self
    {
        $this->action = $action;
        return $this;
    }

    public function setMethod(string $method): self
    {
        $this->method = $method;
        return $this;
    }

    public function addField(string $name, string $type, string $label, ?string $value = null): self
    {
        $this->fields[] = [
            'name' => $name,
            'type' => $type,
            'label' => $label,
            'value' => $value,
        ];
        return $this;
    }

    public function addButton(string $label, string $type = 'submit', string $class = 'btn btn-primary'): self
    {
        $this->buttons[] = [
            'label' => $label,
            'type' => $type,
            'class' => $class,
        ];
        return $this;
    }

    public function getForm(): string
    {
        $form = "<form action=\"{$this->action}\" method=\"{$this->method}\">";

        foreach ($this->fields as $field) {
            $form .= "<div class=\"form-group\">";
            $form .= "<label for=\"{$field['name']}\">{$field['label']}</label>";
            $form .= "<input type=\"{$field['type']}\" name=\"{$field['name']}\" id=\"{$field['name']}\" value=\"{$field['value']}\" class=\"form-control\">";
            $form .= "</div>";
        }

        foreach ($this->buttons as $button) {
            $form .= "<button type=\"{$button['type']}\" class=\"{$button['class']}\">{$button['label']}</button>";
        }

        $form .= "</form>";

        return $form;
    }
}
