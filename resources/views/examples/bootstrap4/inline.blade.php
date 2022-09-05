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
                    \Form::iCheckbox('item', 'Item(s)', [1=>'Egg', 2 =>
                    'Rice', 3 => 'other'],
                    [3, 2],
                    true)
                </code>
            </td>
            <td>
                {!! \Form::iCheckbox('item', 'Item(s)', [1 => 'Egg', 2 => 'Rice', 3 => 'other inline'], [3, 2], true, [
                    'inline' => true,
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>2.</th>
            <td>
                <code class="d-block">
                    \Form::iDate('meeting_date', 'Meeting Date', null,
                    true)
                </code>
            </td>
            <td>
                {!! \Form::iDate('meeting_date', 'Meeting Date', null, true, null, 'before', ['inline' => true]) !!}
            </td>
        </tr>
        <tr>
            <th>3.</th>
            <td>
                <code class="d-block">
                    Form::iEmail('email_address', 'Email Address', 'john@doe.com', true,
                    'fas fa-envelop', 'before', ['placeholder' =>"Email Example Placeholder"])
                </code>
            </td>
            <td>
                {!! \Form::iEmail('email_address', 'Email Address', 'john@doe.com', true, 'fas fa-envelop', 'before', [
                    'inline' => true,
                    'placeholder' => 'Email Example Placeholder',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>4.</th>
            <td>
                <code class="d-block">
                    \Form::iFile('import_file', 'Import File', true,
                    ['accept' => "audio/*"])
                </code>
            </td>
            <td>
                {!! \Form::iFile('import_file', 'Import File', true, ['inline' => true, 'accept' => 'audio/*']) !!}
            </td>
        </tr>
        <tr>
            <th>5.</th>
            <td>
                <code class="d-block">
                    \Form::iImage('photo', 'Photo', true, [], ['accept'
                    => "image/*"])
                </code>
            </td>
            <td>
                {!! \Form::iImage('photo', 'Photo', true, ['inline' => true, 'accept' => 'image/*']) !!}
            </td>
        </tr>
        <tr>
            <th>6.</th>
            <td>
                <code class="d-block">
                    \Form::iImage('profile_photo', 'Profile Photo',
                    true,
                    ['preview' => true, 'height' => 128,
                    'default' => 'https://via.placeholder.com/300x128.png'], ['accept' =>
                    "image/*"])
                </code>
            </td>
            <td>
                {!! \Form::iImage(
                    'profile_photo',
                    'Profile Photo',
                    true,
                    ['preview' => true, 'height' => 128, 'default' => 'https://via.placeholder.com/300x128.png'],
                    ['accept' => 'image/*', 'inline' => true],
                ) !!}
            </td>
        </tr>
        <tr>
            <th>7.</th>
            <td>
                <code class="d-block">
                    \Form::iNumber('money', 'Money', 100.00, true, 'fas
                    fa-user', 'before',
                    ['step' =>"0.01", 'min'=> 0])
                </code>
            </td>
            <td>
                {!! \Form::iNumber('money', 'Money', 100.0, true, 'fas fa-user', 'before', [
                    'inline' => true,
                    'step' => '0.01',
                    'min' => 0,
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>8.</th>
            <td>
                <code class="d-block">
                    \Form::iPassword('password', 'Password',
                    '123456789', true, ['placeholder'
                    =>"Password Placeholder"])
                </code>
            </td>
            <td>
                {!! \Form::iPassword('password', 'Password', '123456789', true, [
                    'inline' => true,
                    'placeholder' => 'Password Placeholder',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>9.</th>
            <td>
                <code class="d-block">
                    \Form::iRadio('gender', 'Gender', [1=>'Male', 2 =>
                    'Female', 3 => 'Other'],
                    3, true)
                </code>
            </td>
            <td>
                {!! \Form::iRadio('gender', 'Gender', [1 => 'Male', 2 => 'Female', 3 => 'Other'], 3, true, ['inline' => true]) !!}
            </td>
        </tr>
        <tr>
            <th>10.</th>
            <td>
                <code class="d-block">
                    \Form::iRange('rating', 'Rating', 5, true, ['min' =>
                    0, 'max' => 100])
                </code>
            </td>
            <td>
                {!! \Form::iRange('rating', 'Rating', 5, true, ['inline' => true, 'min' => 0, 'max' => 100]) !!}
            </td>
        </tr>
        <tr>
            <th>11.</th>
            <td>
                <code class="d-block">
                    \Form::iSearch('search_text', 'Search Text', null,
                    false, 'fas fa-user',
                    'before', ['placeholder' => "Enter
                    what you want..."])
                </code>
            </td>
            <td>
                {!! \Form::iSearch('search_text', 'Search Text', null, false, 'fas fa-user', 'before', [
                    'placeholder' => 'Enter what you want...',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>12.</th>
            <td>
                <code class="d-block">
                    \Form::iSelect('state', 'State', [1 => 'Dhaka', 2 =>
                    'Chittagong'], 2,
                    false,
                    'fas fa-user', 'before', ['placeholder' => "Select a State"])
                </code>
            </td>
            <td>
                {!! \Form::iSelect('state', 'State', [1 => 'Dhaka', 2 => 'Chittagong'], null, false, 'fas fa-user', 'before', [
                    'inline' => true,
                    'placeholder' => 'Select a State',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>13.</th>
            <td>
                <code class="d-block">
                    \Form::iSelect('animal', 'Animal', [ 'Cats' =>
                    ['leopard' => 'Leopard'],
                    'Dogs' =>
                    ['spaniel' => 'Spaniel']], 2, false, ['placeholder' => "Select a Animal"])
                </code>
            </td>
            <td>
                {!! \Form::iSelect(
                    'animal',
                    'Animal',
                    ['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel']],
                    2,
                    false,
                    'fas fa-user',
                    'before',
                    ['placeholder' => 'Select a Animal', 'inline' => true],
                ) !!}
            </td>
        </tr>
        <tr>
            <th>14.</th>
            <td>
                <code class="d-block">
                    \Form::iSelectMulti('state', 'State', [1 => 'Dhaka',
                    2 => 'Chittagong'],
                    [2,1] ,
                    false, [])
                </code>
            </td>
            <td>
                {!! \Form::iSelectMulti(
                    'state',
                    'State',
                    [1 => 'Dhaka', 2 => 'Chittagong'],
                    [2, 1],
                    false,
                    'fas fa-user',
                    'before',
                    ['inline' => true],
                ) !!}
            </td>
        </tr>
        <tr>
            <th>15.</th>
            <td>
                <code class="d-block">
                    \Form::iSelectMonth('month', 'Month', '2', true,
                    ['placeholder' => "Select a
                    Month"])
                </code>
            </td>
            <td>
                {!! \Form::iSelectMonth('month', 'Month', '2', true, 'fas fa-user', 'before', [
                    'inline' => true,
                    'placeholder' => 'Select a Month',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>16.</th>
            <td>
                <code class="d-block">
                    \Form::iSelectRange('rating', 'Rating', 1,100, 20,
                    false, 'fas fa-user',
                    'before',['placeholder' => "Select
                    a Rating"])
                </code>
            </td>
            <td>
                {!! \Form::iSelectRange('rating', 'Rating', 1, 100, 20, false, 'fas fa-user', 'before', [
                    'inline' => true,
                    'placeholder' => 'Select a Rating',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>17.</th>
            <td>
                <code class="d-block">
                    \Form::iTel('mobile', 'Mobile', null, true, 'fas
                    fa-user',
                    'before',['placeholder' => "Enter Mobile
                    Number"])
                </code>
            </td>
            <td>
                {!! \Form::iTel('mobile', 'Mobile', null, true, 'fas fa-user', 'before', [
                    'inline' => true,
                    'placeholder' => 'Enter Mobile Number',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>18.</th>
            <td>
                <code class="d-block">
                    \Form::iText('summary', 'Summary', 'short summary',
                    true, 'fas fa-user',
                    'before',['placeholder' => "Type
                    some summary"])
                </code>
            </td>
            <td>
                {!! \Form::iText('summary', 'Summary', 'short summary', true, 'fas fa-user', 'before', [
                    'inline' => true,
                    'placeholder' => 'Type some summary',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>19.</th>
            <td>
                <code class="d-block">
                    \Form::iTextarea('description', 'Description',
                    'short description', true,
                    'fas fa-user', 'before',['placeholder' => "Type some description"])
                </code>
            </td>
            <td>
                {!! \Form::iTextarea('description', 'Description', 'short description', true, 'fas fa-user', 'before', [
                    'inline' => true,
                    'placeholder' => 'Type some description',
                ]) !!}
            </td>
        </tr>
        <tr>
            <th>20.</th>
            <td>
                <code class="d-block">
                    \Form::iUrl('website', 'Website', null, true, 'fas
                    fa-user',
                    'before',['placeholder' => "Enter Your
                    Portfolio link"])
                </code>
            </td>
            <td>
                {!! \Form::iUrl('website', 'Website', null, true, 'fas fa-user', 'before', [
                    'inline' => true,
                    'placeholder' => 'Enter Your Portfolio link',
                ]) !!}
            </td>
        </tr>
    </tbody>
</table>
