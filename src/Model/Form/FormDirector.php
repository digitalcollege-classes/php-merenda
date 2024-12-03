<?php

namespace App\Model\Form;

use App\Model\Form\Interface\FormBuilderInterface;

class FormDirector
{
    private FormBuilderInterface $builder;

    public function __construct(FormBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function buildCategoryForm(array $data = []): string
    {
        return $this->builder
            ->setAction('/categorias/adicionar')
            ->setMethod('POST')
            ->addField('name', 'text', 'Nome', $data['name'] ?? '')
            ->addField('description', 'text', 'Descrição', $data['description'] ?? '')
            ->addField('image', 'text', 'Imagem', $data['image'] ?? '')
            ->addButton('Pronto', 'submit', 'btn btn-primary btn-lg w-30')
            ->getForm();
    }
}
