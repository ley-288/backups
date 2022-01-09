

              
                @if($post->hasImage())
                    @foreach($post->images()->get() as $image)
                    
                        <a href="{{ url('/post/'.$post->id) }}" ><img src="{{ $image->getURL() }}" style="width:100%;"></a>
                    
                    @endforeach
                @endif       
        
  

