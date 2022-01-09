@extends('frontend.layouts.social')

@section('title', app_name() . ' | Story' )

@section('content')

{{--<html>
    <head>--}}
    
<style>

.progress-bar {
    width: calc(100% - 6px);
    height: 5px;
    background: #e0e0e0;
    padding: 3px;
    border-radius: 3px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, .2);
}

            * {
  box-sizing: border-box;
}

#mobile_header_style{
        display:none;
      }

body {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: black;
}

.slider-item{
    height:100vh;
    object-fit: cover;
    background-color: black;
}

.slider {
  //width: 100%;
  //max-width: 640px;
  width:103%;
  //margin: 0 auto;
  margin-left:-5px;
  margin-right:20px;
  overflow-y: hidden;
  overflow-x: hidden;
  background: black;
  box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.5);

  

}
.slider .slider-items-container {
  display: flex;
  flex-wrap: wrap;
  height: auto;
  transition: transform 0.35s ease-in-out;
  //justify-content:center;
}
.slider .slider-items-container img {
  width: 100vw;
  max-width:100vw;
  //max-width: 640px;
  display: block;
}
.slider .controls {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 35px;
}
.slider .controls a {
  color: #333;
  text-decoration: none;
  transition: 0.15s ease-in-out;
}
.slider .controls a:hover {
  color: #888;
}
.slider .dots {
  width: 100%;
  display: flex;
  justify-content: space-between;
  margin: 0 auto;
  padding: 20px;
}
.slider .dots .dot {
  width: 10px;
  height: 10px;
  background: #333;
  transition: 0.15s ease-in-out;
  border-radius: 8px;
  cursor: pointer;
  margin: 0 20px;
}
.slider .dots .dot.active {
  background: #888;
}
#header_in_story {
    position: fixed;
    //top: 1;
    z-index: 9999;
    height: 42px;
    margin-left: 50px;
    margin-top:50px;
}

#name_in_story{
    color:white;  
}

.progress-container {
  display: flex;
  flex-direction: row;
  width: 100%;
  padding: 10px 0;
  cursor: pointer;
}

.progress {
  height: 5px;
  flex-grow: 1;
  border-radius: 4px;
  margin: 0 5px;
  display: flex;
  background-image: -webkit-linear-gradient(left, 
    rgba(255,255,255,.5) 0%,
    rgba(255,255,255,.5) 50%,
    rgba(88, 89, 104,.5) 50.001%,
    rgba(88, 89, 104,.5) 100%
  );
  background-repeat: no-repeat;
  background-size: 200%;
  backgound-color: #666;
  background-position: 100% 50%;
  animation-timing-function: linear;
  animation-delay: .5s;
}

.progress.active {
    animation-name: Loader;
}

.progress.passed {
    background-position: 0 0; 
}

@-webkit-keyframes Loader {
  0%   { background-position: 100% 0; }
  100% { background-position: 0 0; }
}

.pause:hover .progress {
  animation-play-state: paused;
}

.pause .not-hovered {
  display: block;
}
.pause .hovered {
  display: none;
}

.pause:hover .not-hovered {
  display: none;
}
.pause:hover .hovered {
  display: block;
}

body {
  background: black;
  //padding: 50px;
  width: 100vw;
  color: #fff;
  font-family: sans-serif;
  margin-top:0px;
}




        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
    {{--</head>
    <body>--}}
    
        <div class='slider' id="panel-post-{{ $story_id }}">
        {{--<div id="header_in_story">
            <a href="{{ url('/social/'.$user->username) }}">
                <img style="border:3px solid white; height:120px; width:120px; border-radius:60px; object-fit:cover;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Immagine profilo">
                
               
            </a>
        </div>--}}

            <input type="hidden" id="story_id_id" value="{{ $story_id }}">
            

            <div class="save-box">
                <a href="javascript:;" onclick="saveStory({{$story_id}})" class="save-text">
                    
                    <i id="fa-heart-o" style="color:white;" class="material-icons nav__icon" id="bookmark-o">bookmark_border</i>
                </a>
            </div> 

            <div class='controls'>
                <a href="#" class='prev-btn'><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                <a href="#" class='next-btn'><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>	
            <div class="pause">
                <div class="progress-container"></div>
            </div>
            <!--<progress class="progress" max="100" data-value="100"></progress>-->
            <div class='slider-items-container'>	
                @foreach($stories as $image)

                    @if ((str_contains($image->image_path, 'MOV') == 1) || (str_contains($image->image_path, 'mp4') == 1))
                  
                        <div class='slider-item'>
                            <video style="height:95vh; width:108vw; background-color: black;" src="https://www.spidergain.com/storage/stories/{{ $image->image_path }}"  preload autoplay loop muted playsinline>
                        </div>
                    @else
                        <div class='slider-item'>
                         
                            <img style="height:95vh; width:108vw; background-color: black; object-fit:contain;" src="https://www.spidergain.com/storage/stories/{{ $image->image_path }}" />
                        
                        </div>
                    
                    @endif   
                    
                       
                @endforeach
            </div>	
             
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/timer.jquery/0.9.0/timer.jquery.min.js"></script>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/timer.jquery/0.9.0/timer.jquery.js"></script>
        
        
<script>
$('.progress').queue(function () {
        $(this).css('width', '100%');
});

