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

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Thelia\Core\HttpFoundation\Request;

/**
 * Class CommentModificationForm
 * @package Comment\Form
 * @author Julien Chanséaume <jchanseaume@openstudio.fr>
 */
class CommentModificationForm extends CommentCreationForm
{
    public function __construct(
        Request $request,
        $type = "form",
        $data = [],
        $options = [],
        ContainerInterface $container = null
    ) {
        parent::__construct($request, $type, $data, $options, $container);
    }

    protected function buildForm()
    {
        parent::buildForm();

        $this
            ->formBuilder
            ->add(
                'id',
                'integer',
                [
                    'constraints' => [
                        new NotBlank()
                    ],
                    'label' => $this->trans('Id'),
                    'label_attr' => [
                        'for' => 'id'
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
        return 'admin_comment_modification';
    }
}
