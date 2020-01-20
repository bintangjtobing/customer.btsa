@extends('layouts.layout')
@section('title','Packing List')
@section('statuspacking','active')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Halo <b>{{auth()->user()->nama_depan}} {{auth()->user()->nama_belakang}}</b></h3>
                <h5>@foreach ($data_cust as $item)
                    <b>{{$item->CustomerName}}</b>
                    @endforeach</h5>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h5>Data penanggung jawab</h5><br>
                <p>
                    Nama penanggung jawab: {{auth()->user()->nama_depan}} {{auth()->user()->nama_belakang}}<br>
                    Email penanggung jawab: {{auth()->user()->email}}<br>
                    Nomor HP penanggung jawab: {{auth()->user()->nohp}}<br>
                </p>

                <hr>
                <?php $i = 1 ?>
                <table id="memberTables" class="table display table-hover">
                    <thead class="thead-dark">
                        <tr style="font-size:12px;">
                            <th style="width:10px;">#</th>
                            <th scope="col">PackingList No.</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tipe</th>
                            <th>Lokasi asal</th>
                            <th>Lokasi tujuan</th>
                            <th>Destination</th>
                            <th>Summary</th>
                            <th>Estimasi tiba</th>
                            <th>Expedition Comp.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_packing as $pl_item)
                        <tr style="font-size:12px;"
                            onclick="window.location='/detail-packing-list/{{$pl_item->PackingListID}}';">
                            <td>{{$i++}}</td>
                            <td>{{$pl_item->PackingListNo}}</td>
                            <td>{{date('d-m-Y', strtotime($pl_item->Date))}}</td>
                            <td>{{$pl_item->PackingListType}}</td>
                            <td>{{$pl_item->OriginLocationID}}</td>
                            <td>{{$pl_item->DestinationLocationID}}</td>
                            <td>{{$pl_item->Destination}}</td>
                            <td>{{$pl_item->Summary}}</td>
                            <td>{{date('d-m-Y', strtotime($pl_item->ETD))}}</td>
                            <td style="font-size: 10px;">@foreach ($data_cust as $item)
                                <b>{{$item->CustomerName}}</b>
                                @endforeach</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
