      <html>  
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Category</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
      </head>
      <body>
        <div class="container">
            <h2 style="margin-top: 12px;" class="alert">Edit Category </h2>   <br>

          <div class="row">
            <div class="col-12">

              <br>

              <br /> 
              @include('message')
              <div align="right">
                <a href="{{ route('category.index') }}" class="btn btn-default">Back</a>
              </div>
              <br />
              <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                 <label class="col-md-4 text-right">Edit Name</label>
                 <div class="col-md-8">
                  <input type="text" name="name" value="{{ $category->name }}" class="form-control input-lg" />
                </div>
              </div>
              <br />
              <br />
              <br />
              <div class="form-group">
                <label class="col-md-4 text-right" for="id_label_single">
                Select Subcategory</label>
                <div class="col-md-8">
                  <select style="width: 100%" class="js-example-basic-multiple" name="subcategory[]" multiple="multiple" id="id_label_single">
                    @foreach ($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}" @foreach ($category->subcategories as $postTag)
                      @if ($postTag->id == $subcategory->id)
                      selected
                      @endif
                      @endforeach>{{$subcategory->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <br />
                <br />
                <br />
                <div class="form-group">
                 <label class="col-md-4 text-right">Select Profile Image</label>
                 <div class="col-md-8">
                  <input type="file" name="image" />
                  <img src="{{ asset('categories/'.$category->image) }}" class="img-thumbnail" width="100" />
                  <input type="hidden" name="hidden_image" value="{{ $category->image }}" />
                </div>
              </div>
              <br /><br /><br />
              <div class="form-group text-center">
                <input type="submit" name="edit" class="btn btn-primary input-lg" value="Update" />
                <a href="{{ route('category.index') }}" class="btn btn-info">Back</a>
              </div>  
            </form>
            <script>
              $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
              });
            </script>