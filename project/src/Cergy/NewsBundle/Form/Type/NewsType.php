<?php
/**
 * Created by PhpStorm.
 * User: lmeni
 * Date: 25/11/2014
 * Time: 14:50
 */

namespace Cergy\NewsBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 *
 * @author Loïs Ménissier <lois.menissier@gmail.com>
 */
class NewsType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', [
                'required' => true,
                'max_length' => 100,
                'label' => 'Titre'
            ])
            ->add('content', 'textarea', [
                'required' => true,
                'label' => 'Contenu'
            ])
            ->add('author', 'entity', array(
                'class' => 'Cergy\UserBundle\Entity\User',
                'property' => 'username'
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Cergy\NewsBundle\Entity\News'
        ]);
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'news';
    }
}