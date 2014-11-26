<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/


namespace Comment\Form;

use Comment\Comment;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;
use Thelia\Core\HttpFoundation\Request;
use Thelia\Form\BaseForm;

/**
 * Class CommentCreationForm
 * @package Comment\Form
 * @author Julien Chanséaume <jchanseaume@openstudio.fr>
 */
class CommentCreationForm extends BaseForm
{

    public function __construct(
        Request $request,
        $type = "form",
        $data = [],
        $options = [],
        ContainerInterface $container = null
    ) {
        $this->defaultDomain = Comment::getModuleCode();
        parent::__construct($request, $type, $data, $options, $container);
    }


    protected function buildForm()
    {
        $this
            ->formBuilder
            ->add(
                'customer_id',
                'text',
                [
                    'required' => false,
                    'label' => $this->trans('Customer'),
                    'label_attr' => [
                        'for' => 'customer_id'
                    ]
                ]
            )
            ->add('username', 'text', [
                'required' => false,
                'constraints' => [
                    new NotBlank()
                ],
                'label' => $this->trans('Username'),
                'label_attr' => [
                    'for' => 'comment_username'
                ]
            ])
            ->add('email', 'email', [
                'required' => false,
                'constraints' => [
                    new Email()
                ],
                'label' => $this->trans('Email'),
                'label_attr' => [
                    'for' => 'comment_mail'
                ]
            ])
            ->add(
                'locale',
                'text',
                [
                    'label' => $this->trans('Locale'),
                    'label_attr' => [
                        'for' => 'locale'
                    ]
                ]
            )
            ->add('title', 'text', [
                'constraints' => [
                    new NotBlank()
                ],
                'label' => $this->trans('Title'),
                'label_attr' => [
                    'for' => 'title'
                ]
            ])
            ->add('content', 'text', [
                'constraints' => [
                    new NotBlank()
                ],
                'label' => $this->trans('Content'),
                'label_attr' => [
                    'for' => 'content'
                ]
            ])
            ->add('ref', 'text', [
                'constraints' => [
                    new NotBlank()
                ],
                'label' => $this->trans('Ref'),
                'label_attr' => [
                    'for' => 'ref'
                ]
            ])
            ->add('ref_id', 'text', [
                'constraints' => [
                    new GreaterThanOrEqual(['value' => 0])
                ],
                'label' => $this->trans('Ref Id'),
                'label_attr' => [
                    'for' => 'ref_id'
                ]
            ])
            ->add('rating', 'text', [
                'required' => false,
                'constraints' => [
                    new GreaterThanOrEqual(['value' => 0]),
                    new LessThanOrEqual(['value' => 5])
                ],
                'label' => $this->trans('Rating'),
                'label_attr' => [
                    'for' => 'rating'
                ]
            ])
            ->add(
                'status',
                'text',
                [
                    'label' => $this->trans('Status'),
                    'label_attr' => [
                        'for' => 'status'
                    ]
                ]
            )
            ->add(
                'verified',
                'text',
                [
                    'label' => $this->trans('Verified'),
                    'label_attr' => [
                        'for' => 'verified'
                    ]
                ]
            )
        ;
    }

    /**
     * @return string the name of you form. This name must be unique
     */
    public function getName()
    {
        return 'admin_comment_creation';
    }
}
