<div class="form-group">
 <label for="title">Book Name</label>
     <input type="text" name="title" value="{{old('title', $book->title)}}" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" id="title" placeholder="example">
     @if ($errors->has('title'))
         <div class="invalid-feedback"><strong>{{$errors->first('title')}}</strong></div>
     @endif
 </div>

 <div class="form-group">
     <label for="body">Description</label>
     <textarea id="body" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}" name="body" rows="5" placeholder="write some details...">{{old('body', $book->body)}}</textarea>
     @if ($errors->has('body'))
         <div class="invalid-feedback"><strong>{{$errors->first('body')}}</strong></div>
     @endif
 </div>
 

 <div class="form-group">
     <label for="author">Author Name</label>
     <input type="text" name="author" value="{{old('author', $book->author)}}" class="form-control {{$errors->has('author') ? 'is-invalid' : ''}}" id="author" placeholder="John Doe">
     @if ($errors->has('author'))
         <div class="invalid-feedback"><strong>{{$errors->first('author')}}</strong></div>
     @endif
 </div>

 <div class="form-group">
     <label for="edition">Edition</label>
     <input type="text" name="edition" value="{{old('edition', $book->edition)}}" class="form-control {{$errors->has('edition') ? 'is-invalid' : ''}}" id="edition" placeholder="enter number only">
     @if ($errors->has('edition'))
         <div class="invalid-feedback"><strong>{{$errors->first('edition')}}</strong></div>
     @endif
 </div>


 <div class="form-group">
     <label for="part">Part</label>
     <input type="text" name="part" value="{{old('part', $book->part)}}" class="form-control {{$errors->has('part') ? 'is-invalid' : ''}}" id="part" placeholder="enter number only">
     @if ($errors->has('part'))
         <div class="invalid-feedback"><strong>{{$errors->first('part')}}</strong></div>
     @endif
 </div>

 <div class="form-group">
     <label for="price">Price</label>
     <input type="text" name="price" value="{{old('price', $book->price)}}" class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}" id="price" placeholder="i.e. 99.99">
     @if ($errors->has('price'))
         <div class="invalid-feedback"><strong>{{$errors->first('price')}}</strong></div>
     @endif
 </div>


 <div class="form-group">
     <label for="category-id">Category</label>
     <select id="category-id" class="form-control {{$errors->get('category_id') ? 'is-invalid' : ''}}" name="category_id">
         <option selected disabled>Select a category</option>
         @foreach ($categories as $category)
             <option value="{{$category['id']}}" @if($book->category_id==$category['id']){
              {{ 'selected' }}
             }
             @endif >{{$category['title']}}</option>
         @endforeach
     </select>
     @if ($errors->has('category_id'))
         <div class="invalid-feedback"><strong>{{$errors->first('category_id')}}</strong></div>
     @endif
 </div>

 @if($book->up_file && $formType=="edit")
     <span><strong>File: </strong>{{$book->up_file}}</span>
 @endif
 
 <div class="form-group">
     <label for="up_file">File (PDF)</label>
     <input type="file" name="up_file" class="form-control {{$errors->has('up_file') ? 'is-invalid' : ''}}" id="up_file">
     @if ($errors->has('up_file'))
         <div class="invalid-feedback"><strong>{{$errors->first('up_file')}}</strong></div>
     @endif
 </div>
 



 <div class="form-group ">
     <button type="submit" class="btn btn-lg btn-primary">Save</button>
 </div>