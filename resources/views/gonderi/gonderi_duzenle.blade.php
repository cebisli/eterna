@extends('dashboard')

@section('icerik')

<form method="POST" action="{{route('gonderi_crud', $id)}}">
    @csrf
    <div class="card">
        <div class="card-body">
            <h6 class="mb-0 text-uppercase">
                <b>
                @if ($id > 0)
                    {{$gonderi->title}} Başlıklı Gönderiyi Güncelle
                @else
                    Yeni Gönderi Kaydı
                @endif
                </b>
            </h6>
                <hr/>
            <input class="form-control form-control-lg mb-3" type="text" placeholder="Gönderi Başlığı"
                name="title" aria-label=".form-control-lg example" @if($gonderi) value="{{$gonderi->title}}" @endif>

            <textarea class="form-control form-control-lg mb-3" type="text" placeholder="Gönderi Açıklaması"
                name="aciklama" aria-label=".form-control-lg example">@if($gonderi) {{$gonderi->soyad}} @endif </textarea>

            <input class="btn btn-success mb-3" type="submit" value="@if($gonderi) Güncelle @else Ekle @endif" aria-label=".form-control-lg example">
        </div>
    </div>
</form>

@endsection
