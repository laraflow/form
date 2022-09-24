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
                    \Form::nCheckbox('item', 'Item(s)', [1=>'Egg', 2 =>
                    'Rice', 3 => 'other'],
                    [3, 2],
                    true)
                </code>
            </td>
            <td>
                {!! \Form::nCheckbox('item', 'Item(s)', [1 => 'Egg', 2 => 'Rice', 3 => 'Unknown'], [3, 2], true) !!}
            </td>
        </tr>
        <tr>
            <th>2.</th>
            <td>
                <code class="d-block">
                    \Form::nRadio('gender', 'Gender', [1=>'Male', 2 =>
                    'Female', 3 => 'Other'],
                    3, true)
                </code>
            </td>
            <td>
                {!! \Form::nRadio('gender', 'Gender', [1 => 'Male', 2 => 'Female', 3 => 'Other'], 3, true) !!}
            </td>
        </tr>
        <tr>
            <th>3.</th>
            <td>
                <code class="d-block">
                    \Form::nEmail('email_address', 'Email Address',
                    'john@doe.com', true,
                    ['placeholder'
                    =>"Email Example Placeholder"])
                </code>
            </td>
            <td>
                {!! \Form::nEmail('email_address', 'Email Address', 'john@doe.com', true, [
                    'placeholder' => 'Email Example Placeholder',
                    'icon' => ['fa fa-box', 'before'],
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>4.</th>
            <td>
                <code class="d-block">
                    \Form::nFile('import_file', 'Import File', true,
                    ['accept' => "audio/*"])
                </code>
            </td>
            <td>
                {!! \Form::nFile('import_file', 'Import File', true, ['accept' => 'audio/*']) !!}
            </td>
        </tr>
        <tr>
            <th>5.</th>
            <td>
                <code class="d-block">
                    \Form::nImage('profile_photo', 'Profile Photo',
                    true,
                    ['preview' => true, 'height' => 128,
                    'default' => 'https://via.placeholder.com/300x128.png'], ['accept' =>
                    "image/*"])
                </code>
            </td>
            <td>
                {!! \Form::nImage(
                    'profile_photo',
                    'Profile Photo',
                    true,
                    ['preview' => true, 'height' => 128, 'default' => 'https://via.placeholder.com/300x128.png'],
                    ['accept' => 'image/*'],
                ) !!}
            </td>
        </tr>
        <tr>
            <th>6.</th>
            <td>
                <code class="d-block">
                    \Form::nNumber('money', 'Money', 100.00, true,
                    ['step' =>"0.01", 'min'=> 0])
                </code>
            </td>
            <td>
                {!! \Form::nNumber('money', 'Money', 100.0, true, ['step' => '0.01', 'min' => 0]) !!}
            </td>
        </tr>
        <tr>
            <th>7.</th>
            <td>
                <code class="d-block">
                    \Form::nPassword('password', 'Password', true,
                    ['placeholder'
                    =>"Password Placeholder"])
                </code>
            </td>
            <td>
                {!! \Form::nPassword('password', 'Password', true, [
                    'placeholder' => 'Password Placeholder',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>8.</th>
            <td>
                <code class="d-block">
                    \Form::nDate('meeting_date', 'Meeting Date', null,
                    true)
                </code>
            </td>
            <td>
                {!! \Form::nDate('meeting_date', 'Meeting Date', null, true) !!}
            </td>
        </tr>
        <tr>
            <th>9.</th>
            <td>
                <code class="d-block">
                    \Form::nRange('rating', 'Rating', 5, true, ['min' =>
                    0, 'max' => 100])
                </code>
            </td>
            <td>
                {!! \Form::nRange('rating', 'Rating', 5, true, ['min' => 0, 'max' => 100]) !!}
            </td>
        </tr>
        <tr>
            <th>10.</th>
            <td>
                <code class="d-block">
                    \Form::nSearch('search_text', 'Search Text', null,
                    false, ['placeholder' =>
                    "Enter
                    what you want..."])
                </code>
            </td>
            <td>
                {!! \Form::nSearch('search_text', 'Search Text', null, false, [
                    'placeholder' => 'Enter what you want...',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>11.</th>
            <td>
                <code class="d-block">
                    \Form::nSelect('state', 'State', [1 => 'Dhaka', 2 =>
                    'Chittagong'], 2,
                    false,
                    ['placeholder' => "Select a State"])
                </code>
            </td>
            <td>
                {!! \Form::nSelect('state', 'State', [1 => 'Dhaka', 2 => 'Chittagong'], null, false, [
                    'placeholder' => 'Select a State',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>13.</th>
            <td>
                <code class="d-block">
                    \Form::nSelect('animal', 'Animal', [ 'Cats' =>
                    ['leopard' => 'Leopard'],
                    'Dogs' =>
                    ['spaniel' => 'Spaniel']], 2, false, ['placeholder' => "Select a Animal"])
                </code>
            </td>
            <td>
                {!! \Form::nSelect(
                    'animal',
                    'Animal',
                    ['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel']],
                    2,
                    false,
                    ['placeholder' => 'Select a Animal'],
                ) !!}
            </td>
        </tr>
        <tr>
            <th>14.</th>
            <td>
                <code class="d-block">
                    \Form::nSelectMulti('state', 'State', [1 => 'Dhaka',
                    2 => 'Chittagong'],
                    [2,1] ,
                    false, [])
                </code>
            </td>
            <td>
                {!! \Form::nSelectMulti('state', 'State', [1 => 'Dhaka', 2 => 'Chittagong'], [2, 1], false, []) !!}
            </td>
        </tr>
        <tr>
            <th>15.</th>
            <td>
                <code class="d-block">
                    \Form::nSelectMonth('month', 'Month', '2', true,
                    ['placeholder' => "Select a
                    Month"])
                </code>
            </td>
            <td>
                {!! \Form::nSelectMonth('month', 'Month', '2', true, [
                    'placeholder' => 'Select a Month',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>16.</th>
            <td>
                <code class="d-block">
                    \Form::nSelectRange('rating', 'Rating', 1,100, 20,
                    false, ['placeholder' =>
                    "Select
                    a Rating"])
                </code>
            </td>
            <td>
                {!! \Form::nSelectRange('rating', 'Rating', 1, 100, 20, false, [
                    'placeholder' => 'Select a Rating',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>17.</th>
            <td>
                <code class="d-block">
                    \Form::nTel('mobile', 'Mobile', null, true,
                    ['placeholder' => "Enter Mobile
                    Number"])
                </code>
            </td>
            <td>
                {!! \Form::nTel('mobile', 'Mobile', null, true, [
                    'placeholder' => 'Enter Mobile Number',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>18.</th>
            <td>
                <code class="d-block">
                    \Form::nText('summary', 'Summary', 'short summary',
                    true, ['placeholder' =>
                    "Type
                    some summary"])
                </code>
            </td>
            <td>
                {!! \Form::nText('summary', 'Summary', 'short summary', true, [
                    'placeholder' => 'Type some summary',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>19.</th>
            <td>
                <code class="d-block">
                    \Form::nTextarea('description', 'Description',
                    'short description', true,
                    ['placeholder' => "Type some description"])
                </code>
            </td>
            <td>
                {!! \Form::nTextarea('description', 'Description', 'short description', true, [
                    'placeholder' => 'Type some description',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>20.</th>
            <td>
                <code class="d-block">
                    \Form::nUrl('website', 'Website', null, true,
                    ['placeholder' => "Enter Your
                    Portfolio link"])
                </code>
            </td>
            <td>
                {!! \Form::nUrl('website', 'Website', null, true, [
                    'placeholder' => 'Enter Your Portfolio link',
                ]) !!}
            </td>
        </tr>
    </tbody>
</table>
