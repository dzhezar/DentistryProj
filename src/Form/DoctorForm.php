<?php


namespace App\Form;


use App\Model\DoctorModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class DoctorForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $attr_image = [];
        if($options['image']){
            $attr_image = [
                'class' => 'has_image',
                'data-image' => $options['image']
            ];
        }

        $builder
            ->add('name', TextType::class, [
                'label' => 'Имя Фамилия'
            ])
            ->add('speciality', TextType::class, [
                'label' => 'Специальность'
            ])
            ->add('university', TextType::class, [
                'label' => 'Образование',
                'required' => false
            ])
            ->add('experience', TextType::class, [
                'label' => 'Опыт работы',
                'required' => false
            ])
            ->add('image', FileType::class,[
                'label' => 'Фото',
                'attr' => $attr_image,
                'required' => $options['is_create'] ? true : false,
                'constraints' => $options['is_create'] ? new NotBlank() : null
            ])
            ->add('services', HiddenType::class)
            ->add('save', SubmitType::class, ['label' => 'Сохранить'])
            ->getForm();
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'image' => null,
            'is_create' => true,
            'data_class' => DoctorModel::class,
        ]);
    }
}