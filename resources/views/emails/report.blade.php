@component('mail::message')
# Hello, {{auth::user()->name}}

Just a heads up! You have the following payment: {{$expense->expense}} due on {{$expense->duedate}}

@component('mail::button', ['url' => 'http://localhost'])
Manage Expenses
@endcomponent

Thanks,<br>
Frugal Team
@endcomponent
