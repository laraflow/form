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
    </tbody>
</table>
