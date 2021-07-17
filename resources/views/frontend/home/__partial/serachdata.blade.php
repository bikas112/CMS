 
 @foreach ($products as $product)
  
 
      <div class="col-md-4">
                   <a href="{{route('front.product', $product)}}" class="prod-a">
                        <div class="card-product">
                        <div class="card" style="width: 100%;">
                        <img class="card-img-top" style="height: 140px;" src="{{asset('storage/gallery/'.$product->coverImage)}}" alt="Card image cap">
                        <div class="card-body center">
                        <h5 class="card-title">{{$product->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">NRP {{$product->price}} Per {{$product->unit}}</h6> 
                        <br>
                        <p class="a-p-enq"> <a class="btn-enq" href="#"  data-toggle="modal" data-target="#{{$product->slug}}"> <i class="fas fa-info"> </i> Enquiry</a></p>
                    </div>
                    </div>
                    </div>
                    </a>
                </div>


<div class="modal fade text-muted" id="{{$product->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title text-muted bold" id="exampleModalLongTitle">Enquire To Product: <u><a href="{{route('front.product', $product)}}">{{$product->title}}</a></u></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
            {!! Form::open(['method'=>'post','action'=>'App\Http\Controllers\FrontendController@storeenquery'])!!}
            @csrf
            <div class="form-row">
            <div class="form-group col-md-6">
                    <label for="inputAddress">Name</label>
                    <input type="text" name="name" required value="{{ old('name')}}" class="form-control" id="inputAddress" placeholder="Enter Your Name">
                @error('name')
            <small class="form-text text-danger" style="font-size: 17px">{{$message}}</small>
            @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress2">Address</label>
                    <input type="text" name="address" required value="{{old('address')}}" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                @error('address')
            <small class="form-text text-danger" style="font-size: 17px">{{$message}}</small>
            @enderror
                </div>

            </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress2">Email</label>
                    <input type="email" name="email" required value="{{old('email')}}" class="form-control" id="inputAddress2" placeholder="Enter you Email">
                @error('email')
            <small class="form-text text-danger" style="font-size: 17px">{{$message}}</small>
            @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress2">Contact</label>
                    <input type="text" name="phone" required value="{{old('contact')}}" class="form-control" id="inputAddress2" placeholder="Contact Number">
                    @error('contact')
            <small class="form-text text-danger" style="font-size: 17px">{{$message}}</small>
            @enderror
                </div>

                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress2">Product Name</label>
                    <input type="text"  value="{{$product->title}}" disabled class="form-control" id="inputAddress2">
                    <input type="hidden" value="{{$product->id}}" name="product_id">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress2">Quntity</label>
                    <input type="text" name="quantity" required value="{{old('quantity')}}" class="form-control" id="inputAddress2" placeholder="Quantiy">
                    @error('contact')
            <small class="form-text text-danger" style="font-size: 17px">{{$message}}</small>
            @enderror
                </div>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Your Message</label>
                    <textarea class="form-control" name="message" value="no thing" id="exampleFormControlTextarea1" rows="2">{{old('message')}}</textarea>
                    @error('message')
                    <small class="form-text text-danger" style="font-size: 17px">{{$message}}</small>
                    @enderror
                </div>
                
    </div>
    <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> --}}
        {!! Form::submit('Send Enquiry',['class'=>'btn-message shadow']) !!}
                {!! Form::close() !!}
    </div>
    </div>
</div>
</div>
@if (session('message'))
  <script>
    $(document).ready(function(){
      alert("Thank you for Enquery will contact you very soon.")
    })
  </script>                 
 @endif

                   
 @endforeach

 @if($products->count() == 0)

 <div class="col-md-12 text-danger">
     Sorry No Result Found
 </div>



 @endif