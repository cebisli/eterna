@extends('dashboard')

@section('baslik')
    Gönderi Listesi
@endsection

@section('icerik')

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-primary btn-sm m-2" href="{{ route('gonderi_duzenle','-1')}}">Yeni Gönderi</a>
</div>
<div class="table-responsive">
    <table class="table table table-striped">
        <colspan>
            <col width="10%">
            <col width="70%">
            <col width="20%">
        </colspan>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ad</th>
            <th scope="col">İşlem</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($gonderiler as $gonderi)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$gonderi->title}}</td>
                    <td>
                        <a href=" {{ route('gonderiPostalari', $gonderi->id )}} " title="Gönderilen Postalar" class="btn btn-sm btn-primary"><i class="fa fa-info"></i></a>
                        <a href=" {{ route('gonderi_destroy', $gonderi->id )}} " class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
