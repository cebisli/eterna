@extends('dashboard')

@section('baslik')
    Gönderilen E-Postalar
@endsection

@section('icerik')
<div class="table-responsive">
    <table class="table table-striped">
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

    {{ $postalar->links() }}
</div>
@endsection
