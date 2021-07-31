<div class="form-group">
 <label for="title">Category Name</label>
     <input type="text" name="title" value="{{old('title', $category->title)}}" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" id="title" placeholder="example">
     @if ($errors->has('title'))
         <div class="invalid-feedback"><strong>{{$errors->first('title')}}</strong></div>
     @endif
 </div>

 <div class="form-group">
     <label for="body">Description</label>
     <textarea id="body"class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}" name="body" rows="5" placeholder="write some details...">{{old('body', $category->body)}}</textarea>
     @if ($errors->has('body'))
         <div class="invalid-feedback"><strong>{{$errors->first('body')}}</strong></div>
     @endif
 </div>

 <div class="form-group ">
     <button type="submit" class="btn btn-lg btn-primary">Save</button>
 </div>