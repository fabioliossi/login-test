@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Estas são as notícias do Google News através do RSS</div>

                <div class="panel-body">
                @foreach ($feeds->channel->item as $feed)
                    <li>
                        <div class="slide"> 
                            <h3><span class="label label-warning">Categoria - {{ trim($feed->category) }}</span>  <span class="label label-primary"> Data - {{ Carbon\Carbon::parse($feed->pubDate)->format('d/m/Y') }}</span></h3>
                            <h3><span>{{ trim($feed->title) }}<span></h3>
                            <div><?php print trim($feed->description) ?></div>
                        </div>
                    </li>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
