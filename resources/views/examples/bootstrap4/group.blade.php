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
                \Form::gDate('birth_date', 'Birth Date', null, true,
                'far fa-calendar-alt',
                'before')
            </code>
        </td>
        <td>
            {!! \Form::gDate('birth_date', 'Birth Date', null, true, 'far fa-calendar-alt', 'before') !!}
        </td>
    </tr>
    <tr>
        <th>2.</th>
        <td>
            <code class="d-block">
                \Form::gEmail('email_address', 'Email Address',
                'john@doe.com', true, 'far
                fa-envelope', 'after', ['placeholder' =>"Email Example Placeholder"])
            </code>
        </td>
        <td>
            {!! \Form::gEmail('email_address', 'Email Address', 'john@doe.com', true, 'far fa-envelope', 'before', [
                'placeholder' => 'Email Example Placeholder',
            ]) !!}
        </td>
    </tr>
    <tr>
        <th>3.</th>
        <td>
            <code class="d-block">
                \Form::gNumber('money', 'Money', 100.00, true, 'fab
                fa-draft2digital',
                'before',
                ['step' =>"0.01", 'min'=> 0])
            </code>
        </td>
        <td>
            {!! \Form::gNumber('money', 'Money', 100.0, true, 'fab fa-draft2digital', 'before', [
                'step' => '0.01',
                'min' => 0,
            ]) !!}
        </td>
    </tr>
    <tr>
        <th>4.</th>
        <td>
            <code class="d-block">
                \Form::gPassword('password', 'Password', true, 'fas
                fa-lock', 'before',
                ['placeholder' =>"Password Placeholder"])
            </code>
        </td>
        <td>
            {!! \Form::gPassword('password', 'Password', true, 'fas fa-lock', 'before', [
                'placeholder' => 'Password Placeholder',
            ]) !!}
        </td>
    </tr>
    <tr>
        <th>5.</th>
        <td>
            <code class="d-block">
                \Form::gSearch('search_text', 'Search Text', null,
                false, 'fas fa-search',
                'before',
                ['placeholder' => "Enter what you want..."])
            </code>
        </td>
        <td>
            {!! \Form::gSearch('search_text', 'Search Text', null, false, 'fas fa-search', 'before', [
                'placeholder' => 'Enter what you want...',
            ]) !!}
        </td>
    </tr>
    <tr>
        <th>6.</th>
        <td>
            <code class="d-block">
                \Form::gSelect('state', 'State', [1 => 'Dhaka', 2 =>
                'Chittagong'], 2,
                false, 'fas
                fa-sort', 'before', ['placeholder' => "Select a State"])
            </code>
        </td>
        <td>
            {!! \Form::gSelect('state', 'State', [1 => 'Dhaka', 2 => 'Chittagong'], null, false, 'fas fa-sort', 'before', [
                'placeholder' => 'Select a State',
            ]) !!}
        </td>
    </tr>
    <tr>
        <th>7.</th>
        <td>
            <code class="d-block">
                \Form::gSelect('animal', 'Animal', [ 'Cats' =>
                ['leopard' => 'Leopard'],
                'Dogs' =>
                ['spaniel' => 'Spaniel']], 2, false, 'fas fa-sort', 'before', ['placeholder'
                =>
                "Select a Animal"])
            </code>
        </td>
        <td>
            {!! \Form::gSelect(
                'animal',
                'Animal',
                ['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel']],
                2,
                false,
                'fas fa-sort',
                'before',
                ['placeholder' => 'Select a Animal'],
            ) !!}
        </td>
    </tr>
    <tr>
        <th>8.</th>
        <td>
            <code class="d-block">
                \Form::gSelectMulti('state', 'State', [1 => 'Dhaka',
                2 => 'Chittagong'],
                [2,1] ,
                false, 'fas fa-sort', 'before', [])
            </code>
        </td>
        <td>
            {!! \Form::gSelectMulti(
                'state',
                'State',
                [1 => 'Dhaka', 2 => 'Chittagong'],
                [2, 1],
                false,
                'fas fa-sort',
                'before',
                [],
            ) !!}
        </td>
    </tr>
    <tr>
        <th>9.</th>
        <td>
            <code class="d-block">
                \Form::gSelectDay('work_day', 'Work Day', '2', true,
                'fas fa-calendar-day',
                'before', ['placeholder' => "Select a Day"])
            </code>
        </td>
        <td>
            {!! \Form::gSelectDay('work_day', 'Work Day', '2', true, 'fas fa-calendar-day', 'before', [
                'placeholder' => 'Select a Day',
            ]) !!}
        </td>
    </tr>
    <tr>
        <th>10.</th>
        <td>
            <code class="d-block">
                \Form::gSelectMonth('month', 'Month', '2', true,
                'far fa-calendar-alt',
                'before',
                ['placeholder' => "Select a Month"])
            </code>
        </td>
        <td>
            {!! \Form::gSelectMonth('month', 'Month', '2', true, 'far fa-calendar-alt', 'before', [
                'placeholder' => 'Select a Month',
            ]) !!}
        </td>
    </tr>
    <tr>
        <th>11.</th>
        <td>
            <code class="d-block">
                \Form::gSelectRange('rating', 'Rating', 1,100, 20,
                false, 'fas
                fa-sort-amount-down-alt', 'before', ['placeholder' => "Select a Rating"])
            </code>
        </td>
        <td>
            {!! \Form::gSelectRange('rating', 'Rating', 1, 100, 20, false, 'fas fa-sort-amount-down-alt', 'before', [
                'placeholder' => 'Select a Rating',
            ]) !!}
        </td>
    </tr>
    <tr>
        <th>12.</th>
        <td>
            <code class="d-block">
                \Form::gTel('mobile', 'Mobile', null, true, 'fas
                fa-mobile-alt', 'before',
                ['placeholder' => "Enter Mobile Number"])
            </code>
        </td>
        <td>
            {!! \Form::gTel('mobile', 'Mobile', null, true, 'fas fa-mobile-alt', 'before', [
                'placeholder' => 'Enter Mobile Number',
            ]) !!}
        </td>
    </tr>
    <tr>
        <th>13.</th>
        <td>
            <code class="d-block">
                \Form::gText('summary', 'Summary', 'short summary',
                true, 'fas fa-font',
                'before',
                ['placeholder' => "Type some summary"])
            </code>
        </td>
        <td>
            {!! \Form::gText('summary', 'Summary', 'short summary', true, 'fas fa-font', 'before', [
                'placeholder' => 'Type some summary',
            ]) !!}
        </td>
    </tr>
    <tr>
        <th>14.</th>
        <td>
            <code class="d-block">
                \Form::gTextarea('description', 'Description',
                'short description', true,
                'fas
                fa-font', 'before', ['placeholder' => "Type some description"])
            </code>
        </td>
        <td>
            {!! \Form::gTextarea('description', 'Description', 'short description', true, 'fas fa-font', 'before', [
                'placeholder' => 'Type some description',
            ]) !!}
        </td>
    </tr>
    <tr>
        <th>15.</th>
        <td>
            <code class="d-block">
                \Form::gUrl('website', 'Website', null, true, 'fas
                fa-globe', 'before',
                ['placeholder' => "Enter Your Portfolio link"])
            </code>
        </td>
        <td>
            {!! \Form::gUrl('website', 'Website', null, true, 'fas fa-globe', 'before', [
                'placeholder' => 'Enter Your Portfolio link',
            ]) !!}
        </td>
    </tr>
    </tbody>
</table>
