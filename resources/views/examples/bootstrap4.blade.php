<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Bootstrap 4 Examples</title>
</head>

<body>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                            aria-controls="nav-home" aria-selected="false">Group</a>
                        <a class="nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Horizon</a>
                        <a class="nav-link " id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                            aria-controls="nav-contact" aria-selected="false">Inline</a>
                        <a class="nav-link" id="nav-address-tab" data-toggle="tab" href="#nav-address" role="tab"
                            aria-controls="nav-address" aria-selected="true">Normal</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                            \Hafijul233\Form\Facades\Form::gDate('birth_date', 'Birth Date', null, true,
                                            'far fa-calendar-alt',
                                            'before')
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gDate(
                                            'birth_date',
                                            'Birth Date',
                                            null,
                                            true,
                                            'far fa-calendar-alt',
                                            'before',
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>2.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::gEmail('email_address', 'Email Address',
                                            'john@doe.com', true, 'far
                                            fa-envelope', 'after', ['placeholder' =>"Email Example Placeholder"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gEmail(
                                            'email_address',
                                            'Email Address',
                                            'john@doe.com',
                                            true,
                                            'far fa-envelope',
                                            'before',
                                            [
                                                'placeholder' => 'Email Example Placeholder',
                                            ],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>3.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::gNumber('money', 'Money', 100.00, true, 'fab
                                            fa-draft2digital',
                                            'before',
                                            ['step' =>"0.01", 'min'=> 0])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gNumber('money', 'Money', 100.0, true, 'fab fa-draft2digital', 'before', [
                                            'step' => '0.01',
                                            'min' => 0,
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>4.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::gPassword('password', 'Password', true, 'fas
                                            fa-lock', 'before',
                                            ['placeholder' =>"Password Placeholder"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gPassword('password', 'Password', true, 'fas fa-lock', 'before', [
                                            'placeholder' => 'Password Placeholder',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>5.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::gSearch('search_text', 'Search Text', null,
                                            false, 'fas fa-search',
                                            'before',
                                            ['placeholder' => "Enter what you want..."])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gSearch(
                                            'search_text',
                                            'Search Text',
                                            null,
                                            false,
                                            'fas fa-search',
                                            'before',
                                            [
                                                'placeholder' => 'Enter what you want...',
                                            ],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>6.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::gSelect('state', 'State', [1 => 'Dhaka', 2 =>
                                            'Chittagong'], 2,
                                            false, 'fas
                                            fa-sort', 'before', ['placeholder' => "Select a State"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gSelect(
                                            'state',
                                            'State',
                                            [1 => 'Dhaka', 2 => 'Chittagong'],
                                            null,
                                            false,
                                            'fas fa-sort',
                                            'before',
                                            [
                                                'placeholder' => 'Select a State',
                                            ],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>7.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::gSelect('animal', 'Animal', [ 'Cats' =>
                                            ['leopard' => 'Leopard'],
                                            'Dogs' =>
                                            ['spaniel' => 'Spaniel']], 2, false, 'fas fa-sort', 'before', ['placeholder'
                                            =>
                                            "Select a Animal"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gSelect(
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
                                            \Hafijul233\Form\Facades\Form::gSelectMulti('state', 'State', [1 => 'Dhaka',
                                            2 => 'Chittagong'],
                                            [2,1] ,
                                            false, 'fas fa-sort', 'before', [])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gSelectMulti(
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
                                            \Hafijul233\Form\Facades\Form::gSelectDay('work_day', 'Work Day', '2', true,
                                            'fas fa-calendar-day',
                                            'before', ['placeholder' => "Select a Day"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gSelectDay(
                                            'work_day',
                                            'Work Day',
                                            '2',
                                            true,
                                            'fas fa-calendar-day',
                                            'before',
                                            [
                                                'placeholder' => 'Select a Day',
                                            ],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>10.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::gSelectMonth('month', 'Month', '2', true,
                                            'far fa-calendar-alt',
                                            'before',
                                            ['placeholder' => "Select a Month"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gSelectMonth('month', 'Month', '2', true, 'far fa-calendar-alt', 'before', [
                                            'placeholder' => 'Select a Month',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>11.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::gSelectRange('rating', 'Rating', 1,100, 20,
                                            false, 'fas
                                            fa-sort-amount-down-alt', 'before', ['placeholder' => "Select a Rating"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gSelectRange(
                                            'rating',
                                            'Rating',
                                            1,
                                            100,
                                            20,
                                            false,
                                            'fas fa-sort-amount-down-alt',
                                            'before',
                                            [
                                                'placeholder' => 'Select a Rating',
                                            ],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>12.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::gTel('mobile', 'Mobile', null, true, 'fas
                                            fa-mobile-alt', 'before',
                                            ['placeholder' => "Enter Mobile Number"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gTel('mobile', 'Mobile', null, true, 'fas fa-mobile-alt', 'before', [
                                            'placeholder' => 'Enter Mobile Number',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>13.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::gText('summary', 'Summary', 'short summary',
                                            true, 'fas fa-font',
                                            'before',
                                            ['placeholder' => "Type some summary"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gText('summary', 'Summary', 'short summary', true, 'fas fa-font', 'before', [
                                            'placeholder' => 'Type some summary',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>14.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::gTextarea('description', 'Description',
                                            'short description', true,
                                            'fas
                                            fa-font', 'before', ['placeholder' => "Type some description"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gTextarea(
                                            'description',
                                            'Description',
                                            'short description',
                                            true,
                                            'fas fa-font',
                                            'before',
                                            [
                                                'placeholder' => 'Type some description',
                                            ],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>15.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::gUrl('website', 'Website', null, true, 'fas
                                            fa-globe', 'before',
                                            ['placeholder' => "Enter Your Portfolio link"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::gUrl('website', 'Website', null, true, 'fas fa-globe', 'before', [
                                            'placeholder' => 'Enter Your Portfolio link',
                                        ]) !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                        aria-labelledby="nav-profile-tab">
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
                                            \Hafijul233\Form\Facades\Form::hCheckbox('item', 'Item(s)', [1=>'Egg', 2 =>
                                            'Rice', 3 => 'other'],
                                            [3, 2],
                                            true)
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hCheckbox(
                                            'item',
                                            'Item(s)',
                                            [1 => 'Egg', 2 => 'Rice', 3 => 'other'],
                                            [3, 2],
                                            true,
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>2.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hDate('meeting_date', 'Meeting Date', null,
                                            true)
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hDate('meeting_date', 'Meeting Date', null, true) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>3.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hEmail('email_address', 'Email Address',
                                            'john@doe.com', true, 2,
                                            ['placeholder' =>"Email Example Placeholder"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hEmail('email_address', 'Email Address', 'john@doe.com', true, 2, [
                                            'placeholder' => 'Email Example Placeholder',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>4.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hFile('import_file', 'Import File', true, 2,
                                            ['accept' => "audio/*"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hFile('import_file', 'Import File', true, 2, ['accept' => 'audio/*']) !!}
                                    </td>
                                </tr>
                                {{-- <tr>
                                                    <th>5.</th>
                                                    <td>
                                                        <code class="d-block">
                                                            \Hafijul233\Form\Facades\Form::hImage('photo', 'Photo', true, [], ['accept' => "image/*"])
                                                        </code>
                                                    </td>
                                                    <td>
                                                        {!! \Hafijul233\Form\Facades\Form::hImage('photo', 'Photo', true, ['accept' => "image/*"]) !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>6.</th>
                                                    <td>
                                                        <code class="d-block">
                                                            \Hafijul233\Form\Facades\Form::hImage('profile_photo', 'Profile Photo', true,
                                                            ['preview' => true, 'height' => 128,
                                                            'default' => 'https://via.placeholder.com/300x128.png'], ['accept' => "image/*"])
                                                        </code>
                                                    </td>
                                                    <td>
                                                        {!! \Hafijul233\Form\Facades\Form::hImage('profile_photo', 'Profile Photo', true,
                                                            ['preview' => true, 'height' => 128,
                                                            'default' => 'https://via.placeholder.com/300x128.png'], ['accept' => "image/*"]) !!}
                                                    </td>
                                                </tr> --}}
                                <tr>
                                    <th>7.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hNumber('money', 'Money', 100.00, true, 2,
                                            ['step' =>"0.01", 'min'=>
                                            0])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hNumber('money', 'Money', 100.0, true, 2, ['step' => '0.01', 'min' => 0]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>8.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hPassword('password', 'Password', true, 2,
                                            ['placeholder'
                                            =>"Password Placeholder"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hPassword('password', 'Password', true, 2, [
                                            'placeholder' => 'Password Placeholder',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>9.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hRadio('gender', 'Gender', [1=>'Male', 2 =>
                                            'Female', 3 => 'Other'],
                                            3, true,
                                            2)
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hRadio(
                                            'gender',
                                            'Gender',
                                            [1 => 'Male', 2 => 'Female', 3 => 'Other'],
                                            3,
                                            true,
                                            2,
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>10.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hRange('rating', 'Rating', 5, true, 2, ['min'
                                            => 0, 'max' => 100])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hRange('rating', 'Rating', 5, true, 2, ['min' => 0, 'max' => 100]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>11.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hSearch('search_text', 'Search Text', null,
                                            false, 2, ['placeholder'
                                            =>
                                            "Enter
                                            what you want..."])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hSearch('search_text', 'Search Text', null, false, 2, [
                                            'placeholder' => 'Enter what you want...',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>12.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hSelect('state', 'State', [1 => 'Dhaka', 2 =>
                                            'Chittagong'], 2,
                                            false, 2,
                                            ['placeholder' => "Select a State"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hSelect('state', 'State', [1 => 'Dhaka', 2 => 'Chittagong'], null, false, 2, [
                                            'placeholder' => 'Select a State',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>13.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hSelect('animal', 'Animal', [ 'Cats' =>
                                            ['leopard' => 'Leopard'],
                                            'Dogs' =>
                                            ['spaniel' => 'Spaniel']], 2, false, 2, ['placeholder' => "Select a
                                            Animal"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hSelect(
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
                                            \Hafijul233\Form\Facades\Form::hSelectMulti('state', 'State', [1 => 'Dhaka',
                                            2 => 'Chittagong'],
                                            [2,1] ,
                                            false, 2, [])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hSelectMulti(
                                            'state',
                                            'State',
                                            [1 => 'Dhaka', 2 => 'Chittagong'],
                                            [2, 1],
                                            false,
                                            2,
                                            [],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>15.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hSelectMonth('month', 'Month', '2', true, 2,
                                            ['placeholder' =>
                                            "Select a
                                            Month"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hSelectMonth('month', 'Month', '2', true, 2, [
                                            'placeholder' => 'Select a Month',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>16.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hSelectRange('rating', 'Rating', 1,100, 20,
                                            false, 2, ['placeholder'
                                            =>
                                            "Select
                                            a Rating"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hSelectRange('rating', 'Rating', 1, 100, 20, false, 2, [
                                            'placeholder' => 'Select a Rating',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>17.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hTel('mobile', 'Mobile', null, true, 2,
                                            ['placeholder' => "Enter
                                            Mobile
                                            Number"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hTel('mobile', 'Mobile', null, true, 2, [
                                            'placeholder' => 'Enter Mobile Number',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>18.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hText('summary', 'Summary', 'short summary',
                                            true, 2, ['placeholder'
                                            => "Type
                                            some summary"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hText('summary', 'Summary', 'short summary', true, 2, [
                                            'placeholder' => 'Type some summary',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>19.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hTextarea('description', 'Description',
                                            'short description', true,
                                            2, ['placeholder' => "Type some description"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hTextarea('description', 'Description', 'short description', true, 2, [
                                            'placeholder' => 'Type some description',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>20.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::hUrl('website', 'Website', null, true, 2,
                                            ['placeholder' => "Enter
                                            Your
                                            Portfolio link"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::hUrl('website', 'Website', null, true, 2, [
                                            'placeholder' => 'Enter Your Portfolio link',
                                        ]) !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
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
                                            \Hafijul233\Form\Facades\Form::iCheckbox('item', 'Item(s)', [1=>'Egg', 2 =>
                                            'Rice', 3 => 'other'],
                                            [3, 2],
                                            true)
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iCheckbox(
                                            'item',
                                            'Item(s)',
                                            [1 => 'Egg', 2 => 'Rice', 3 => 'other inline'],
                                            [3, 2],
                                            true,
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>2.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iDate('meeting_date', 'Meeting Date', null,
                                            true)
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iDate('meeting_date', 'Meeting Date', null, true) !!}
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
                                        {!! \Hafijul233\Form\Facades\Form::iEmail(
                                            'email_address',
                                            'Email Address',
                                            'john@doe.com',
                                            true,
                                            'fas fa-envelop',
                                            'before',
                                            [
                                                'placeholder' => 'Email Example Placeholder',
                                            ],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>4.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iFile('import_file', 'Import File', true,
                                            ['accept' => "audio/*"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iFile('import_file', 'Import File', true, ['accept' => 'audio/*']) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>5.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iImage('photo', 'Photo', true, [], ['accept'
                                            => "image/*"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iImage('photo', 'Photo', true, ['accept' => 'image/*']) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>6.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iImage('profile_photo', 'Profile Photo',
                                            true,
                                            ['preview' => true, 'height' => 128,
                                            'default' => 'https://via.placeholder.com/300x128.png'], ['accept' =>
                                            "image/*"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iImage(
                                            'profile_photo',
                                            'Profile Photo',
                                            true,
                                            ['preview' => true, 'height' => 128, 'default' => 'https://via.placeholder.com/300x128.png'],
                                            ['accept' => 'image/*'],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>7.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iNumber('money', 'Money', 100.00, true, 'fas
                                            fa-user', 'before',
                                            ['step' =>"0.01", 'min'=> 0])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iNumber('money', 'Money', 100.0, true, 'fas fa-user', 'before', [
                                            'step' => '0.01',
                                            'min' => 0,
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>8.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iPassword('password', 'Password',
                                            '123456789', true, ['placeholder'
                                            =>"Password Placeholder"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iPassword('password', 'Password', '123456789', true, [
                                            'placeholder' => 'Password Placeholder',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>9.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iRadio('gender', 'Gender', [1=>'Male', 2 =>
                                            'Female', 3 => 'Other'],
                                            3, true)
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iRadio(
                                            'gender',
                                            'Gender',
                                            [1 => 'Male', 2 => 'Female', 3 => 'Other'],
                                            3,
                                            true,
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>10.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iRange('rating', 'Rating', 5, true, ['min' =>
                                            0, 'max' => 100])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iRange('rating', 'Rating', 5, true, ['min' => 0, 'max' => 100]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>11.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iSearch('search_text', 'Search Text', null,
                                            false, 'fas fa-user',
                                            'before', ['placeholder' => "Enter
                                            what you want..."])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iSearch('search_text', 'Search Text', null, false, 'fas fa-user', 'before', [
                                            'placeholder' => 'Enter what you want...',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>12.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iSelect('state', 'State', [1 => 'Dhaka', 2 =>
                                            'Chittagong'], 2,
                                            false,
                                            'fas fa-user', 'before', ['placeholder' => "Select a State"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iSelect(
                                            'state',
                                            'State',
                                            [1 => 'Dhaka', 2 => 'Chittagong'],
                                            null,
                                            false,
                                            'fas fa-user',
                                            'before',
                                            [
                                                'placeholder' => 'Select a State',
                                            ],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>13.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iSelect('animal', 'Animal', [ 'Cats' =>
                                            ['leopard' => 'Leopard'],
                                            'Dogs' =>
                                            ['spaniel' => 'Spaniel']], 2, false, ['placeholder' => "Select a Animal"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iSelect(
                                            'animal',
                                            'Animal',
                                            ['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel']],
                                            2,
                                            false,
                                            'fas fa-user',
                                            'before',
                                            ['placeholder' => 'Select a Animal'],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>14.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iSelectMulti('state', 'State', [1 => 'Dhaka',
                                            2 => 'Chittagong'],
                                            [2,1] ,
                                            false, [])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iSelectMulti(
                                            'state',
                                            'State',
                                            [1 => 'Dhaka', 2 => 'Chittagong'],
                                            [2, 1],
                                            false,
                                            'fas fa-user',
                                            'before',
                                            [],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>15.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iSelectMonth('month', 'Month', '2', true,
                                            ['placeholder' => "Select a
                                            Month"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iSelectMonth('month', 'Month', '2', true, 'fas fa-user', 'before', [
                                            'placeholder' => 'Select a Month',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>16.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iSelectRange('rating', 'Rating', 1,100, 20,
                                            false, 'fas fa-user',
                                            'before',['placeholder' => "Select
                                            a Rating"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iSelectRange('rating', 'Rating', 1, 100, 20, false, 'fas fa-user', 'before', [
                                            'placeholder' => 'Select a Rating',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>17.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iTel('mobile', 'Mobile', null, true, 'fas
                                            fa-user',
                                            'before',['placeholder' => "Enter Mobile
                                            Number"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iTel('mobile', 'Mobile', null, true, 'fas fa-user', 'before', [
                                            'placeholder' => 'Enter Mobile Number',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>18.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iText('summary', 'Summary', 'short summary',
                                            true, 'fas fa-user',
                                            'before',['placeholder' => "Type
                                            some summary"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iText('summary', 'Summary', 'short summary', true, 'fas fa-user', 'before', [
                                            'placeholder' => 'Type some summary',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>19.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iTextarea('description', 'Description',
                                            'short description', true,
                                            'fas fa-user', 'before',['placeholder' => "Type some description"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iTextarea(
                                            'description',
                                            'Description',
                                            'short description',
                                            true,
                                            'fas fa-user',
                                            'before',
                                            [
                                                'placeholder' => 'Type some description',
                                            ],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>20.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::iUrl('website', 'Website', null, true, 'fas
                                            fa-user',
                                            'before',['placeholder' => "Enter Your
                                            Portfolio link"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::iUrl('website', 'Website', null, true, 'fas fa-user', 'before', [
                                            'placeholder' => 'Enter Your Portfolio link',
                                        ]) !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="nav-address" role="tabpanel" aria-labelledby="nav-address-tab">
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
                                            \Hafijul233\Form\Facades\Form::nCheckbox('item', 'Item(s)', [1=>'Egg', 2 =>
                                            'Rice', 3 => 'other'],
                                            [3, 2],
                                            true)
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nCheckbox(
                                            'item',
                                            'Item(s)',
                                            [1 => 'Egg', 2 => 'Rice', 3 => 'other'],
                                            [3, 2],
                                            true,
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>2.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nDate('meeting_date', 'Meeting Date', null,
                                            true)
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nDate('meeting_date', 'Meeting Date', null, true) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>3.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nEmail('email_address', 'Email Address',
                                            'john@doe.com', true,
                                            ['placeholder'
                                            =>"Email Example Placeholder"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nEmail('email_address', 'Email Address', 'john@doe.com', true, [
                                            'placeholder' => 'Email Example Placeholder',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>4.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nFile('import_file', 'Import File', true,
                                            ['accept' => "audio/*"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nFile('import_file', 'Import File', true, ['accept' => 'audio/*']) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>5.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nImage('photo', 'Photo', true, [], ['accept'
                                            => "image/*"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nImage('photo', 'Photo', true, ['accept' => 'image/*']) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>6.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nImage('profile_photo', 'Profile Photo',
                                            true,
                                            ['preview' => true, 'height' => 128,
                                            'default' => 'https://via.placeholder.com/300x128.png'], ['accept' =>
                                            "image/*"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nImage(
                                            'profile_photo',
                                            'Profile Photo',
                                            true,
                                            ['preview' => true, 'height' => 128, 'default' => 'https://via.placeholder.com/300x128.png'],
                                            ['accept' => 'image/*'],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>7.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nNumber('money', 'Money', 100.00, true,
                                            ['step' =>"0.01", 'min'=> 0])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nNumber('money', 'Money', 100.0, true, ['step' => '0.01', 'min' => 0]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>8.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nPassword('password', 'Password', true,
                                            ['placeholder'
                                            =>"Password Placeholder"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nPassword('password', 'Password', true, [
                                            'placeholder' => 'Password Placeholder',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>9.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nRadio('gender', 'Gender', [1=>'Male', 2 =>
                                            'Female', 3 => 'Other'],
                                            3, true)
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nRadio(
                                            'gender',
                                            'Gender',
                                            [1 => 'Male', 2 => 'Female', 3 => 'Other'],
                                            3,
                                            true,
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>10.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nRange('rating', 'Rating', 5, true, ['min' =>
                                            0, 'max' => 100])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nRange('rating', 'Rating', 5, true, ['min' => 0, 'max' => 100]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>11.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nSearch('search_text', 'Search Text', null,
                                            false, ['placeholder' =>
                                            "Enter
                                            what you want..."])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nSearch('search_text', 'Search Text', null, false, [
                                            'placeholder' => 'Enter what you want...',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>12.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nSelect('state', 'State', [1 => 'Dhaka', 2 =>
                                            'Chittagong'], 2,
                                            false,
                                            ['placeholder' => "Select a State"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nSelect('state', 'State', [1 => 'Dhaka', 2 => 'Chittagong'], null, false, [
                                            'placeholder' => 'Select a State',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>13.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nSelect('animal', 'Animal', [ 'Cats' =>
                                            ['leopard' => 'Leopard'],
                                            'Dogs' =>
                                            ['spaniel' => 'Spaniel']], 2, false, ['placeholder' => "Select a Animal"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nSelect(
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
                                            \Hafijul233\Form\Facades\Form::nSelectMulti('state', 'State', [1 => 'Dhaka',
                                            2 => 'Chittagong'],
                                            [2,1] ,
                                            false, [])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nSelectMulti(
                                            'state',
                                            'State',
                                            [1 => 'Dhaka', 2 => 'Chittagong'],
                                            [2, 1],
                                            false,
                                            [],
                                        ) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>15.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nSelectMonth('month', 'Month', '2', true,
                                            ['placeholder' => "Select a
                                            Month"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nSelectMonth('month', 'Month', '2', true, [
                                            'placeholder' => 'Select a Month',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>16.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nSelectRange('rating', 'Rating', 1,100, 20,
                                            false, ['placeholder' =>
                                            "Select
                                            a Rating"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nSelectRange('rating', 'Rating', 1, 100, 20, false, [
                                            'placeholder' => 'Select a Rating',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>17.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nTel('mobile', 'Mobile', null, true,
                                            ['placeholder' => "Enter Mobile
                                            Number"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nTel('mobile', 'Mobile', null, true, [
                                            'placeholder' => 'Enter Mobile Number',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>18.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nText('summary', 'Summary', 'short summary',
                                            true, ['placeholder' =>
                                            "Type
                                            some summary"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nText('summary', 'Summary', 'short summary', true, [
                                            'placeholder' => 'Type some summary',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>19.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nTextarea('description', 'Description',
                                            'short description', true,
                                            ['placeholder' => "Type some description"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nTextarea('description', 'Description', 'short description', true, [
                                            'placeholder' => 'Type some description',
                                        ]) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>20.</th>
                                    <td>
                                        <code class="d-block">
                                            \Hafijul233\Form\Facades\Form::nUrl('website', 'Website', null, true,
                                            ['placeholder' => "Enter Your
                                            Portfolio link"])
                                        </code>
                                    </td>
                                    <td>
                                        {!! \Hafijul233\Form\Facades\Form::nUrl('website', 'Website', null, true, [
                                            'placeholder' => 'Enter Your Portfolio link',
                                        ]) !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>
