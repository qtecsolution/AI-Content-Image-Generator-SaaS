@extends('frontend.app')
@section('content')
@section('title', $page->title.' - '.readConfig('name'))

<section class="blog-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="blogdetail-row">
                    <div class="toc" id="toc">
                      <div class="toc-content">
                        <h3 class="toc-header">Content</h3>
                        <ul class="toclist">
                            @foreach($page->content as $item)
                            <li class="toclist-item">
                                <a href="#section-{{$item->id}}" class="toclist-link">{{$item->title}}</a></li>
                            @endforeach
                        
                        </ul>
                      </div>
                    </div>
    
                    <div class="content">
                   
                      
                        <h1 class="blog-title">
                            {{$page->title}}
                        </h1> 
    
                      
    
                        @foreach($page->content as $item)
                        <div id="section-{{$item->id}}">
                            <h2>{{$item->title}}</h2>
                            <div>
                                {!! $item->body !!} 
                            </div>
                        </div>
                        @endforeach
                       
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

