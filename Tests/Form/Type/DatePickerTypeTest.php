<?php

namespace Avocode\FormExtensionsBundle\Tests\Form\Type;

use Avocode\FormExtensionsBundle\Form\DatePickerType;
use Symfony\Component\Form\Tests\Extension\Core\Type\TypeTestCase;

/**
 * @author Piotr Gołębiewski <loostro@gmail.com>
 */
class DatePickerTypeTest extends TypeTestCase
{
    public function testSubmitFromInputDateTimeDifferentPattern()
    {
        $form = $this->factory->create('date', null, array(
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'format' => 'MM*yyyy*dd',
        ));

        $form->submit('06*2010*02');

        $this->assertDateTimeEquals(new \DateTime('2010-06-02 UTC'), $form->getData());
        $this->assertEquals('06*2010*02', $form->getViewData());
    }
}
