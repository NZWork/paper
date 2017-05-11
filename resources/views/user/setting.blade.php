<!-- header -->
@include('public.header')
<!-- //header -->

<!-- container -->
<div class="container" style="margin-top: 70px">
    <div class="row m-t-40">
        <div class="col-xs-8 col-xs-offset-2">
            <h4>账号设置</h4>
            <div class="col-xs-9">
                <form>
                    <div class="form-group">
                        <label for="nickname">昵称</label>
                        <input type="text" class="form-control" id="nickname">
                    </div>
                    <div class="form-group">
                        <label for="bio">简介</label>
                        <textarea class="form-control" rows="3" name="bio" id="bio"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url">
                    </div>
                    <div class="form-group">
                        <label for="url">所在公司</label>
                        <input type="text" class="form-control" id="company">
                    </div>
                    <div class="form-group">
                        <label for="location">所在地</label>
                        <input type="text" class="form-control" id="location">
                    </div>
                    <button type="submit" class="btn btn-sm w-md btn-success pull-right">更新</button>
                </form>
            </div>
            <div class="col-xs-3">
                <label>头像</label>
                <div style="height: 200px; width: 200px; max-width: 100%">
                    <img src="https://pbs.twimg.com/profile_images/831518614561837058/ytvJfYOx_400x400.jpg" class="img-rounded img-responsive">
                    <form enctype="multipart/form-data">
                        <input type="file" name="avatar" id="real-file-upload" style="display:none">
                        <button type="button" onclick="$('#real-file-upload').click()" class="center-block m-t-10 btn btn-sm w-md btn-default">上传新头像</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end container -->

<!-- header -->
@include('public.footer')
<!-- //header -->