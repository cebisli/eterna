@extends('dashboard')

@section('icerik')

<form method="POST" action="{{route('abone_crud', $id)}}">
    @csrf
    <div class="card">
        <div class="card-body">
            <h6 class="mb-0 text-uppercase">
                <b>
                @if ($id > 0)
                    {{$abone->ad}} İsimli Aboneyi Güncelle
                @else
                    Yeni Abone Kaydı
                @endif
                </b>
            </h6>
                <hr/>
            <input class="form-control form-control-lg mb-3" type="text" placeholder="Abone Adı"
                name="ad" aria-label=".form-control-lg example" @if($abone) value="{{$abone->ad}}" @endif>

            <input class="form-control form-control-lg mb-3" type="text" placeholder="Abone Soyadı"
                name="soyad" aria-label=".form-control-lg example" @if($abone) value="{{$abone->soyad}}" @endif>

            <input class="form-control form-control-lg mb-3" type="email" placeholder="email"
                name="mail" aria-label=".form-control-lg example" @if($abone) value="{{$abone->mail}}" @endif>

            <input class="btn btn-success mb-3" type="submit" value="Yeni Abone Ekle" aria-label=".form-control-lg example">
        </div>
    </div>
</form>

@endsection
