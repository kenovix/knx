<?php

namespace knx\FarmaciaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipoImv', 		  'choice', array('label' => 'Tipo Insumo: *',			'choices'   => array('M' => 'Medicamento', 'I' => 'Insumo','V' => 'Vacuna', 'MP' => 'Medicamento_PYP'),'required'  => true))
            ->add('codFact',		  'text', 	array('label' => 'Codigo Facturacion: *',	'required' => true, 'attr' => array('placeholder' => 'Ingrese Codigo')))
            ->add('codAdmin',		  'text', 	array('label' => 'Codigo Administrativo: *','required' => true, 'attr' => array('placeholder' => 'CodigoAdministracion')))
            ->add('cums',			  'text', 	array('label' => 'Cums: *',					'required' => true, 'attr' => array('placeholder' => 'Cums')))
            ->add('nombre',			  'text', 	array('label' => 'Nombre: *',				'required' => true, 'attr' => array('placeholder' => 'Nombre')))
            ->add('formaFarmaceutica','text', 	array('label' => 'Forma Farmaceutica: *',	'required' => true, 'attr' => array('placeholder' => 'FormaFarmaceutica')))
            ->add('concentracion',	  'text', 	array('label' => 'Concentracion: *',		'required' => true, 'attr' => array('placeholder' => 'Concentracion')))
            ->add('uniMedida',		  'text', 	array('label' => 'Unidad Medida: *',		'required' => true, 'attr' => array('placeholder' => 'UnidadMedida')))  
            ->add('jeringa',	  	  'text', 	array('label' => 'Jeringa: *',			    'required' => false,'attr' => array('placeholder' => 'Jeringa')))
            ->add('dosis',		      'text', 	array('label' => 'Dosis: *',				'required' => false, 'attr' => array('placeholder' => 'Dosis')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'knx\FarmaciaBundle\Entity\Imv'
        ));
    }

    public function getName()
    {
        return 'gstImv';
    }
}