<?php

namespace Laraflow\Form\Tests\Unit;

use Illuminate\Foundation\Application;
use Laraflow\Form\Facades\Form;
use Laraflow\Form\FormServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class RegularFormTest extends Orchestra
{
    /**
     * @param  Application  $app
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [FormServiceProvider::class];
    }

    public function test_regular_text_field()
    {
        $result = Form::rText('Name', 'name', null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_email_field()
    {
        $result = Form::rEmail('Name', 'name', null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_password_field()
    {
        $result = Form::rPassword('Name', 'name', true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_range_field()
    {
        $result = Form::rRange('Name', 'name', null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_search_field()
    {
        $this->startSession();

        $result = Form::rSearch('Name', 'name', null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_tel_field()
    {
        $result = Form::rTel('Name', 'name', null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_number_field()
    {
        $result = Form::rNumber('Name', 'name', null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_date_field()
    {
        $result = Form::rDate('Name', 'name', null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_url_field()
    {
        $result = Form::rUrl('Name', 'name', null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_file_field()
    {
        $result = Form::rFile('Name', 'name', true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_image_field()
    {
        $result = Form::rImage('Name', 'name', true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_textarea_field()
    {
        $result = Form::rTextarea('Name', 'name', null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_select_field()
    {
        $result = Form::rSelect('Name', 'name', [], null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_select_multi_field()
    {
        $result = Form::rSelectMulti('Name', 'name', [], null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_select_range_field()
    {
        $result = Form::rSelectRange('Name', 'name', 1, 10, null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_select_month_field()
    {
        $result = Form::rSelectMonth('Name', 'name', null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_select_year_field()
    {
        $result = Form::rSelectYear('Name', 'name', null, null, null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_checkbox_field()
    {
        $result = Form::rCheckbox('Name', 'name', [], null, true, []);
        $this->assertIsObject($result);
    }

    public function test_regular_radio_field()
    {
        $result = Form::rRadio('Name', 'name', [], null, true, []);
        $this->assertIsObject($result);
    }
}
