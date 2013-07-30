<?php

namespace Avocode\FormExtensionsBundle\Tests\Form\Type;

use Avocode\FormExtensionsBundle\Form\BootstrapCollectionType;
use Avocode\FormExtensionsBundle\Tests\Model\TestObject;
use Symfony\Component\Form\Tests\Extension\Core\Type\TypeTestCase;

/**
 * @author Piotr Gołębiewski <loostro@gmail.com>
 */
class BootstrapCollectionTypeTest extends TypeTestCase
{
    protected $widgets = array(
        'table',
        'fieldset',
    );
    
    public function testSubmitValidData()
    {
        foreach ($this->widgets as $widget) {
            $formData = array(
                new TestObject(1, 'foo', array('fooA', 'fooB')),
                new TestObject(2, 'bar', array('barA', 'barB')),
            );

            $type = new BootstrapCollectionType($widget);
            $form = $this->factory->create($type);

            $object = new TestObject();
            $object->fromArray($formData);

            // submit the data to the form directly
            $form->submit($formData);

            $this->assertTrue($form->isSynchronized());
            $this->assertEquals($object, $form->getData());

            $view = $form->createView();
            $children = $view->children;

            foreach (array_keys($formData) as $key) {
                $this->assertArrayHasKey($key, $children);
            }
        }
    }
}
