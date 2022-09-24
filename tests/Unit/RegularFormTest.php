<?php


namespace Laraflow\Form\Tests\Unit;


use Laraflow\Form\Facades\Form;
use PHPUnit\Framework\TestCase;

class RegularFormTest extends TestCase
{
    public function test_regular_text_field()
    {
        $result = Form::rText('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_email_field()
    {
        $result = Form::rEmail('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_password_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_range_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_search_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_tel_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_number_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_date_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_url_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_file_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_image_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_textarea_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_select_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_selectmulti_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_selectrange_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_selectmonth_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_checkbox_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }


    public function test_regular_radio_field()
    {
        $result = Form::r('Name', 'name', null, true, []);
        $this->assertIsString($result);
    }

}

