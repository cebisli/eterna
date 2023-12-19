@extends('dashboard')

@section('baslik')
    Abone Listesi
@endsection

@section('icerik')
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-primary btn-sm m-2" href="{{ route('abone_duzenle','-1')}}">Yeni Abone</a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Ad</th>
        <th scope="col">Soyad</th>
        <th scope="col">Mail</th>
        <th scope="col">İşlem</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($aboneler as $abone)
            <tr>
                <td>{{$abone->ad}}</td>
                <td>{{$abone->soyad}}</td>
                <td>{{$abone->mail}}</td>
                <td>
                    <a href=" {{ route('abone_duzenle', $abone->id )}} " class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                    <a href=" {{ route('abone_destroy', $abone->id )}} " class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
