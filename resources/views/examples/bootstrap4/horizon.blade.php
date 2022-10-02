<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th width="20">#</th>
            <th width="40%">Code</th>
            <th width="*">Output</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>1.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hCheckbox('item', 'Item(s)', [1=>'Egg', 2 =>
                    'Rice', 3 => 'other'],
                    [3, 2],
                    true)
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hCheckbox('item', 'Item(s)', [1 => 'Egg', 2 => 'Rice', 3 => 'other'], [3, 2], true) !!}
            </td>
        </tr>
        <tr>
            <th>2.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hDate('meeting_date', 'Meeting Date', null,
                    true)
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hDate('meeting_date', 'Meeting Date', null, true) !!}
            </td>
        </tr>
        <tr>
            <th>3.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hEmail('email_address', 'Email Address',
                    'john@doe.com', true, 2,
                    ['placeholder' =>"Email Example Placeholder"])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hEmail('email_address', 'Email Address', 'john@doe.com', true, 2, [
                    'placeholder' => 'Email Example Placeholder',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>4.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hFile('import_file', 'Import File', true, 2,
                    ['accept' => "audio/*"])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hFile('import_file', 'Import File', true, 2, ['accept' => 'audio/*']) !!}
            </td>
        </tr>
        <tr>
            <th>5.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hImage('photo', 'Photo', true, 2, ['preview' => false, 'height' =>
                    100, 'default' => '/img/logo-app.png'], ['accept' => "image/*"])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hImage(
                    'photo',
                    'Photo',
                    true,
                    2,
                    ['preview' => false, 'height' => 100, 'default' => '/img/logo-app.png'],
                    ['accept' => 'image/*'],
                ) !!}
            </td>
        </tr>
        <tr>
            <th>6.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hImage('profile_photo', 'Profile Photo', true, 2,
                    ['preview' => true, 'height' => 128,
                    'default' => 'https://via.placeholder.com/300x128.png'], ['accept' =>
                    "image/*"])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hImage(
                    'profile_photo',
                    'Profile Photo',
                    true,
                    2,
                    ['preview' => true, 'height' => 128, 'default' => 'https://via.placeholder.com/300x128.png'],
                    ['accept' => 'image/*'],
                ) !!}
            </td>
        </tr>
        <tr>
            <th>7.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hNumber('money', 'Money', 100.00, true, 2,
                    ['step' =>"0.01", 'min'=>
                    0])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hNumber('money', 'Money', 100.0, true, 2, ['step' => '0.01', 'min' => 0]) !!}
            </td>
        </tr>
        <tr>
            <th>8.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hPassword('password', 'Password', true, 2,
                    ['placeholder'
                    =>"Password Placeholder"])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hPassword('password', 'Password', true, 2, [
                    'placeholder' => 'Password Placeholder',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>9.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hRadio('gender', 'Gender', [1=>'Male', 2 =>
                    'Female', 3 => 'Other'],
                    3, true,
                    2)
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hRadio('gender', 'Gender', [1 => 'Male', 2 => 'Female', 3 => 'Other'], 3, true, 2) !!}
            </td>
        </tr>
        <tr>
            <th>10.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hRange('rating', 'Rating', 5, true, 2, ['min'
                    => 0, 'max' => 100])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hRange('rating', 'Rating', 5, true, 2, ['min' => 0, 'max' => 100]) !!}
            </td>
        </tr>
        <tr>
            <th>11.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hSearch('search_text', 'Search Text', null,
                    false, 2, ['placeholder'
                    =>
                    "Enter
                    what you want..."])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hSearch('search_text', 'Search Text', null, false, 2, [
                    'placeholder' => 'Enter what you want...',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>12.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hSelect('state', 'State', [1 => 'Dhaka', 2 =>
                    'Chittagong'], 2,
                    false, 2,
                    ['placeholder' => "Select a State"])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hSelect('state', 'State', [1 => 'Dhaka', 2 => 'Chittagong'], null, false, 2, [
                    'placeholder' => 'Select a State',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>13.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hSelect('animal', 'Animal', [ 'Cats' =>
                    ['leopard' => 'Leopard'],
                    'Dogs' =>
                    ['spaniel' => 'Spaniel']], 2, false, 2, ['placeholder' => "Select a
                    Animal"])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hSelect(
                    'animal',
                    'Animal',
                    ['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel']],
                    2,
                    false,
                    2,
                    ['placeholder' => 'Select a Animal'],
                ) !!}
            </td>
        </tr>
        <tr>
            <th>14.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hSelectMulti('state', 'State', [1 => 'Dhaka',
                    2 => 'Chittagong'],
                    [2,1] ,
                    false, 2, [])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hSelectMulti('state', 'State', [1 => 'Dhaka', 2 => 'Chittagong'], [2, 1], false, 2, []) !!}
            </td>
        </tr>
        <tr>
            <th>15.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hSelectMonth('month', 'Month', '2', true, 2,
                    ['placeholder' =>
                    "Select a
                    Month"])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hSelectMonth('month', 'Month', '2', true, 2, [
                    'placeholder' => 'Select a Month',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>16.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hSelectRange('rating', 'Rating', 1,100, 20,
                    false, 2, ['placeholder'
                    =>
                    "Select
                    a Rating"])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hSelectRange('rating', 'Rating', 1, 100, 20, false, 2, [
                    'placeholder' => 'Select a Rating',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>17.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hTel('mobile', 'Mobile', null, true, 2,
                    ['placeholder' => "Enter
                    Mobile
                    Number"])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hTel('mobile', 'Mobile', null, true, 2, [
                    'placeholder' => 'Enter Mobile Number',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>18.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hText('summary', 'Summary', 'short summary',
                    true, 2, ['placeholder'
                    => "Type
                    some summary"])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hText('summary', 'Summary', 'short summary', true, 2, [
                    'placeholder' => 'Type some summary',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>19.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hTextarea('description', 'Description',
                    'short description', true,
                    2, ['placeholder' => "Type some description"])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hTextarea('description', 'Description', 'short description', true, 2, [
                    'placeholder' => 'Type some description',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>20.</th>
            <td>
                <code class="d-block">
                    \Laraflow\Form\Facades\Form::hUrl('website', 'Website', null, true, 2,
                    ['placeholder' => "Enter
                    Your
                    Portfolio link"])
                </code>
            </td>
            <td>
                {!! \Laraflow\Form\Facades\Form::hUrl('website', 'Website', null, true, 2, [
                    'placeholder' => 'Enter Your Portfolio link',
                ]) !!}
            </td>
        </tr>
    </tbody>
</table>
