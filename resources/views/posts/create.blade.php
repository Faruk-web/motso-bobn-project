<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
    .faruk{
        margin-top: 28px;
        margin-left: 240px;
    }
</style>
<div class="container-fluid p-0 ">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card faruk">
                <div class="card-header">Create Post</div>
                <div class="card-body">
                    <form method="post" action="{{ route('post.store') }}">
                        <div class="form-group">
                            @csrf
                            <label class="label">Post Title: </label>
                            <input type="text" name="title" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label class="label">Post Body: </label>
                            <textarea name="body" rows="10" cols="30" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
