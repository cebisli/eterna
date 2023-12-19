@extends('dashboard')

@section('baslik')
    Abone Listesi
@endsection

@section('icerik')
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-primary btn-sm m-2" href="{{ route('abone_duzenle','-1')}}">Yeni Abone</a>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ad</th>
            <th scope="col">Soyad</th>
            <th scope="col">Mail</th>
            <th scope="col">İşlem</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($aboneler as $abone)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$abone->ad}}</td>
                    <td>{{$abone->soyad}}</td>
                    <td>{{$abone->mail}}</td>
                    <td>
                        <a onclick="PostalariGetir({{ $abone->id }})" class="btn btn-sm btn-primary"><i class="fa fa-info"></i></a>
                        <a href=" {{ route('abone_duzenle', $abone->id )}} " class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                        <a href=" {{ route('abone_destroy', $abone->id )}} " class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="GonderilenPostalar" title="Gönderlerin E-Postalar" style="display: none;">
    <div class="controls">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Gönderi Adı</th>
                <th scope="col">Gönderilme Zamanı</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    function PostalariGetir(id)
    {
        let ajax_url = "{{ route('abonePostalar') }}";

        $.ajax({
            type: "GET",
            url: ajax_url ,
            contentType: "application/json; charset=utf-8",
            data: { id: id },
            dataType: 'json',
            success: function (result) {
                var table = $('#GonderilenPostalar TBODY');
                table.html('');
                for(var i=0; i<result.length; i++)
                {
                    var obj = result[i];
                    console.log(obj);
                    var row = $('<tr>').appendTo(table);
                    $('<td>').html(i+1).appendTo(row);
                    $('<td>').html(obj.gonderi.title).appendTo(row);
                    $('<td>').html(obj.created_at.substr(0,10)).appendTo(row);

                }
                ShowBSDialog("GonderilenPostalar", null, Modal_Large);
             }
        });

    }
</script>
@endsection
