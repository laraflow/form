<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="false">Group</a>
                    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false">Horizon</a>
                    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                       aria-controls="nav-contact" aria-selected="false">Inline</a>
                    <a class="nav-link active" id="nav-address-tab" data-toggle="tab" href="#nav-address" role="tab"
                       aria-controls="nav-address" aria-selected="true">Normal</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"></div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                <div class="tab-pane fade show active" id="nav-address" role="tabpanel"
                     aria-labelledby="nav-address-tab">
                    <table class="table table-bordered mt-3">
                        <thead>
                        <tr>
                            <th width="50%">Code</th>
                            <th>Output</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <code class="d-block">
                                    \Form::nCheckbox('item', 'Item(s)', [1=>'Egg', 2 => 'Rice', 3 => 'other'], [3, 2],
                                    true)
                                </code>
                            </td>
                            <td>
                                {!! \Form::nCheckbox('item', 'Item(s)', [1=>'Egg', 2 => 'Rice', 3 => 'other'], [3, 2], true) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <code class="d-block">
                                    \Form::nDate('meeting_date', 'Meeting Date', null, true)
                                </code>
                            </td>
                            <td>
                                {!! \Form::nDate('meeting_date', 'Meeting Date', null, true) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <code class="d-block">
                                    \Form::nEmail('email_address', 'Email Address', 'john@doe.com', true, ['placeholder'
                                    =>"Email Example Placeholder"])
                                </code>
                            </td>
                            <td>
                                {!! \Form::nEmail('email_address', 'Email Address', 'john@doe.com', true, ['placeholder' =>"Email Example Placeholder"]) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <code class="d-block">
                                    \Form::nFile('import_file', 'Import File', true, ['accept' => "audio/*"])
                                </code>
                            </td>
                            <td>
                                {!! \Form::nFile('import_file', 'Import File', true, ['accept' => "audio/*"]) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <code class="d-block">
                                    \Form::nImage('photo', 'Photo', true, [], ['accept' => "image/*"])
                                </code>
                            </td>
                            <td>
                                {!! \Form::nImage('photo', 'Photo', true, ['accept' => "image/*"]) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <code class="d-block">
                                    \Form::nImage('profile_photo', 'Profile Photo', true,
                                    ['preview' => true, 'height' => 128,
                                    'default' => 'https://via.placeholder.com/300x128.png'], [])
                                </code>
                            </td>
                            <td>
                                {!! \Form::nImage('profile_photo', 'Profile Photo', true,
                                    ['preview' => true, 'height' => 128,
                                    'default' => 'https://via.placeholder.com/300x128.png'], []) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <code class="d-block">
                                    \Form::nNumber('money', 'Money', 100.00, true, ['step' =>"0.01", 'min'=> 0])
                                </code>
                            </td>
                            <td>
                                {!! \Form::nNumber('money', 'Money', 100.00, true, ['step' =>"0.01", 'min'=> 0]) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <code class="d-block">
                                    \Form::nPassword('password', 'Password', '123456789', true, ['placeholder'
                                    =>"Password Placeholder"])
                                </code>
                            </td>
                            <td>
                                {!! \Form::nPassword('password', 'Password', '123456789', true, ['placeholder' =>"Password Placeholder"]) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <code class="d-block">
                                    \Form::nRadio('gender', 'Gender', [1=>'Male', 2 => 'Female', 3 => 'Other'], 3, true)
                                </code>
                            </td>
                            <td>
                                {!! \Form::nRadio('gender', 'Gender', [1=>'Male', 2 => 'Female', 3 => 'Other'], 3, true) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <code class="d-block">
                                    \Form::nRange('rating', 'Rating', 5, true, ['min' => 0, 'max' => 100])
                                </code>
                            </td>
                            <td>
                                {!! \Form::nRange('rating', 'Rating', 5, true, ['min' => 0, 'max' => 100]) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <code class="d-block">
                                    \Form::nSearch('search_text', 'Search Text', null, false, ['placeholder' => "Enter what you want..."])
                                </code>
                            </td>
                            <td>
                                {!! \Form::nSearch('search_text', 'Search Text', null, false, ['placeholder' => "Enter what you want..."]) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <code class="d-block">
                                    \Form::nSelect('state', 'State', [1 => 'Dhaka', 2 => 'Chittagong'], 2, false, ['placeholder' => "Select a State"])
                                </code>
                            </td>
                            <td>
                                {!! \Form::nSelect('state', 'State', [1 => 'Dhaka', 2 => 'Chittagong'], null, false, ['placeholder' => "Select a State"]) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <code class="d-block">
                                    \Form::nSelectMulti('state', 'State', [1 => 'Dhaka', 2 => 'Chittagong'], [2,1] , false, ['placeholder' => "Select a State", "multiple" => "multiple"])
                                </code>
                            </td>
                            <td>
                                {!! \Form::nSelectMulti('state', 'State', [1 => 'Dhaka', 2 => 'Chittagong'], [2,1] , false, ['placeholder' => "Select a State", "multiple" => "multiple"]) !!}
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
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
</body>
</html>
