@extends('emails.layouts.default')

@section('content')
    <div style="margin: 0 0 15px;">
        На сайте <a href="{{ route('home') }}" style="color: black;">{{ route('home') }}</a> оставлена новая заявка на обратный звонок <strong>№{{ $feedback->id }}</strong>.
    </div>
    <div style="margin: 0 0 15px;">
        Пользователь указал следующую информацию:
        <table style="border-collapse: collapse; border-spacing: 0; margin-top: 5px;">
            <tbody>
                @foreach ($userData as $index => $dataPiece)
                    <tr>
                        <td style="vertical-align: top; padding: 5px 10px; {{ $index > 0 ? 'border-top: 1px solid #e4e4e4;' : '' }}">{{ $dataPiece['title'] }}:</td>
                        <td style="vertical-align: top; padding: 5px 10px; {{ $index > 0 ? 'border-top: 1px solid #e4e4e4;' : '' }}">{{ $dataPiece['value'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div style="margin: 0 0 15px;">
        Для просмотра и обработки заявки перейдите по ссылке:
        <a style="color: black;" href="{{{ route('cc.feedback.edit', $feedback->id) }}}">{{{ route('cc.feedback.edit', $feedback->id) }}}</a>
    </div>
@stop