function setSlider(){

	
	$(".slider").each( function(){
		
		var slider = $(this),
				itemscontainer = slider.find(".slider-items-container");
						
		if (itemscontainer.find(".slider-item.active").length == 0){
			itemscontainer.find(".slider-item").first().addClass("active");
		}
		
		function setWidth(){
			var totalWidth = 0
			
			$(itemscontainer).find(".slider-item").each( function(){
				totalWidth += $(this).outerWidth();
			});
			
			itemscontainer.width(totalWidth);
			
		}
		function setTransform(){
			
			var activeItem = itemscontainer.find(".slider-item.active"),
					activeItemOffset = activeItem.offset().left,
					itemsContainerOffset = itemscontainer.offset().left,
					totalOffset = activeItemOffset - itemsContainerOffset
			
			itemscontainer.css({"transform": "translate( -"+totalOffset+"px, 0px)"})
			
		}
		function nextSlide(){
			var activeItem = itemscontainer.find(".slider-item.active"),
					activeItemIndex = activeItem.index(),
					sliderItemTotal = itemscontainer.find(".slider-item").length,
					nextSlide = 0;
			if (activeItemIndex + 1 > sliderItemTotal - 1){
				window.location.replace("{{url('feed')}}"); //temporary disabled
				return;
				nextSlide = 0;
			}else{
				nextSlide = activeItemIndex + 1
			}
			
			var nextSlideSelect = itemscontainer.find(".slider-item").eq(nextSlide),
					itemContainerOffset = itemscontainer.offset().left,
					totalOffset = nextSlideSelect.offset().left - itemContainerOffset
			
			itemscontainer.find(".slider-item.active").removeClass("active");
			nextSlideSelect.addClass("active");
			slider.find(".dots").find(".dot").removeClass("active")
			slider.find(".dots").find(".dot").eq(nextSlide).addClass("active");
			itemscontainer.css({"transform": "translate( -"+totalOffset+"px, 0px)"});
			
		}
		function prevSlide(){
			var activeItem = itemscontainer.find(".slider-item.active"),
					activeItemIndex = activeItem.index(),
					sliderItemTotal = itemscontainer.find(".slider-item").length,
					nextSlide = 0;
			
			if (activeItemIndex - 1 < 0){
				nextSlide = sliderItemTotal - 1;
			}else{
				nextSlide = activeItemIndex - 1;
			}
			
			var nextSlideSelect = itemscontainer.find(".slider-item").eq(nextSlide),
					itemContainerOffset = itemscontainer.offset().left,
					totalOffset = nextSlideSelect.offset().left - itemContainerOffset
			
			itemscontainer.find(".slider-item.active").removeClass("active");
			nextSlideSelect.addClass("active");
			slider.find(".dots").find(".dot").removeClass("active")
			slider.find(".dots").find(".dot").eq(nextSlide).addClass("active");
			itemscontainer.css({"transform": "translate( -"+totalOffset+"px, 0px)"})
			
		}
		function makeDots(){
			var activeItem = itemscontainer.find(".slider-item.active"),
					activeItemIndex = activeItem.index(),
					sliderItemTotal = itemscontainer.find(".slider-item").length;
			var width = '100';
		    	var bar = width/sliderItemTotal;
			for (i = 1; i <= sliderItemTotal; i++){
				wid = bar*i+'%';
				slider.find(".progress-container").append("<div style='animation-duration: 10s' class='progress' id='"+i+"'></div> ")
				//slider.find(".progress-container").append("<div style='animation-duration: 5s' class='progress["+i+"]'></div> ")
               
			}
			
			slider.find(".dots").find(".dot").eq(activeItemIndex).addClass("active")
			
		}
		
		setWidth();
		setTransform();
		makeDots();
		
		$(window).resize( function(){
			setWidth();
			setTransform();
		});
        
		slider.find("img").on('click',function(){
			playNextTest($(this).closest(".slider-item").index());
        	});

		slider.find("video").on('click',function(){
            		playNextTest($(this).closest(".slider-item").index());
        	});

		/*setInterval(function(){
	        	nextSlide();
        	},5000);*/
        	
        	const progressContainer = document.querySelector('.progress-container');
		const progress = Array.from(document.querySelectorAll('.progress'));
		const status = document.querySelector('.status');  

		const playNext = (e) => {
		  	const current = e && e.target;//alert(current);
		  	let next;
		  	if (current) {
		    		const currentIndex = progress.indexOf(current);
		    		if (currentIndex < progress.length) {
		      			next = progress[currentIndex+1];
		    		}
		    		current.classList.remove('active');
				current.classList.add('passed');
		  	} 
		  
		  	if (!next) {
		    		progress.map((el) => {
		      			el.classList.remove('active');
		      			el.classList.remove('passed');
		    		})
		    		next = progress[0];
		  	} 
		  	next.classList.add('active'); 
		  	if(e !='first'){
		  		nextSlide();
		  	}
		  
		}
		
		const playNextTest = (e) => {
		
		    	const currentIndex = e;
		    	let next;	
		    	let current = progress[currentIndex];
		    	if (currentIndex < progress.length) {
				next = progress[currentIndex+1];
		    	}
		    	current.classList.remove('active');
		    	current.classList.add('passed');
		  
		  if (!next) {
		    	progress.map((el) => {
		      		el.classList.remove('active');
		      		el.classList.remove('passed');
		    	})
		    	next = progress[0];
		  } 
		   
		  next.classList.add('active'); 
		  if(e !='first'){
		  	nextSlide();
		  }
		  
		}

		const clickHandler = (e) => {
		  	const index = Math.floor(e.offsetX / (progressContainer.clientWidth/progress.length));
		  
		}

		progress.map(el => el.addEventListener("animationend", playNext, false));
		progressContainer.addEventListener("click", clickHandler, false);

		playNext('first');

		
	});
	
}

setSlider();
        </script>
    {{--</body>
</html>--}}

@endsection
