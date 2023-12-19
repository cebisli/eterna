@extends('dashboard')

@section('icerik')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Gönderi Başlığı</th>
        <th scope="col">Abone Adı Soyadı</th>
        <th scope="col">Gönderilme Tarihi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($postalar as $posta)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$posta->gonderi->title}}</td>
                <td>{{$posta->abone->ad}} {{$posta->abone->soyad}}</td>
                <td>{{$posta->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
