<p style="text-align: center">
    <img src="{{ $message->embed(public_path().'/'.$data->image) }}">
</p>
<h1 style="text-align: center">{{ $data->title }}</h1>

<p style="text-align: center"><a href="{{ route('news-page', $data->slug) }}">Перейти к новости</a></p>

<p>Если вы больше не хотите получать рассылку перейдите по этой <a href="{{ route('subscription.delete', $data->subscriber) }}">ссылке</a></p>
