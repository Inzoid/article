@extends('layout.blade')
@section('container')

<h3>Hello {!! $detail['email'] !!}</h3>

<p>Seseorang meminta untuk mengganti password 
    <br>
    Jika bukan tolong abaikan pesan ini,
    <br>
    Tapi jika iya, klik link dibawah untuk mengganti password
</p>

<a href="{{ route('reminders.edit', ['id' => $detail['id'], 'code' =>
    $detail['code']) }}">Click Me</a>

<h2>Thanks</h2>

@endsection