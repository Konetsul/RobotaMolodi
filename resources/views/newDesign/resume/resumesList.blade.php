<link href="{{ asset('/css/resumes/resumesList.css') }}" rel="stylesheet">
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">

<div class="test">
    @foreach ($resumes as $resume)
        <div>
            <div class="section-link">
                <a class="links-line" href="{{route('resume.show', $resume->id)}}">
                    <h3>{{$resume->branch}}{{ $resume->position}}</h3>
                </a>
                <h4>
                    <strong>{{$resume->salary}} - {{$resume->salary_max}} {{$resume->Currency()[0]['currency']}}</strong>
                </h4>
                <p class="text-left"> {{strip_tags($resume->description)}} </p>
            </div>

            <a class="links-line" href="{{route('resume.show', $resume->id)}}">
                <p class="read-next-link">Читати далі...</p>
            </a>

            <div class="ratings">
                <span class = "ratingsTitle">Рейтинг:</span>
                <span class="morph">
                    {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike']) !!}
                    <span class="findLike" id="{{route('res.rate', $resume->id)}}_1">{{$resume->rated()->getLikes($resume)}}</span>
                </span>
                <span class="morph">
                    {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike']) !!}
                    <span class="findDislike" id="{{route('res.rate', $resume->id)}}_-1">{{$resume->rated()->getDisLikes($resume)}}</span>
                </span>
                <span class="likeError"></span>
            </div>

            <div class="below-section">
                <span>{{ $resume->Industry()->name}}</span>
            </div>

            <a class="links-line" href="#">
                <div class="line">
                    <span class="town">{{ $resume->City()->name}}</span>
                    <span class="drop">&bull;</span>
                    <span class="data">{{date('j m Y', strtotime($resume->updated_at))}}</span>
                </div>
            </a>

            <hr class="limit-line">
        </div>
    @endforeach

    @include('newDesign.paginator', ['paginator' => $resumes])

</div>

@include('newDesign.jsForFilter', ['urlController' => 'filter.resumes'])