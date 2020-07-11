@extends('layouts.app')

@section('content')
    <h2>こんにちは、{{$user->name}} さん</h2>

    <style>
        .text_strong {
            font-weight: bold;
        }
        .point_stage {
            margin: 10px;
        }
        .point_stage h3 {
            margin: 0;
            font-size: 16px;
        }
        .point_stage table,.point_stage p {
            font-size: 14px;
        }
    </style>
    <div class="point_stage">
        <h3>会員情報</h3>
        <table>
            <tbody>
            <tr>
                <td>ステージ</td>
                <td><span class="text_strong">{{$stage->value}}</span> 会員</td>
            </tr>
            <tr>
                <td>現在のポイント</td>
                <td><span class="text_strong">{{$user->point}}</span> pt</td>
            </tr>
            </tbody>
        </table>
        @if ($stage->getNextStage())
            <p>あと {{$stage->getRemainingPoints($user->point)}} ポイントで {{$stage->getNextStage()}} 会員です</p>
        @endif
    </div>
@endsection
