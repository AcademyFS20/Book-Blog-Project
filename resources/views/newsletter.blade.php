<style>
@import url('https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700&display=swap');



.news{
    
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    

}

.subscribe{
    display: flex;
    flex-direction: column;
    margin-left: 250px;
}
input{
    border-radius:20px;
  border: 1px solid #eee;
  transition: .3s border-color;
  margin-bottom: 20px;
  width: 250px;
  height: 30px;
}
input {
  border: 1px solid #aaa;

}
#btnsubmit {
  align-items: center;
  background-color: #fddedd;
  border: 2px solid #111;
  border-radius: 8px;
  box-sizing: border-box;
  color: #111;
  cursor: pointer;
  display: flex;
  font-family: Inter,sans-serif;
  font-size: 16px;
  height: 48px;
  justify-content: center;
  line-height: 24px;
  max-width: 100%;
  padding: 0 25px;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  margin-left: 45px;
}

#btnsubmit:after {
  background-color: #111;
  border-radius: 8px;
  content: "";
  display: block;
  height: 48px;
  left: 0;
  width: 100%;
  position: absolute;
  top: -2px;
  transform: translate(8px, 8px);
  transition: transform .2s ease-out;
  z-index: -1;
}

#btnsubmit:hover:after {
  transform: translate(0, 0);
}

#btnsubmit:active {
  background-color: #ffdeda;
  outline: 0;
}

#btnsubmit:hover {
  outline: 0;
}

@media (min-width: 768px) {
    #btnsubmit{
    padding: 0 40px;
  }
}

#newsletter{
    margin-left: 100px;
}
.containnewsletter{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 400px;
}

</style>
 
 
 
 
 



 <div class="containnewsletter">
 <h2 class="subscribe__title">Newsletter</h2>
  <div class="news">
  
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{url('/images/Email.svg')}}" id="newsletter" width="400px" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                 <div class="subscribe">
                                
	
    <p>Subscribe to our newsletter to receive the latest articles and news about our blog</p>
  @if (\Session::has('success'))
   <div >
    <p>{{ \Session::get('success') }}</p>
   </div><br />
   @endif
   @if (\Session::has('failure'))
   <div >
    <p>{{ \Session::get('failure') }}</p>
   </div><br />
   @endif
   <br/>
   <form method="post" action="{{route('newsletter')}}">
    @csrf
    <div class="form">
		<input type="email" class="form__email" name="email" placeholder="Enter your email address" />
		<button class="form__button" type="submit" id="btnsubmit">Subscribe</button>
	</div>
    
   
   </form>
  </div>
                                
                            </div>
                        </div>
                    </div>
	
 </div>
