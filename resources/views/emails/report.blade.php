@component('mail::message')
# Hello,

Just a heads up! You have payment due in

@component('mail::button', ['url' => 'http://localhost'])
Manage Expenses
@endcomponent

Thanks,<br>
Frugal Team
@endcomponent
