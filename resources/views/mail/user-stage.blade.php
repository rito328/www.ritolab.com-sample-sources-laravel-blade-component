@component('mail::message')
# {{$user->name}} 様

いつもご利用いただき誠にありがとうございます。

現在のステージをお知らせいたします。

<x-point-stage :user="$user" />

詳細はメンバーページよりご確認いただけます。
@component('mail::button', ['url' => ''])
ログイン
@endcomponent

@endcomponent
