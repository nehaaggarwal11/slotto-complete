<div class="section-comment">

@if($comments->count() != 0)
  <div class="newsh2title">Comments</div >
    <ul class="comments-list list-unstyled">
          <!-- <span>({{ $comments->count() }})</span> -->
           @foreach($comments as $comment)
            <li>
                <article class="comment clearfix">
                    <div class="comment-inner">
                        <header class="comment-header">
                            <cite class="comment-author">{{ $comment->name }}</cite>
                            <time class="comment-datetime" datetime="{{ $comment->created_at->format('Y-m-d') }}">
                                {{ $comment->created_at->format('F d, Y') }}
                            </time>
                        </header>
                        <div class="comment-body">
                            <p>{{ $comment->comment }}</p>
                        </div>
                    </div>
                </article>
            </li>
            @endforeach
    </ul>
@endif
</div>
<div id="add-comment" class="section-reply-form">
    <div class="newsh2title">Leave a comment</div>
    @if($comment_success = session('comment_success'))
        <div class="alert alert-success mt-4" role="alert" id="success-msg">
            {{ $comment_success }}
        </div>
    @endif
    <form action="{{ route("frontend.news.comment", $news->slug) }}#add-comment" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}"/>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}"/>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Comment</label>
                    <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" rows="4">{{ old('comment') }}</textarea>
                    @if($errors->has('comment'))
                        <div class="invalid-feedback">
                            {{ $errors->first('comment') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <input type="checkbox" id="netent">
                <label id="accept-label" for="netent">
                    I accept <a href="{{ route('frontend.page.terms') }}">terms & condition</a>
                    and <a href="{{ route('frontend.page.privacy-policy') }}">Privacy Policy</a>
                </label>
            </div>
            <div class="col-md-12">
                <input type="submit" class="splbtns" value="Submit" data-text="Submit">
            </div>
        </div>
    </form>
</div>
