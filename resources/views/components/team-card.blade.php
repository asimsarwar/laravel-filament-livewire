<div class="col-xl-3 col-lg-4 col-md-6 mt-4">
    <div class="card bg-transparent border-0 text-center">
        <div class="card-img">
            @if($team->image != '')
                <img loading="lazy" decoding="async" src="{{ asset('storage/'.$team->image)}}" alt="Scarlet Pena" class="rounded w-100" width="300" height="332">
            @endif
            <ul class="card-social list-inline">
                @if($team->fb_url != '')
                    <li class="list-inline-item"><a class="facebook" target="_blank" href="{{$team->fb_url}}"><i class="fab fa-facebook"></i></a>
                    </li>
                @endif
                @if($team->tw_url != '')
                    <li class="list-inline-item"><a class="twitter" target="_blank" href="{{$team->tw_url}}"><i class="fab fa-twitter"></i></a>
                    </li>
                @endif
                @if($team->in_url != '')
                    <li class="list-inline-item"><a class="instagram" target="_blank" href="{{$team->in_url}}"><i class="fab fa-instagram"></i></a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="card-body">
            <h3>{{$team->name}}</h3>
            <p>{{$team->designation}}</p>
        </div>
    </div>
</div>