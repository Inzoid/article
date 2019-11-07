

<h3>Hello {!! $detail['email'] !!}</h3>

<p>Seseorang meminta untuk mengganti password 
    <br>
    Jika bukan tolong abaikan pesan ini,
    <br>
    Tapi jika iya, klik link dibawah untuk mengganti password
</p>
<?php

$id = $detail['id'];
$code = $detail['code'];
//dd($code);
?>
<a href="{{ route('reminders.edit', ['id' => $id, 'code' =>
    $code]) }}">Click Me
</a>
<h2>Thanks</h2>

