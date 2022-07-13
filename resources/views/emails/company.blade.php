<!DOCTYPE html>

<html lang="en">

<head>

    <title>Mini-CRM</title>

</head>

<body>

<h1>New Company Registered</h1>

<dl class="dl-horizontal">
</dl>
<div class="well">
    <dl class="dl-horizontal">
        <label>Name:</label>
        <p>{{ $company->name }}</p>
    </dl>

    <dl class="dl-horizontal">
        <label>Email:</label>
        <p>{{ $company->email }}</p>
    </dl>

    <dl class="dl-horizontal">
        <label>Website:</label>
        <p>{{ $company->website }}</p>
    </dl>

    <dl class="dl-horizontal">
        <label>Created At:</label>
        <p>{{ date('M j, Y H:i:s', strtotime($company->created_at)) }}</p>
    </dl>

    <dl class="dl-horizontal">
        <label>Last Updated:</label>
        @if(empty($company->updated_at))
            <p>Never</p>
        @else
            <p>{{ date('M j, Y H:i:s', strtotime($company->updated_at)) }}</p>
        @endif

    </dl>
</div>


<p>Thank you</p>

</body>

</html>
